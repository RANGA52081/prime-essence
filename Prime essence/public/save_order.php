<?php
// public/save_order.php
session_start();
require_once __DIR__ . '/../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    // not logged in
    header('Location: login.php');
    exit;
}

$item_name = $_POST['item_name'] ?? 'Item';
$size = $_POST['size'] ?? null;
$spice_level = $_POST['spice_level'] ?? null;
$extras = $_POST['extras'] ?? null;
$quantity = max(1, (int)($_POST['quantity'] ?? 1));
$price = (float)($_POST['price'] ?? 0);

try {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, item_name, size, spice_level, extras, quantity, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $item_name, $size, $spice_level, $extras, $quantity, $price]);

    $_SESSION['flash'] = "Order added: $item_name (x$quantity)";
    header('Location: index.php');
    exit;
} catch (Exception $e) {
    die("Error saving order: " . $e->getMessage());
}
