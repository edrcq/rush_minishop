<?php

$settings = json_decode(file_get_contents(__DIR__ . "/conf/settings.json"), true);
$categories = json_decode(file_get_contents(__DIR__ . "/conf/categories.json"), true);

/* Load $db
 * A instance of PDO for reach the mysql database
 * Config : php/conf/settings.json
 */ 
include_once('conf/db.php');

/* Authorized pages */
$pages = ['login', 'register', 'logout', 'home', 'products', 'cart', 'myaccount', 'orderplaced'];
$pages_admin = ['products', 'users', 'categories', 'orders'];

/* Loading procedural Database */
$managersPath = __DIR__ . '/proceduralDatabase';
foreach (scandir($managersPath) as $filename) {
    $path = $managersPath . '/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

?>