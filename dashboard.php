<html lang="en">
<head>
    <title>CAIR - Research</title>
    <?php include './assets/php/dependencies.php';?>
    <?php include './assets/php/session.php';?>
</head>
<body>
    <?php include './assets/php/header.php';?>
    <?php if($user_permission <2){
        echo '<script>
        window.location = "index.php";
        </script>';
    }?>
    <h1>Dashboard page</h1>
    <br>
    <br>
    <h2>View, edit, delete account and articles/research papers here<br>Node admins can also create, edit and delete Nodes and approve or delete users</h2>
    <br>
    <br>
    Only accessible to Administrators (Different content depending on type of Admin).
    
    <?php include './assets/php/footer.php';?>
</body>
</html>