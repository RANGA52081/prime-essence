<?php
// public/dosa.php
session_start();
$user_id = $_SESSION['user_id'] ?? null;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dosa - Prime Essence</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'index.php'; // simple header reuse; you can modularize later ?>
  <main class="container">
    <h2>Customize Dosa</h2>
    <?php if (!$user_id): ?>
      <p>Please <a href="login.php">login</a> to order.</p>
    <?php else: ?>
      <form action="save_order.php" method="post">
        <input type="hidden" name="item_name" value="Dosa">
        <label>Size</label>
        <select name="size">
          <option>Regular</option>
          <option>Large</option>
        </select>

        <label>Spice level</label>
        <select name="spice_level">
          <option>Mild</option>
          <option>Medium</option>
          <option>Hot</option>
        </select>

        <label>Extras (comma separated)</label>
        <input name="extras" placeholder="Cheese, Onion...">

        <label>Quantity</label>
        <input type="number" name="quantity" value="1" min="1">

        <label>Price (INR)</label>
        <input type="number" step="0.01" name="price" value="120">

        <button type="submit">Add to cart</button>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>
