<?php
    @session_start();
    include 'class_lib.php';

    if (!(isset($_SESSION['logged_in']))){
        
        //INITIALIZE SESSION AND DEFAULT SESSION VARIABLES
        $_SESSION['logged_in'] = 'false';
        $user = new Person();
        $_SESSION['user'] = serialize($user);
    }
    else{
        if($_SESSION['logged_in']){
            $user = $_SESSION['user'];
            $user = unserialize($user);
        }
    }

    
?>