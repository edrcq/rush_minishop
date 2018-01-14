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
    echo 'ok';
    $prod['name'] = $_POST['name'];
    $prod['category'] = $_POST['category'];
    $prod['color'] = $_POST['color'];
    $prod['description'] = $_POST['description'];
    $prod['stock'] = intval($_POST['stock']);
    $prod['price'] = floatval($_POST['price']);
    $pid = ProductManagerAdd($prod);
}
var_dump($_POST);
var_dump($prod);
var_dump($pid);

//header('Location: ../index.php?p=aproducts');
die();
?>