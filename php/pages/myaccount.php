<?php
if (!$connected) {
    header('Location: index.php?p=login');
    die();
}
?>
<div class="account">
	<div class="accmanage">
		<span class="acctext">My account</span><br />
			<form action="ajax/updateAcc.php" method="POST">
				<div class="accform">
					Email<br />
					<input type="text" name="email" value="<?php echo $user['email']?>"></input><br /><br />
					Password<br />
					<input type="text" name="password"></input><br /><br />
					Role level<br />
					<?php echo $user['role'];?>
				</div>
			<button type="submit" class="btn">Update my informations</button><br />
			</form>
		<button type="submit" class="btn">Delete my account</button><br />
	<span class="acctext">Orders history</span><br />
	<table>
		<?php
			$p = OrderManagerGetAll();
			foreach ($p as $idx) {
				if ($idx['uid'] === $user['id']) {
						echo '<tr><td>'.$idx['id'].'</td>';
						echo '<td>'.$idx['list'].'</td>';
						echo '<td>'.$idx['total'].'</td>';
						echo '<td>'.$idx['nb'].'</td>';
						echo '<td>'.$idx['order_date'].'</td>';
						echo '<td>'.$idx['jsondata'].'</td>';
						echo '<td>'.$idx['status'].'</td><tr>';
				}
			} ?>
	</table>
	</div>
		<?php
			if ($isAdmin === true)
			{
				echo '<div class="account" id="apanel"><br /><hr /><br /><span class="acctext">Admin panel</span><br /><a href="?p=ausers" class="btn">Users</a><a href="?p=aproducts" class="btn">Products</a><a href="?p=aord" class="btn">Orders</a></div>';
			} ?>
</div>
