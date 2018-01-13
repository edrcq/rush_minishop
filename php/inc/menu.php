<div id="menu">
    <ul>
        <li>Our products :<ul>
    <?php 
        foreach ($categories as $category) {
            echo '<li><a href="?p=products&category='. $category['name'] .'">'. $category['name'] .'</a></li>';
        }
    ?>
        </ul></li>
    <?php if (!$connected) { ?>
    <li><a href="?p=register">Register</a></li>
    <li><a href="?p=login">Login</a></li>
    <?php } else { ?>
    <li><a href="?p=logout">Logout</a></li>
    <?php } ?>
    </ul>
</div>