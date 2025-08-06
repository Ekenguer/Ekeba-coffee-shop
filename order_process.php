<?php
// Connexion à la base
$host = "localhost";
$user = "root";
$pass = "";
$db = "ekeba_coffee_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données
$fullname = $_POST['fullname'] ?? '';
$phone = $_POST['phone'] ?? '';
$product = $_POST['product'] ?? '';
$quantity = $_POST['quantity'] ?? 1;

// Sécurité simple
$fullname = strip_tags($fullname);
$phone = strip_tags($phone);
$product = strip_tags($product);
$quantity = intval($quantity);

// Insertion dans la base
$stmt = $conn->prepare("INSERT INTO orders (fullname, phone, product, quantity) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $fullname, $phone, $product, $quantity);

if ($stmt->execute()) {
    echo "Votre commande a été envoyée avec succès !";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
