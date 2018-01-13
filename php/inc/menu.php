<div id="menu">
    <ul>
    <?php 
        foreach ($categories as $category) {
            echo '<li><a href="?page=products&category='. $category .'">'. $category .'</a></li>';
        }
    ?>
    </ul>
</div>