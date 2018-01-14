<?

try
{
    $db = new PDO('mysql:host=guiedo.com;port=3306;dbname=minishop_ec;charset=utf8', 'minishop_ec', 'Hil741Uvwy59csH1');
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

