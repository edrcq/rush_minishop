<?php 
    $cat = 'all';
    $catName = 'All products';
    /* Check if GET category is ok, if not : actual category is all */
    foreach ($categories as $ctgr) {
        if ($ctgr['key'] == $_GET['category']) {
            $cat = $ctgr['key'];
            $catName = $ctgr['name'];
            break;
        }
    }
?>

<div class="container">
    <?php 
        $products = [];
        if ($cat == 'all') {
            $products = ProductManagerGetAll();
        }
        else {
            $products = ProductManagerGetByCategory($cat);
        }
    ?>
   
    <br />
    <div class="product-list">
        <?php 
        foreach ($products as $product) {
            ?>
            <div class="product">
				<img src="http://chestnutglobalpartners.in/wp-content/uploads/2017/06/placeholder.png" alt="img"/>
                <div id="title"><?php echo $product['name']; ?></div>
                <div id="description"><?php echo $product['description']; ?><div id="color">Color: <span id="colblock" style="background-color: <?php echo $product['color'];?>">&nbsp;</span></div></div>
                <div id="price">$<?php echo $product['price']; ?></div>
				
                <button class="btn" onclick="cartAddProduct('<?php echo $product['id']; ?>', '<?php echo $product['name']; ?>', 1, '<?php echo $product['price']; ?>')">Add 1 to cart</span>

            </div>
            <?php 
        }
        ?>
    </div>
</div>
