<?php
if (isset($_SESSION['error'])) {
    echo '<p><strong>Error! ' . $_SESSION['error']['message'] . '</strong></p>';
    unset($_SESSION['error']);
}
?>
<div id="cart">
    
    
</div>

<div class="footercart"> 
    <form action="ajax/ordercart.php" method="POST" id="cartForm">
        <input type="hidden" value="" name="cartData" id="cartData" />
        <button type="submit" class="btn"  onclick="cleanCart">Order !</button>
    </form>
    <button class="btn" onclick="buyCart">Clean cart</button>
<div>