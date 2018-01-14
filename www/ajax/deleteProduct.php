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
if (isset($_POST['id']) && filter_var($_POST['id'], FILTER_VALIDATE_INT))
    $aff_row = ProductManagerUpdate($_POST['id']);

header('Location: ../index.php?p=aproducts');
die();

?>