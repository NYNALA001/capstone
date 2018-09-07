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
            $tmp_authors;
            $authors_list;
            $count = 0;
            if(count(explode(',',$row[2]))>1){
                $authors_list = explode(",", $row[2]);
                foreach ($authors_list as $email):
                $a = new Person();
                $a -> set_email($email);
                if ($count == 0){
                    $art->set_details($row[0],$row[1],$a,$row[3],$row[4],$row[5]);
                    $count++;
                }
                else{
                $art->add_author($a);}
                endforeach;
            }
            else{
                $art->set_details($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
            }
            // if ($row[2] != ""){
            //     $authors_list = explode(",", $row[2]);
            //     foreach ($authors_list as $email):
            //       $a = new Person();
            //       $a -> set_email($email);
            //       $art->add_author($a);
            //     endforeach;
            //   }
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
    $_SESSION['people'] = serialize($people);
    
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
    $_SESSION['nodes'] = serialize($nodes);

?>