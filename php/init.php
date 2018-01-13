<?php

$settings = json_decode(file_get_contents(__DIR__ . "/conf/settings.json"), true);
$categories = json_decode(file_get_contents(__DIR__ . "/conf/categories.json"), true);
var_dump($settings);
/* Load $db
 * A instance of PDO for reach the mysql database
 * Config : php/conf/settings.json
 */ 
include_once('conf/db.php');

/* Authorized pages */
$pages = ['login', 'home', 'products'];

/* Loading Objects */
$objectsDir = 'objects';

while (($filename = readdir($objectsDir)) !== false) {
    require_once($filename);
}

/* Loading Managers */
$managersDir = 'managers';

while (($filename = readdir($managersDir)) !== false) {
    require_once($filename);
}

$UserManager = new UserManager($db);

?>