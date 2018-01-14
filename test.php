<?




try
{
   // $db = new PDO('mysql:host=guiedo.com;port=3306;dbname=minishop_ec;charset=utf8', 'minishop_ec', 'Hil741Uvwy59csH1');
    $mysqli = mysqli_connect("guiedo.com", "minishop_ec", "Hil741Uvwy59csH1", "minishop_ec");
    require_once(__DIR__ . '/php/proceduralDatabase/UserManager.php');

    // UserManagerAdd(acc)  UserManagerGet(id)
    $id = UserManagerAdd(newUser());
    var_dump($id);

    $userEmail = UserManagerGetByEmail('er@gg.com');
    var_dump($userEmail);
    $nu = newUser();
    $nu['id'] = 9;
    UserManagerUpdate($nu);
}
catch (Exception $e)
{
    die('Erreur MySQL, veuillez patienter ou contactez un administrateur. <br /><br />' . $e->getMessage());
}

