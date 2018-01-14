
<div class="admin"> 
	<table>	
		<tr>
			<th>ID</th>
			<th>Menu Name</th>
			<th>URL Key</th>
			<th colspan="2">Actions</th>
		</tr>
		<?php
			foreach ($categories as $cat) { 
				echo '<tr>';
		?><form action="ajax/updateCat.php" method=POST>
			<td><input type="text" name="id" value="<?php echo $cat['id']; ?>"/></td>
			<td><input type="text" name="name" value="<?php echo $cat['name']; ?>"/></td>
			<td><input type="text" name="key" value="<?php echo $cat['key']; ?>"/></td>
			<td><input type="submit" value="Update" /></td></form>
			<td><form action="ajax/deleteCat.php" method=POST><input type="hidden" name="id" value="<?php echo $cat['id']; ?>"/><input type="submit" value="Delete" name="del"/></form></td>
			<?php echo '</tr>';} ?>
		<tr><form action="ajax/addCat.php" method=POST>
			<td><input type="text" disabled name="id" placeholder="AUTO"/></td>
			<td><input type="text" name="name" value="" placeholder="Menu Name"/></td>
            <td><input type="text" name="key" value="" placeholder="URL Key"/></td>
			<td><input type="submit" value="Add" /></td></form>
		</tr>
	</table>
</div>
