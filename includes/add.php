<?php

include_once '../assets/php/session.php';
include_once '../assets/php/connection.php';
include_once '../assets/php/classes/article.php';
include_once '../assets/php/classes/person.php';





if(isset($_POST['title'],$_POST['content'])){
    
  $article = new Article;
  $newTitle = $_POST['title'];
  $content = $_POST['content'];
  $url = "";
  
  $target_dir = "../assets/uploads/";
  $target_file = $target_dir . basename($_FILES["pdf"]["name"]);
  $uploadOk = 1;

  if (is_uploaded_file($_FILES['pdf']['tmp_name'])){
    if ($_FILES['pdf']['type'] != "application/pdf"){
      //echo "File must be pdf<br>";
      header('location: ../dashboard.php?error=upload');
    }
    else{
      $result = move_uploaded_file($_FILES['pdf']['tmp_name'], $target_file);
      if ($result == 1 ){
        $url = substr($target_file, 1);
      }
    }
  }
  $article -> set_details(NULL,$newTitle, $user, $content, time(), $url);
  $person = unserialize($_POST['cair_contributor']);
  if($person instanceof Person){
  $article ->add_author(unserialize($_POST['cair_contributor']));}

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

<div style = "background-color:#72A1D1">
<a href="./"><div class="float-left"><img src="../assets/images/cair-logo.png" alt="CAIR logo" class="header-logo"></div></a></div>

<br><br>


<form action= "" method = "post" enctype="multipart/form-data">
      Title:<input type="text" name="title" placeholder="Title" required/><br><br>
    CAIR contributor: 
    <select name="cair_contributor"class="form-input">
      <option disabled selected>Select Researcher</option>
      <?php
        $s = unserialize($_SESSION['people']);
        
        foreach ($s as $a):
          if($a->get_permission() > 0 && $a->get_permission()<3){
          $r = $a->get_name();
          $r .= ' '.$a->get_surname();
          $id= serialize($a);
        echo "<option value='$id'>$r</option>";}
        endforeach;
      ?>
    </select><br>
    Non-CAIR contributor name: 
    <input type="text" name="author" placeholder="Co-authors email"/><br>
    <br><br>
    Abstract:<textarea rows="15" cols="20" name="content" required></textarea><br><br>
      <input type="file" name="pdf" required/><br/><br/>
      <input type="submit" name ="submit" Value="Add"/>
   </form>

<a href="../dashboard.php">&larr; Back</a>
          
    