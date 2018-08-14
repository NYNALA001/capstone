<html lang="en">
<head>
    <title>CAIR - Research</title>
    <?php include './assets/php/dependencies.php';?>
    <?php include './assets/php/session.php';?>
</head>
<body>
    <?php include './assets/php/header.php';?>
    <?php if($user_permission <1){
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
    
     <h2>My Articles</h2>
    <br>  <table style="width:100%">
  <tr>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
  <b><a href="includes/add.php">Add article &lowast;</a></b>
    <br><br>
 <?php 
    foreach ($articles as $article):
        ?>
       <tr>
    <td><?php echo $article->get_title(); ?></td>
    <td><small><?php echo date("Y-m-d",$article->get_date()); ?></small></td> 
    <td><a href=<?php $i = $article->get_id(); echo "./includes/edit.php?edit=$i";?>>Edit</a></td>
    <td><a href=<?php $i = $article->get_id(); echo "./includes/delete.php?edit=$i";?>>Delete</a></td>
     </tr>
       
    <?php endforeach;?>
    </table>
    
    <?php include './assets/php/footer.php';?>
</body>
</html>