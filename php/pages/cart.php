<div id="cart">
    
    <form action="ajax/ordercart.php" method="POST" id="cartForm">
        <input type="hidden" value="" name="cartData" id="cartData" />
        <button type="submit" class="btn"  onclick="cleanCart">Order !</button>
    </form>
    <button class="btn" onclick="buyCart">Clean cart</button>
</div>