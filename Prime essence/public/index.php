<?php
// public/index.php
session_start();
$user_name = $_SESSION['user_name'] ?? null;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Prime Essence</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="site-header">
    <h1>Prime Essence</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="dosa.php">Dosa</a>
      <a href="biryani.php">Chicken Biryani</a>
      <?php if ($user_name): ?>
        <span>Hello, <?=htmlspecialchars($user_name)?></span>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
      <?php endif; ?>
    </nav>
  </header>

  <main class="container">
    <h2>Welcome to Prime Essence</h2>
    <p>Explore our customizable Dosa and Chicken Biryani. Log in to place orders.</p>
  </main>

  <script src="js/main.js"></script>
</body>
</html>
