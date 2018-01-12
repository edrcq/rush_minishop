<?php

$db['user'] = "root";
$db['pass'] = "";
$db['host'] = "127.0.0.1";
$db['base'] = "minishop_ec";
$db['port'] = 3306;

try
{
    $bdd = new PDO('mysql:host='.$db['host'].';port='.$db['port'].';dbname='.$db['base'].';charset=utf8', $db['user'], $db['pass']);
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

?>