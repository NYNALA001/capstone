<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php include 'assets/php/dependencies.php'?>
    <?php include 'assets/php/server.php'?>
</head>
<body>
    <?php
        include 'assets/php/header.php';
    ?>
        <div>
            <div>
                Login
            </div>
            <form action="login.php" method="post">
            <?php
                include 'error.php';
            ?>
            <label>Email</label><br>
            <input type="email" class="form-input" autofocus name="email" value=<?php if(isset($_POST['email'])) echo '"'.$_POST['email'].'"';?>><br>
            <label>Password</label><br>
            <input type="password" name="password"><br>
            <input type="submit" name = 'login' value="Login">
            </form>

            Don't have an account? <a href="register.php"><u>Register</u></a>
        </div>
        
    <?php
        include 'assets/php/footer.php';
    ?>
</body>
</html>