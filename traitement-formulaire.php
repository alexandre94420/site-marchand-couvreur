<?php
// traitement-formulaire.php
session_start();

// Génération du token CSRF si pas déjà fait
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Vérification que la requête est bien POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405); // Méthode non autorisée
    exit("Méthode non autorisée.");
}

// Honeypot : champ caché pour détecter les bots
if (!empty($_POST['website'])) {
    http_response_code(400);
    exit("Erreur détectée (bot).");
}

// Vérification du token CSRF
if (empty($_POST['token']) || $_POST['token'] !== ($_SESSION['token'] ?? '')) {
    http_response_code(403); // Forbidden
    exit("Requête non autorisée (CSRF).");
}

// Récupération et nettoyage des données
$nom = htmlspecialchars(trim($_POST['nom'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

// Validation simple des champs
if (empty($nom) || empty($email) || empty($message)) {
    http_response_code(400);
    exit("Veuillez remplir tous les champs.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit("Adresse email invalide.");
}

// Envoi du mail
$to = "contact@couvreur-bordeaux.com";
$subject = "Nouveau devis de $nom";
$body = "Nom: $nom\nEmail: $email\nMessage:\n$message";
$headers = "From: $email\r\nReply-To: $email\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo "Merci pour votre demande, nous reviendrons vers vous rapidement.";
} else {
    http_response_code(500);
    exit("Erreur lors de l'envoi du message.");
}
?>
