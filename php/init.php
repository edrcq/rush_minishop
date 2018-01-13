<?php

$settings = json_decode(file_get_contents("conf/settings.json"));
$categories = json_decode(file_get_contents("conf/categories.json"));

/* Load $db
 * A instance of PDO for reach the mysql database
 * Config : php/conf/settings.json
 */ 
require_once('conf/db.php');

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