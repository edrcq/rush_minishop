<?php 
session_start();

require_once(__DIR__ . '/../../php/init.php');

if (!empty($_SESSION['connected'])) {
    header('Location: ../index.php?p=home');
    die();
}
if (!empty($_SESSION['admin']) && $_SESSION['admin'] === false) {
    header('Location: ../index.php?p=home');
    die();
}

$aff_row = ProductManagerUpdate($_POST);

echo $aff_row;

?>