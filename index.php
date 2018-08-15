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
    
    <br><br>
    <table style="width:100%">
  <tr>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
   <div>
    <form  method="post" action="search.php?go"  id="searchform"> 
      <input  type="text" name="name" placeholder="article name"> 
	      <input  type="submit" name="Search" value="Search"> 
 </form> 
        </div>
        <br><br><br>
 <?php 
    foreach ($articles as $article):
        ?>
       <tr>
           
    <td><a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title(); ?></a></td>
    <td><small><?php echo date("Y-m-d",$article->get_date()); ?></small></td> 
    </tr>
       
    <?php endforeach;?>
    </table>
    <br>
    <br>
    
    <?php include './assets/php/footer.php';?>
</body>
</html>