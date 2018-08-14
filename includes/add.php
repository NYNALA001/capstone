<?php
include_once('connection.php');
include_once('article.php');

$article = new Article;




if(isset($_POST['title'],$_POST['content'],$_POST['author'])){
$newTitle = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_author,article_timestamp) VALUES (?,?,?,?)");
        
        
    $query->bindValue(1,$newTitle);
    $query->bindValue(2,$content);
     $query->bindValue(3,$author);
    $query->bindValue(4,time());
    
        $query->execute();
header('location: ../');
}
?>
<form action= "" method = "post">
      Title:<input type="text" name="title" placeholder="Title"/><br><br>
    Author: <input type="text" name="author" placeholder="Author"/><br>
    <br><br>
    content:<textarea rows="15" cols="20" name="content"> </textarea><br><br>
      
      <input type="submit" Value="Add"/>
   </form>

<a href="..">&larr; Back</a>
          
    