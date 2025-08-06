<?php
session_start();

$product = $_POST['product'] ?? '';
$price = $_POST['price'] ?? 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product'] === $product) {
        $item['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = [
        'product' => $product,
        'price' => $price,
        'quantity' => 1
    ];
}

header("Location: panier.php");
exit;
?>
