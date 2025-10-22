<?php
// traitement-formulaire.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Honeypot : si rempli, blocage
    if (!empty($_POST['website'])) {
        // On ignore la soumission (bot détecté)
        http_response_code(400);
        echo "Erreur détectée.";
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

    // Échapper les données pour éviter XSS si on doit les réafficher
    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    // Ici tu peux :
    // - Envoyer un mail
    // - Sauvegarder en base de données
    // - Etc.

    // Exemple d'envoi de mail (configure les paramètres à ta guise)
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
} else {
    // Pas une requête POST
    http_response_code(405);
    echo "Méthode non autorisée.";
}
?>
