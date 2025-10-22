<?php
session_start();

// Vérifier que le formulaire est soumis en POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Vérification du token CSRF
    if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
        // Token invalide, possible attaque CSRF
        header('Location: index.php?message=erreur_token');
        exit;
    }

    // Vérification anti-bot (champ caché "website" doit rester vide)
    if (!empty($_POST['website'])) {
        // Champ piège rempli => probable robot
        header('Location: index.php?message=erreur_bot');
        exit;
    }

    // Récupération sécurisée des données
    $nom = isset($_POST['nom']) ? trim(htmlspecialchars($_POST['nom'])) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
    $message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';

    // Validation basique des champs obligatoires
    if (empty($nom) || empty($email) || empty($message)) {
        header('Location: index.php?message=erreur_champs');
        exit;
    }

    // Validation simple de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?message=erreur_email');
        exit;
    }

    // Préparation du mail
    $to = "fourquin.f@gmail.com"; 
    $subject = "Nouveau message de $nom via le formulaire de contact";
    $body = "Nom : $nom\n";
    $body .= "Email : $email\n\n";
    $body .= "Message :\n$message\n";

    // En-têtes pour éviter d'être filtré comme spam
    $headers = "From: no-reply@votredomaine.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi du mail
    if (mail($to, $subject, $body, $headers)) {
        header('Location: index.php?message=ok');
        exit;
    } else {
        // Erreur d'envoi
        http_response_code(500);
        echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
        exit;
    }
} else {
    // Accès direct interdit
    header('Location: index.php');
    exit;
}
?>
