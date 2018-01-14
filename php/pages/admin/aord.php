<?php $p = ProductManagerGetAll(); ?>
<div class="admin"> 
	<table>	
		<tr>
			<th>id</th>
			<th>list</th>
			<th>total</th>
			<th>nb</th>
			<th>order date</th>
			<th>JSon data</th>
			<th>status</th>
			<th colspan="2">Actions</th>
		</tr>
		<?php
			foreach ($p as $idx) {
				echo '<tr>';
		?>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['id']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['list']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['total']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['nb']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['order_date']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['jsondata']; ?>"</td>
			<td><input type="text" name="id" form="product" placeholder="<?php echo $idx['status']; ?>"</td>
			<td><input type="submit" value="Update" /></td>
			<td><input type="submit" value="Delete" /></td>
		<?php echo '<tr>';} ?>
	</table>
</div>
