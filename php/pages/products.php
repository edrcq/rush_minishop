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
    <?php echo 'Category Name : ' . $catName; ?>
    <?php echo '<br />Category value : ' . $cat; ?>
    <?php 
        $products = [];
        if ($cat == 'all') {
            $products = $ProductManager->getAll();
        }
        else {
            $products = $ProductManager->getByCategory($cat);
        }
    ?>
    <br />
    <div class="product-list">
        <?php 
        foreach ($products as $product) {
            ?>
            <div class="product">
                <h3 class="product-name"><?php echo $product->name; ?></h3>
                <span class="product-desc"><?php echo $product->description; ?></span>
            </div>
            <?php 
        }
        ?>
    </div>
</div>