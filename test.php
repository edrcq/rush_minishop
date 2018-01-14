<?




try
{
   // $db = new PDO('mysql:host=guiedo.com;port=3306;dbname=minishop_ec;charset=utf8', 'minishop_ec', 'Hil741Uvwy59csH1');
    $mysqli = mysqli_connect("guiedo.com", "minishop_ec", "Hil741Uvwy59csH1", "minishop_ec");
    require_once(__DIR__ . '/php/proceduralDatabase/UserManager.php');

    // UserManagerAdd(acc)  UserManagerGet(id)


    $us = UserManagerGetAll();
    var_dump($us);
    
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

