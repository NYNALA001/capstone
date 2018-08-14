<?php
    include './assets/php/connection.php';
    include_once './assets/php/session.php';
    /*fetch all article data*/
    $articles = array();
    // fetch articles from db 
    $query = "SELECT * FROM articles";  
    $articles_from_db = mysqli_query($dbc, $query);
    //load articles into array
    if (isset($articles_from_db)){
        while($row = mysqli_fetch_row($articles_from_db)){
            $art = new Article();
            $art->set_details($row[0],$row[1],$row[2],$row[3],$row[4]);
            array_push($articles, $art);
        }
    }
    //store articles in session
    $_SESSION['articles'] = serialize($articles);

?>