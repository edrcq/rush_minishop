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

if (!(isset($data['list']) && count($data['list']) !== 0)) {
    $_SESSION['error'] = ['from' => 'cart', 'message' => 'Empty cart...'];
    header('Location: ../index.php?p=cart');
    die();
}

$order = new Order;

$list = []; // ["id" => "quantity"]
$total = 0;
$nb = 0;
foreach ($data['list'] as $id => $item) {
    if (intval($item['quantity']) == 0) {
        continue ;
    }
    if (($product = $ProductManager->get($id)) === false) {
        continue ;
    }
    $total += intval($item['quantity']) * floatval($product->price);
    $list[$id] = $item['quantity'];
    $nb += $item['quantity'];
}

if (count($list) || $total == 0 || $nb == 0) {
    $_SESSION['error'] = ['from' => 'cart', 'message' => 'Empty cart...'];
    header('Location: ../index.php?p=cart');
    die();
}

$order->setList($list);
$order->total = $total;
$order->nb = $nb;
$order->status = "Pending confirmation";

$order_id = $OrderManager->add($order);

if (intval($order_id) > 0) {
    $_SESSION['order'] = ['from' => 'cart', 'message' => 'Your order is placed!'];
    header('Location: ../index.php?p=orderplaced');
    die();
}

?>