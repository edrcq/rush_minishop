<?php session_start();

require_once(__DIR__ . '/../php/init.php');

$connected = false;

if(!empty($_SESSION['connected'])) {
	$connected = true;
    $user = $UserManager->get($_SESSION['user']);
}

// TODO
if(isset($_GET)) {
	if(!empty($_GET['p'])) {
		$page = $_GET['p'];
		if(!empty($_GET['a'])) {
			$action = $_GET['a'];
		}
	}
    else {
        $page = 'home';
    }
    
}

if(isset($page) && in_array($page,$pages)) {
    $pageTitle = ucfirst($page);
    require_once(__DIR__ . '/../php/inc/header.php');
    require_once(__DIR__ . '/../php/inc/menu.php');
    require_once(__DIR__ . '/../php/pages/'.$page.'.php');
}
else {
    require_once('404.php');
}


require_once(__DIR__ . '/../php/inc/footer.php');

?>