<html lang="en">

<head>
    <title>CAIR - Research</title>
    <?php include './assets/php/dependencies.php';?>
        <?php include './assets/php/session.php';?>
</head>

<body>
    <?php include './assets/php/header.php';?>

        <?php if($user_permission <0){
        echo '<script>
        window.location = "index.php";
        </script>';
    }?>
            <h1>My Profile</h1>
            <div id="profile-pic"></div>

            <br>
            <br> Name:
            <?php echo $user->get_name();?>
                <br> Surname:
                <?php echo $user->get_surname();?>
                    <br> Email:
                    <?php echo $user->get_email();?>
                        <br>Node: <?php 
    $id = $user->get_node_id();
    
    $nodes = unserialize($_SESSION['nodes']);
                
    foreach ($nodes as $tmp):
    
    $r = $tmp->get_name();
    $node_id = $tmp ->get_id();
    if ($node_id == $id){
        echo $r;
        break;
    }
    endforeach;
    
    ?><br>
                        <br>
                        <?php if($user_permission == 4){
        echo "<h2>MEMBERSHIP REJECTED</h2> Your application to become a CAIR member has been rejected. Please ensure that the necessary procedures have been followed before applying to become a CAIR member. To request new membership, please contact the your node administrator.";
    }
    else if($user_permission == 0){
        echo "<h2>MEMBERSHIP REQUESTED</h2>";
    }else if ($user_permission == 1 || $user_permission == 2){
        echo "<br>
        <br>Research focus:<br>Location:";
    }

    ?>
 <br>
 <br>
 <?php include './assets/php/footer.php';?>
</body>

</html>