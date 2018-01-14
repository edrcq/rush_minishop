<?php

try
{
    $mysqli = mysqli_connect($settings['db']['host'], $settings['db']['user'], $settings['db']['pass'], $settings['db']['base']);
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

function ft_mysqli_fetch_all($stmt) {
    $arr = [];
    while (($x = mysql_stmt_fetch))
}

?>