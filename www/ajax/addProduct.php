<?php 
session_start();

require_once(__DIR__ . '/../../php/init.php');

if (!isset($_SESSION['connected'])) {
    header('Location: ../index.php?p=home');
    die();
}
if (!isset($_SESSION['admin']) || $_SESSION['admin'] === false) {
    header('Location: ../index.php?p=home');
    die();
}

$prod = [
    'jsondata' => ''
];

if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['color']) && isset($_POST['description']) && isset($_POST['stcok']) && isset($_POST['price'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false) {
        $user['email'] = $_POST['email'];
        $user['password'] = hash('sha512', $_POST['password']);
        $user['role'] = intval($_POST['role']);
        ProductManagerAdd($user);
    }
}

header('Location: ../index.php?p=ausers');
die();
?>