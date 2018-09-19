<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
    
    //print_r($data);
    ?>

 
    

<html>
<div style = "background-color:#72A1D1">
<a href="./"><div class="float-left"><img src="./assets/images/cair-logo.png" alt="CAIR logo" class="header-logo"></div></a></div>
<body>
    
    <div class ="container">
    
    <h1>
        <?php echo $data['article_title'];?>
        - <small>posted <?php echo date('l jS',$data['article_timestamp']) ?></small>
        
        </h1>
        <br><br>
        <p><?php echo $data['article_content'] ?>
        <br><br><br><br>
            <a href="./<?php echo $data['article_url'];?>" target="_blank">Preview</a> 
            <a href="<?php echo $data['article_url'];?>" download>Download</a>
        </p>
        <br><br>

        <a href="index.php">&larr; Back</a>
    </div>
</body>
</html>
    <?php
} else {
    header('Location: index.php');
    exit();
}?>