<?php

$settings = json_decode(file_get_contents(__DIR__ . "/conf/settings.json"), true);
$categories = json_decode(file_get_contents(__DIR__ . "/conf/categories.json"), true);

/* Load $db
 * A instance of PDO for reach the mysql database
 * Config : php/conf/settings.json
 */ 
include_once('conf/db.php');

/* Authorized pages */
$pages = ['login', 'register', 'logout', 'home', 'products', 'cart'];
$pages_admin = ['products', 'users', 'categories'];

/* Loading Objects */
$objectsPath = __DIR__ . '/objects';
foreach (scandir($objectsPath) as $filename) {
    $path = $objectsPath . '/' . $filename;
    if (is_file($path)) {
        require $path;
    }
}

/* Loading Managers */
$managersPath = __DIR__ . '/managers';
foreach (scandir($managersPath) as $filename) {
    $path = $managersPath . '/' . $filename;
    if (is_file($path)) {
        require $path;
    }
}

$UserManager = new UserManager($db);
$ProductManager = new ProductManager($db);

?>