<?php

try
{
    $db = new PDO('mysql:host='.$settings['db']['host'].';port='.$settings['db']['port'].';dbname='.$settings['db']['base'].';charset=utf8', $settings['db']['user'], $settings['db']['pass']);
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

?>