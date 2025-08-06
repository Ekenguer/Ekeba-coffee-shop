<?php
$conn = new mysqli("localhost", "root", "", "ekeba_coffee_db");

$result = $conn->query("SELECT * FROM orders ORDER BY order_time DESC");

echo "<h2>Commandes reçues :</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc;padding:10px;margin-bottom:10px'>";
    echo "<strong>Nom :</strong> {$row['fullname']}<br>";
    echo "<strong>Téléphone :</strong> {$row['phone']}<br>";
    echo "<strong>Produit :</strong> {$row['product']}<br>";
    echo "<strong>Quantité :</strong> {$row['quantity']}<br>";
    echo "<em>Reçu le : {$row['order_time']}</em>";
    echo "</div>";
}
?>
