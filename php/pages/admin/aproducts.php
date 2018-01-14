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
		?>
			<td><img src="http://chestnutglobalpartners.in/wp-content/uploads/2017/06/placeholder.png" /><!--<?php echo $idx['img']; ?>--></td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['id']; ?>"</td>
			<td><input type="text" name="name" form="product" placeholder="<?php echo $idx['name']; ?>"</td>
			<td><input type="text" name="category" form="product" placeholder="<?php echo $idx['category']; ?>"</td>
			<td><input type="text" name="color" form="product" placeholder="<?php echo $idx['color']; ?>"</td>
			<td><input type="text" name="description" form="product" placeholder="<?php echo $idx['description']; ?>"</td>
			<td><input type="text" name="stock" form="product" placeholder="<?php echo $idx['stock']; ?>"</td>
			<td><input type="text" name="jsondata" form="product" placeholder="<?php echo $idx['jsondata']; ?>"</td>
			<td><input type="text" name="price" form="product" placeholder="<?php echo $idx['price']; ?>"</td>
			<td><input type="submit" value="Update" /></td>
			<td><input type="submit" value="Delete" /></td>
		<?php echo '<tr>';} ?>
	</table>
</div>
