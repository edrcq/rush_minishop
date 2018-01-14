<?php 
if (!$connected) {
    header('Location: index.php?p=login');
    die();
}
?>
<div class="account">
	<div class="accmanage">
		<span class="acctext">My account</span><br />
			<div class="accform">
				Email<br />
				<input type="text" name="email" form="user" placeholder="<?php echo $user['email']?>"></input><br /><br />
				Password<br />
				<input type="text" name="password" form="user"></input><br /><br />
				Role level<br />
				<?php echo $user['role'];?>
			</div>
		<button type="submit" class="btn">Update my informations</button><br />
		<button type="submit" class="btn">Delete my account</button>
	</div>
		<?php
			if ($isAdmin === true)
			{
				echo '<div class="account" id="apanel"><br /><hr /><br /><span class="acctext">Admin panel</span><br /><a href="?p=ausers" class="btn">Users</a><a href="?p=aproducts" class="btn">Products</a><a href="?p=aord" class="btn">Orders</a><a href="?p=addproduct" class="btn">Add a product</a></div>';
			} ?>
</div>
