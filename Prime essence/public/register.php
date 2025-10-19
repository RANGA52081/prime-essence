<?php
// public/register.php
session_start();
require_once __DIR__ . '/../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$name || !$email || !$password) {
        $error = "Please fill all fields.";
    } else {
        // check existing
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email already registered.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hash]);
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_name'] = $name;
            header("Location: index.php");
            exit;
        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register - Prime Essence</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="auth-container">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
      <label>Name</label>
      <input name="name" required>
      <label>Email</label>
      <input name="email" type="email" required>
      <label>Password</label>
      <input name="password" type="password" required>
      <button type="submit">Create account</button>
    </form>
    <p>Already have account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
