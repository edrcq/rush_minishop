<?php

$settings = json_decode(file_get_contents(__DIR__ . "/conf/settings.json"), true);
$categories = json_decode(file_get_contents(__DIR__ . "/conf/categories.json"), true);

/* Load $db
 * A instance of PDO for reach the mysql database
 * Config : php/conf/settings.json
 */ 
include_once('conf/db.php');

/* Authorized pages */
$pages = ['login', 'home', 'products'];

/* Loading Objects */
$objectsPath = __DIR__ . '/objects';
$objectsDir = opendir($objectsPath);

while (($filename = readdir($objectsDir)) !== false) {
    require_once($objectsPath.'/'.$filename);
}

/* Loading Managers */
$managersPath = __DIR__ . '/managers';
$managersDir = opendir($managersPath);

while (($filename = readdir($managersDir)) !== false) {
    require_once($managersPath.'/'.$filename);
}

$UserManager = new UserManager($db);

?>