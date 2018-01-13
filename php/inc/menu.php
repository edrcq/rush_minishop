<div id="menu">
    <ul>
        <li><a href="?p=home">Home</a></li>
        <li><a href="?p=products">All Products</a><ul>
    <?php 
        foreach ($categories as $category) {
            echo '<li><a href="?p=products&category='. $category['key'] .'">'. $category['name'] .'</a></li>';
        }
    ?>
        </ul></li>
        <li><a href="?p=cart">My Cart</a></li>
        <?php if (!$connected) { ?>
        <li><a href="?p=register">Register</a></li>
        <li><a href="?p=login">Login</a></li>
        <?php } else { ?>
        <li><a href="?p=logout">Logout</a></li>
        <?php } ?>
    </ul>
</div>