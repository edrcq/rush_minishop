<div id="menu">
    <ul>
    <?php 
        foreach ($categories as $category) {
            echo '<li><a href="?p=products&category='. $category['name'] .'">'. $category['name'] .'</a></li>';
        }
    ?>
    </ul>
</div>