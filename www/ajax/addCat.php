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



if (isset($_POST['name']) && isset($_POST['key'])) {
    $n = count($categories) - 1;
    $lastId = $categories[$n]['id'] + 1;
    $categories[] = [
        'id' => ($lastId),
        'name' => $_POST['name'],
        'key' => $_POST['key']
    ];
    file_put_contents(__DIR__ . '/../../php/conf/categories.json', json_encode($categories));
}

header('Location: ../index.php?p=acat');
die();

?>