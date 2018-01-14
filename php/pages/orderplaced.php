<?php
if (!$connected) {
    header('Location: index.php?p=login');
    die();
}
?>
<div class="container">
    <?php
    if (isset($_SESSION['order'])) {
        echo '<p><strong>Success! ' . $_SESSION['order']['message'] . '</strong></p>';
        unset($_SESSION['order']);
    }
    else {
        $_SESSION['error'] = ['from' => 'cart', 'message' => 'Order problem ?'];
        header('Location: ../index.php?p=cart');
        die();
    }
    ?>
</div>