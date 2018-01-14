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

if (isset($_POST['name']) && isset($_POST['key']) && isset($_POST['id'])) {
    if (filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        $n = 0;
        $find = false;
        foreach ($categories as $cat) {
            if ($cat['id'] == $_POST['id']) {
                $find = true;
                break ;
            }
            $n++;
        }
        if ($find) {
            $categories[$n] = [
                'id' => $_POST['id'],
                'key' => $_POST['key'],
                'name' => $_POST['name']
            ];
        }
    }
}

header('Location: ../index.php?p=acat');
die();

?>