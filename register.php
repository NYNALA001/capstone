<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <?php include 'assets/php/dependencies.php'?>
    <?php include 'assets/php/server.php'?>
</head>
<body>
    <?php
        include 'assets/php/header.php';
    ?>
    <div>
        <div>
            Register
        </div>
        <form action="register.php" method="post">
            
        <?php
                include 'error.php';
             
            ?>
        <label>First name</label><br>
        <input type="text" name="first_name" autofocus value=<?php if(isset($_POST['first_name'])) echo '"'.$_POST['first_name'].'"';?>><br>
        <label>Last name</label><br>
        <input type="text" name="last_name" autofocus value=<?php if(isset($_POST['last_name'])) echo '"'.$_POST['last_name'].'"';?>><br>
        <label>Email</label><br>
        <input type="email" name="email" value=<?php if(isset($_POST['email'])) echo '"'.$_POST['email'].'"';?>><br>
        <label>Password</label><br>
        <input type="password" name="password"><br>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation"><br>
        <input type="submit" name = 'register' value="Register">
        </form>

        Already have an account? <a href="login.php"><u>Login</u></a>
    </div>
    <?php
        include 'assets/php/footer.php';
    ?>
</body>
</html>