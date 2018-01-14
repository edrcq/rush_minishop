<?php $p = ProductManagerGetAll(); ?>
<div class="admin"> 
	<table>	
		<tr>
			<th>Image</th>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Color</th>
			<th>Description</th>
			<th>Stock</th>
			<th>JSon data</th>
			<th>Price</th>
			<th colspan="2">Actions</th>
		</tr>
		<?php
			foreach ($p as $idx) {
				echo '<tr>';
		?><form action="ajax/updateProduct.php" method="post" >
			<td><img src="http://chestnutglobalpartners.in/wp-content/uploads/2017/06/placeholder.png" /><!--<?php echo $idx['img']; ?>--></td>
			<td><input type="text" name="id"  value="<?php echo $idx['id']; ?>"/></td>
			<td><input type="text" name="name"  value="<?php echo $idx['name']; ?>"/></td>
			<td><input type="text" name="category"  value="<?php echo $idx['category']; ?>"/></td>
			<td><input type="text" name="color" value="<?php echo $idx['color']; ?>"/></td>
			<td><input type="text" name="description"  value="<?php echo $idx['description']; ?>"/></td>
			<td><input type="text" name="stock" value="<?php echo $idx['stock']; ?>"/></td>
			<td><input type="text" name="jsondata"  value="<?php echo $idx['jsondata']; ?>"/></td>
			<td><input type="text" name="price"  value="<?php echo $idx['price']; ?>"/></td>
			<td><input type="submit" name="update" id="update_<?php echo $idx['id']; ?>" value="Update" /></td></form>
			<td><form action="ajax/deleteProduct.php" method="post"><input type="hidden" value="<?php echo $idx['id']; ?>" name="id" /><input type="submit" name="delete" id="delete_<?php echo $idx['id']; ?>" value="Delete" /></form></td>
		<?php echo '<tr>';} ?>
		<tr><form action="ajax/addProduct.php" method="post" >
			<td><img src="http://chestnutglobalpartners.in/wp-content/uploads/2017/06/placeholder.png" /><!--<?php echo $idx['img']; ?>--></td>
			<td><input type="text" name="id"  value=""/></td>
			<td><input type="text" name="name"  value=""/></td>
			<td><input type="text" name="category"  value=""/></td>
			<td><input type="text" name="color" value=""/></td>
			<td><input type="text" name="description"  value=""/></td>
			<td><input type="text" name="stock" value=""/></td>
			<td><input type="text" name="jsondata"  value=""/></td>
			<td><input type="text" name="price"  value=""/></td>
			<td><input type="submit" name="update" id="add" value="Add" /></td></form>
		</tr>
	</table>
</div>