<?php
include_once('connection.php');
include_once('article.php');

$article = new Article;


if (isset($_GET['edit'])){
    
    $edit = $_GET['edit'];
    $data = $article->fetch_data($edit);

if(isset($_POST['title'],$_POST['content'])){
$newTitle = $_POST['title'];
$content = $_POST['content'];
    $query = $pdo->prepare("UPDATE articles SET (article_title, article_content) VALUE (?,?) WHERE article_id = '$edit';");
        
        
    $query->bindValue(1,$newTitle);
    $query->bindValue(2,$content);
        $query->execute();
header('location: ../home.php');
}
?>
<form action= "../home.php" method = "post">
      Title:<input type="text" name="title" value="<?php echo $data['article_title']; ?>"/><br><br><br>
    content:<textarea rows="15" cols="20" name="content"> <?php echo $data['article_content']; ?>"</textarea><br><br>
      
      <input type="submit" Value="Save"/>
</form>
          
      <?php    }
?>