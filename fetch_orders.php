<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "ekeba_coffee_db");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupération des commandes
$sql = "SELECT * FROM orders ORDER BY order_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order-container'>";
        echo "<h4><strong>{$row['fullname']}</strong> has Order <strong>{$row['quantity']}x {$row['product']}</strong></h4>";
        echo "<p class='order-meta'>📞 {$row['phone']}<br>🕒 Order On : {$row['order_time']}</p>";
        echo "</div>";
    }
} else {
    echo "<p class='text-center'>No Order Yet.</p>";
}

$conn->close();
?>
