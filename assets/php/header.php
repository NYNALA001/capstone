<?php
include_once './assets/php/session.php';
?>

<div>
    <a href='./'>Home</a>
    <?php
    if (isset($_SESSION['user'])){
        $user = unserialize($_SESSION['user']); 
        $user_permission = $user->get_permission();
    }else{
        $user_permission = 0;
    }
        if (isset($_SESSION) && $_SESSION['logged_in'] == 'true'){
            echo "
            <a href='./profile.php'>Profile</a> ";
            
            if (($user_permission == 2) || ($user_permission == 3) ){
            echo " <a href='./dashboard.php'>Dashboard</a> ";}
            
            echo "<a href='./logout.php'>Logout</a>";
            
        }
    ?>
    <a href='./search.php'>Search</a>
    <div style="float: right">
    <?php
        if ($_SESSION['logged_in'] == 'false'){
            echo "
                <form action='login.php' method='post'>
                    <input type='email' name='email' placeholder='Email...'>
                    <input type='password' name='password' placeholder='Password...'>
                    <input type='submit' name='login' value='Login'>
                </form>
            ";}
    ?>
        </div>
</div>