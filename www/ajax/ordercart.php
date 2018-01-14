<?php 
session_start();

require_once(__DIR__ . '/../../php/init.php');

if (!empty($_SESSION['connected'])) {
    $_SESSION['error'] = ['from' => 'cart', 'message' => 'You have to be connected for order your cart'];
    header('Location: ../index.php?p=login');
    die();
}

$postdata = file_get_contents("php://input");

$data = json_decode($postdata, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    $_SESSION['error'] = ['from' => 'cart', 'message' => 'Bad cart format, strange error, do you want to fuck us? Oo"'];
    header('Location: ../index.php?p=cart');
    die();
}

// $data[]