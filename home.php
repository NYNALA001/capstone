<!DOCTYPE html>
<html>
   <head>
      <title>CBIB</title>
   </head>
   <body>
      <div class ="container">
         <a href="home.php" id = "logo">CBIB</a>
      </div>
   </body>
</html>
<?php 
   session_start();
   //5f4dcc3b5aa765d61d8327deb882cf99
   include_once('includes/connection.php');
   include_once('includes/article.php');
   
   $article = new Article; 
   $articles = $article->fetch_all();
   $rcounter = 0; //Counter for homepage table
   $rcounter2 = 0; //Counter for logged in table


   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
       //Check if Logged in!!
       $user = $_SESSION['name'];
       ?>
<div style="float: right;">
   <table cellspacing="30">
      <tr>
         <td ><b>Hi <?php echo $user;?>!</b></td>
         <td><a href="logout">logout</a></td>
      </tr>
   </table>
</div>
<br><br><br><br>

<div>
    <b><a href="includes/add.php">Add article &lowast;</a></b>
    <br><br>
    <table style="width:100%">
  <tr>
    <th style="text-align: left;">Num</th>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
  
 <?php foreach ($articles as $article){ ?>

       <?php if ($article['article_author']== $user){$rcounter2++;?>
       <tr>
    <td><?php echo $rcounter2; ?></td>
    <td><a href ="article.php?id=<?php echo $article['article_id'];?>"><?php echo $article['article_title'];?></a></td>
    <td><small><?php echo date('l jS',$article['article_timestamp']) ?></small></td> 
    <td><a href="includes/edit.php?edit=<?php echo $article['article_id'];?>">Edit</a></td>
    <td><a href="includes/delete.php?edit=<?php echo $article['article_id'];?>">Delete</a></td>
     </tr>
       
      <?php }} ?>
    </table>
   
</div>
<?php
   } else {
       //If not logged in then display homepage
       ?>
<div style="float: right">
   <table>
      <tr>
         <td><small><a href="#">Forgot password?</a></small> <small><a href="#">Register</a></small>
      </tr>
   </table>
   <?php if (isset($error)){?>
   <small style="color:#aa0000;"><?php echo $error;?></small>
   <br/><br/>
   <?php }?>
   <form action= "home.php" method = "post" style="float:right">
      <input type="text" name="username" placeholder="username">
      <input type="password" name="password" placeholder="password" />
      <input type="submit" Value="Login"/>
   </form>
</div>
<br><br><br><br>

 
<table style="width:100%">
  <tr>
    <th style="text-align: left;">Num</th>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;">PDF</th>
  </tr>
  
 <?php foreach ($articles as $article){ $rcounter++;?>

       
       <tr>
    <td><?php echo $rcounter; ?></td>
    <td><a href ="article.php?id=<?php echo $article['article_id'];?>"><?php echo $article['article_title'];?></a></td>
    <td><small><?php echo date('l jS',$article['article_timestamp']) ?></small></td> 
    <td>pdf</td>
     </tr>
       
      <?php }?>
    </table>
   
<?php
   if(isset($_POST['username'], $_POST['password'])){ //Login section
       $_SESSION['name']=$_POST['username'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);
    
       if (empty($username) or empty($password)){ $error = "All fields are required!";}
       else{
           
           $query = $pdo->prepare("SELECT*FROM users WHERE user_name = ? AND user_password = ?");
           $query->bindValue(1,$username);
           $query->bindValue(2,$password);
           $query->execute();
           
           $num = $query->rowCount();
           
           if ($num == 1){
                //Correct details
                $_SESSION['logged_in']=true;
                header('Location: home.php?');
                exit();
           }else{//incorrect details
               $error = "Incorrect details!";
           }
           
       }
   }
   
 }     
   //print_r($articles);
   ?>