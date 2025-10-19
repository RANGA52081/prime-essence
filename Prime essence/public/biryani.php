<?php
// public/biryani.php
session_start();
$user_id = $_SESSION['user_id'] ?? null;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chicken Biryani - Prime Essence</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'index.php'; ?>
  <main class="container">
    <h2>Customize Chicken Biryani</h2>
    <?php if (!$user_id): ?>
      <p>Please <a href="login.php">login</a> to order.</p>
    <?php else: ?>
      <form action="save_order.php" method="post">
        <input type="hidden" name="item_name" value="Chicken Biryani">
        <label>Portion</label>
        <select name="size">
          <option>Half</option>
          <option>Full</option>
        </select>

        <label>Spice level</label>
        <select name="spice_level">
          <option>Mild</option>
          <option>Medium</option>
          <option>Hot</option>
        </select>

        <label>Extras (comma separated)</label>
        <input name="extras" placeholder="Raita, Salad...">

        <label>Quantity</label>
        <input type="number" name="quantity" value="1" min="1">

        <label>Price (INR)</label>
        <input type="number" step="0.01" name="price" value="220">

        <button type="submit">Add to cart</button>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>
