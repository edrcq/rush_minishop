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
var_dump($_POST);
$aff_row = ProductManagerUpdate($_POST);
var_dump($aff_row);
//header('Location: ../index.php?p=aord');
die();

?>