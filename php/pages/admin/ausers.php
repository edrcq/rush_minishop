<?php $u = UserManagerGetAll(); ?>
<div class="admin"> 
	<table>	
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Password</th>
			<th>Role</th>
			<th>Registration date</th>
			<th>JSon data</th>
			<th colspan="2">Actions</th>
		</tr>
		<?php
			foreach ($u as $idx) { 
				echo '<tr>';
		?>
			<td><input type="text" name="id" form="user" placeholder="<?php echo $idx['id']; ?>"</td>
			<td><input type="text" name="name" form="user" placeholder="<?php echo $idx['email']; ?>"</td>
			<td><input type="text" name="id" form="user" placeholder="<?php echo $idx['password']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['role']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['registration_date']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['jsondata']; ?>"</td>
			<td><input type="submit" value="Update" /></td>
			<td><input type="submit" value="Delete" name="del"/></td>
			<?php echo '<tr>';} ?>
	</table>
</div>
