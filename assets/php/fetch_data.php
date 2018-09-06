<?php
    include './assets/php/connection.php';
    include_once './assets/php/session.php';
    /*fetch all article data*/
    $articles = array();
    $people = array();
    $nodes = array();
    // fetch articles from db 
    $query = "SELECT * FROM articles";  
    $query2 = "SELECT * FROM users"; 
    $query3 = "SELECT * FROM nodes"; 
    $articles_from_db = mysqli_query($dbc, $query);
    $people_from_db = mysqli_query($dbc, $query2);
    $nodes_from_db = mysqli_query($dbc, $query3);
    //load articles into array
    if (isset($articles_from_db)){
        while($row = mysqli_fetch_row($articles_from_db)){
            $art = new Article();
            $art->set_details($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
            array_push($articles, $art);
        }
    }
    //store articles in session
    $_SESSION['articles'] = serialize($articles);
    
    //load people into array
    if (isset($people_from_db)){
    	while($row = mysqli_fetch_row($people_from_db)){
    		$person = new Person();
    		// constructor is name, surname, email, permission, node
    		$person->set_details($row[2],$row[3],$row[4],$row[1],$row[4],$row[6]);
    		array_push($people, $person);
    	}
    }
    
    //load nodes into array
    if (isset($nodes_from_db)){
    	while($row = mysqli_fetch_row($nodes_from_db)){
    		$node = new Node();
    		// constructor is id, name, focus, description, dp_url
    		$node->set_details($row[0],$row[1],$row[2],$row[5],$row[4]);
    		array_push($nodes, $node);
    	}
    }
    //store articles in session
    $_SESSION['people'] = serialize($nodes);

?>