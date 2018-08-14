<?php
    include './assets/php/session.php';
?>

<html lang="en">
<head>
    <title>CAIR - Research</title>
    <?php include './assets/php/dependencies.php';
    ?>
</head>
<body>
    <?php include './assets/php/header.php';?>
    <h1>Welcome <?php echo $user->get_name();?></h1>
    <div>
    <b><a href="includes/add.php">Add article &lowast;</a></b>
    <br><br>
    <table style="width:100%">
  <tr>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
  
 <?php 
    foreach ($articles as $article):
        ?>
       <tr>
    <td><?php echo $article->get_title(); ?></td>
    <td><small><?php echo date("Y-m-d",$article->get_date()); ?></small></td> 
    </tr>
       
    <?php endforeach;?>
    </table>
    <br>
    <br>
    
    <?php include './assets/php/footer.php';?>
</body>
</html>