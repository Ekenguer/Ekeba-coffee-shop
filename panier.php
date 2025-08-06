<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon Panier - Ekeba Coffee Shop</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <style>
    body { padding: 30px; background-color: #f9f9f9; }
    h2 { color: #d35400; text-align: center; }
    .table { background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    .btn-danger, .btn-warning { margin-top: 10px; }
  </style>
</head>
<body>

  <h2>🛍️ Mon Panier</h2>

  <?php if (empty($cart)): ?>
    <p class="text-center">Aucun produit dans le panier.</p>
  <?php else: ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Prix unitaire (FCFA)</th>
          <th>Quantité</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($cart as $index => $item):
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
        ?>
        <tr>
          <td><?= htmlspecialchars($item['product']) ?></td>
          <td><?= $item['price'] ?></td>
          <td><?= $item['quantity'] ?></td>
          <td><?= $subtotal ?></td>
          <td>
            <form action="remove_from_cart.php" method="POST">
              <input type="hidden" name="index" value="<?= $index ?>">
              <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <th colspan="3">Total à payer</th>
          <th colspan="2"><?= $total ?> FCFA</th>
        </tr>
      </tbody>
    </table>

    <form action="clear_cart.php" method="POST" class="text-center">
      <button type="submit" class="btn btn-warning">Vider le panier</button>
    </form>
  <?php endif; ?>

  <div class="text-center mt-4">
    <a href="index.html" class="btn btn-primary">← Continuer les achats</a>
  </div>

</body>
</html>
