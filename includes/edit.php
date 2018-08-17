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
      //echo "upload complete.<br>File uploaded to $target_file";
        $url = substr($target_file, 1);
        
        $sql = "UPDATE `articles` SET `article_title` = '$newTitle', `article_content` = '$content', `article_url` = '$url' WHERE `article_id` = '$edit'";
        mysqli_query($dbc, $sql);
    }
    else{

        $sql = "UPDATE `articles` SET `article_title` = '$newTitle', `article_content` = '$content' WHERE `article_id` = '$edit'";
        mysqli_query($dbc, $sql);
    }
    }
  }
  else{

      $sql = "UPDATE `articles` SET `article_title` = '$newTitle', `article_content` = '$content' WHERE `article_id` = '$edit'";
      mysqli_query($dbc, $sql);
  }
        
header('location: ../dashboard.php');
}
?>
<form action= "" method = "post" enctype="multipart/form-data">
      Title:<input required type="text" name="title" value="<?php echo $data['article_title']; ?>"/><br><br><br>
    Abstract:<textarea reuired rows="15" cols="20" name="content"><?php echo $data['article_content']; ?></textarea><br><br>
      Change Article: <input type="file" name="pdf"><br><br>
      <input type="submit" name="submit_edit" Value="Save"/>
</form>
          
      <?php    }
?>

<a href="../dashboard.php">&larr; Back</a>