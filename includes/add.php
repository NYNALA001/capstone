<?php

include_once '../assets/php/session.php';
include_once '../assets/php/connection.php';
include_once '../assets/php/classes/article.php';





if(isset($_POST['title'],$_POST['content'],$_POST['author'])){
    
  $article = new Article;
  $newTitle = $_POST['title'];
  $content = $_POST['content'];
  
  $article -> set_details(NULL,$newTitle, $user, $content, time());
  
  if ($_POST['author'] != ""){
    $authors_list = explode(";", $_POST['author']);
    foreach ($authors_list as $email):
      $a = new Person();
      $a -> set_email($email);
      $article->add_author($a);
    endforeach;
  }



  //echo $author;
  $article -> push_to_db($dbc);

  header('location: ../dashboard.php');
}
?>
<form action= "" method = "post">
      Title:<input type="text" name="title" placeholder="Title"/><br><br>
    Co-authors: <input type="email" name="author" placeholder="Co-authors email"/><br>
    <br><br>
    Abstract:<textarea rows="15" cols="20" name="content"></textarea><br><br>
      
      <input type="submit" Value="Add"/>
   </form>

<a href="../dashboard.php">&larr; Back</a>
          
    