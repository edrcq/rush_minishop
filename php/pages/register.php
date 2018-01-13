<div class="container">
    <p class="message">
    <?php
    if (isset($_SESSION['error'])) {
        echo 'Error! ' . $_SESSION['error']['message'];
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['register'])) {
        echo 'Success! ' . $_SESSION['register']['message'];
        unset($_SESSION['register']);
    }
    ?>
    </p> 
    <div class="form">
        <form action="ajax/register.php" method="POST">
            Email : <input class="form-input" type="email" name="email" id="email" /><br />
            Password : <input class="form-input" type="password" name="password" id="password" /><br />
            Repeat password : <input class="form-input" type="password" name="rpassword" id="rpassword" /><br />
            <input type="submit" value="register" name="submit" />
        </form>
    </div>
</div>