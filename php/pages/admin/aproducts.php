<div class="btn"> 
	<?php 
		$p = ProductManagerGetAll();
		foreach ($p as $idx)
		{
			echo $idx['name']."\n";
			echo $idx['description']."\n";
			echo $idx['price']."\n";
		}
	?>
		
</div>
