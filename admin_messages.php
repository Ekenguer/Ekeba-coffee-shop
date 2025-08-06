<?php
$conn = new mysqli("localhost", "root", "", "ekeba_coffee_db");

$result = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");

echo "<h2>Messages reçus :</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc;padding:10px;margin-bottom:10px'>";
    echo "<strong>Nom :</strong> " . htmlspecialchars($row['name']) . "<br>";
    echo "<strong>Email :</strong> " . htmlspecialchars($row['email']) . "<br>";
    echo "<strong>Objet :</strong> " . htmlspecialchars($row['subject']) . "<br>";
    echo "<strong>Message :</strong><br>" . nl2br(htmlspecialchars($row['message'])) . "<br>";
    echo "<em>Reçu le : " . $row['created_at'] . "</em>";
    echo "</div>";
}
?>
