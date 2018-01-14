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
		?><form action="ajax/updateUser.php" method=POST>
			<td><input type="text" name="id" form="user" value="<?php echo $idx['id']; ?>"/></td>
			<td><input type="text" name="email" form="user" value="<?php echo $idx['email']; ?>"/></td>
			<td><input type="text" name="password" form="user" value="<?php echo $idx['password']; ?>"/></td>
			<td><input type="text" name="role"  value="<?php echo $idx['role']; ?>"/></td>
			<td><input type="text" name="registration_date"  value="<?php echo $idx['registration_date']; ?>"/></td>
			<td><input type="text" name="jsondata"  value="<?php echo htmlspecialchars($idx['jsondata']); ?>"/></td>
			<td><input type="submit" value="Update" /></td></form>
			<td><form action="ajax/deleteUser.php" method=POST><input type="hidden" name="id" form="user" value="<?php echo $idx['id']; ?>"/><input type="submit" value="Delete" name="del"/></form></td>
			<?php echo '</tr>';} ?>
		<tr><form action="ajax/addUser.php" method=POST>
			<td><input type="text" disabled name="id" form="user" value=""/></td>
			<td><input type="text" name="email" form="user" value=""/></td>
			<td><input type="password" name="password" form="user" value=""/></td>
			<td><input type="text" name="role"  value=""/></td>
			<td><input type="text" disabled name="r_date"  value=""/></td>
			<td><input type="text" disabled name="j_data"  value=""/></td>
			<td><input type="submit" value="Add" /></td></form>
		</tr>
	</table>
</div>
