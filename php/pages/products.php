<?php 
    $cat = 'all';
    /* Check if GET category is ok, if not : actual category is all */
    foreach ($categories as $ctgr) {
        if ($ctgr['name'] == $_GET['category']) {
            $cat = $_GET['category'];
            break;
        }
    }
    $catName = ucfirst($cat);
?>

<div class="container">
    <?php echo 'Category Name : ' . $catName; ?>
    <?php echo '<br />Category value : ' . $cat; ?>
</div>