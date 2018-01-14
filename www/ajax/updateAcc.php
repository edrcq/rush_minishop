<?php
	session_start();

	require_once(__DIR__.'/../../php/init.php');
	if (!empty($_SESSION['connected']) && $_SESSION['connected'])
	{
		$user = UserManagerGet($_SESSION['user']);

		if ($user['email'] !== $_POST['email'])
			$user['email'] = $_POST['email'];
		if (($user['password'] !== $_POST['password']) && $_POST['password'])
			$user['password'] = password_hash($_POST['password'], "sha512");
		UserManagerUpdate($user);
		print("Updated");
		header('Location: ../index.php?p=home');
	}
	else
		header('Location: ../index.php?p=login');
?>
