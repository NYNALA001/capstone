<html lang="en">
<head>
    <title>CAIR - Research</title>
    <?php include './assets/php/dependencies.php';?>
    <?php include './assets/php/session.php';?>
</head>
<body>
    <?php include './assets/php/header.php';
     if($user_permission <1){
        echo '<script>
        window.location = "index.php";
        </script>';
    }?>
    <?php 
        switch ($user_permission){
            case 1:
            include './assets/php/researcher_dashboard.php';
            break;
            case 2:
            include './assets/php/node_dashboard.php';
            break;
            case 3:
                include './assets/php/global_dashboard.php';
            break;
            default:
                echo '<script>
                window.location = "";
                </script>';
            break;

        }
    ?>
    
</body>
</html>