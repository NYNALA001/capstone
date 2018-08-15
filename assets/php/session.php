<?php
    @session_start();
    include 'class_lib.php';

    if (!(isset($_SESSION['logged_in']))){
        
        //INITIALIZE SESSION AND DEFAULT SESSION VARIABLES
        $_SESSION['logged_in'] = 'false';
        $u = new Person();
        $_SESSION['user'] = serialize($u);
    }
    else{
        if($_SESSION['logged_in']){
            $user = $_SESSION['user'];
            $user = unserialize($user);
        }

    }

    
?>