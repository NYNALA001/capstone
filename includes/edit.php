<?php
include_once('../assets/php/connection.php');
include_once('connection.php');
include_once('article.php');

$article = new Article;


if (isset($_GET['edit'])){
    
    $edit = $_GET['edit'];
    $data = $article->fetch_data($edit);

if(isset($_POST['submit_edit'])){
    $newTitle = $_POST['title'];
    $content = $_POST['content'];
     //mysqli_real_escape_string() 
    // $query = $pdo->prepare("UPDATE `articles` SET (`article_title`, `article_content`) VALUE ($newTitle,$content) WHERE `article_id` = '$edit';");
    // $query->bindValue(1,$newTitle);
    // $query->bindValue(2,$content);
    // $query->execute();
    
    $sql = "UPDATE `articles` SET `article_title` = '$newTitle', `article_content` = '$content' WHERE `article_id` = '$edit'";
    mysqli_query($dbc, $sql);
        
header('location: ../dashboard.php');
}
?>
<form action= "" method = "post">
      Title:<input required type="text" name="title" value="<?php echo $data['article_title']; ?>"/><br><br><br>
    content:<textarea reuired rows="15" cols="20" name="content"><?php echo $data['article_content']; ?></textarea><br><br>
      
      <input type="submit" name="submit_edit" Value="Save"/>
</form>
          
      <?php    }
?>

<a href="../dashboard.php">&larr; Back</a>