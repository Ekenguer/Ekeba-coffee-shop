<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root'; // par défaut dans XAMPP/WAMP
$password = ''; // mot de passe vide
$db = 'ekeba_coffee_db';

$conn = new mysqli($host, $user, $password, $db);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupère les données du formulaire
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Insertion dans la base de données
$sql = "INSERT INTO contacts (name, email, subject, message)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "Message envoyé avec succès !";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
