<?php
include_once './assets/php/session.php';
?>

<div id="header-panel">
    <a href='./'>HOME</a>
    <a href='./'>PEOPLE</a>
    <a href='./'>NODES</a>
    <a href='./'>PUBLICATIONS</a>
    <?php
    if (isset($_SESSION['user'])){
        $user = unserialize($_SESSION['user']); 
        $user_permission = $user->get_permission();
    }else{
        $user_permission = 0;
    }
        if (isset($_SESSION) && $_SESSION['logged_in'] == 'true'){
            echo "
            <a href='./profile.php'>PROFILE</a> ";
            
            if (($user_permission == 1) || ($user_permission == 2) || ($user_permission == 3) ){
            echo " <a href='./dashboard.php'>DASHBOARD</a> ";} ?>
            <div style="float: right">
            <?php 
                $n = $user->get_name();
            echo "Hi, <a href='profile.php'>$n</a> | <a href='./logout.php'>LOGOUT</a>";?>
            </div>
            <?php
        }
    ?>
   
    
    <!--<a href='./search.php'>Search</a>-->
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