<?php $p = OrderManagerGetAll(); ?>
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
		?><form action="ajax/updateOrder.php" method="post">
			<td><input type="text" name="id" value="<?php echo $idx['id']; ?>"/></td>
			<td><input type="text" name="list"  value="<?php echo htmlspecialchars($idx['list']); ?>"/></td>
			<td><input type="text" name="total" value="<?php echo $idx['total']; ?>"/></td>
			<td><input type="text" name="nb"  value="<?php echo $idx['nb']; ?>"/></td>
			<td><input type="text" name="order_date" value="<?php echo $idx['order_date']; ?>"/></td>
			<td><input type="text" name="jsondata"  value="<?php echo $idx['jsondata']; ?>"/></td>
			<td><input type="text" name="status"  value="<?php echo $idx['status']; ?>"/></td>
			<td><input type="submit" value="Update" /></td></form>
			<td><form action="ajax/deleteOrder.php" method="POST"><input type="hidden" name="id" value="<?php echo $idx['id']; ?>"/><input type="submit" value="Delete" /></form></td>
		<?php echo '</tr>';} ?>
	</table>
</div>
