<div class="container">
    <p class="message">
    <?php
    if (isset($_SESSION['error'])) {
        echo 'Error! ' . $_SESSION['error']['message'];
        unset($_SESSION['error']);
    }
    ?>
    </p> 
    <div class="form">
        <form action="ajax/login.php" method="POST">
            Email : <input class="form-input" type="email" name="email" id="email" /><br />
            Password : <input class="form-input" type="password" name="password" id="password" /><br />
            <input type="submit" value="login" name="submit" />
        </form>
    </div>
</div>