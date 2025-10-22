<?php
// traitement-formulaire.php
session_start();

// Génération du token CSRF si pas déjà fait
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Vérification que la requête est bien POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Méthode non autorisée.";
    exit;
}

// Honeypot : si rempli, blocage (bot détecté)
if (!empty($_POST['website'])) {
    http_response_code(400);
    echo "Erreur détectée.";
    exit;
}

// Vérification du token CSRF
if (empty($_POST['token']) || $_POST['token'] !== ($_SESSION['token'] ?? '')) {
    http_response_code(400);
    echo "Erreur CSRF détectée.";
    exit;
}

// Nettoyage et validation des données
$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation simple
if (empty($nom) || empty($email) || empty($message)) {
    http_response_code(400);
    echo "Veuillez remplir tous les champs.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Adresse email invalide.";
    exit;
}

// Échapper les données pour éviter XSS si réaffichage
$nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Envoi du mail
$to = "contact@couvreur-bordeaux.com";
$subject = "Nouveau devis de $nom";
$body = "Nom: $nom\nEmail: $email\nMessage:\n$message";
$headers = "From: $email\r\nReply-To: $email\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo "Merci pour votre demande, nous reviendrons vers vous rapidement.";
} else {
    http_response_code(500);
    echo "Erreur lors de l'envoi du message.";
}
?>
