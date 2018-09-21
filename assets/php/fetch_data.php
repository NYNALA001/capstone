<?php
    include './assets/php/connection.php';
    include_once './assets/php/session.php';
    include_once './assets/php/methods.php';
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


    //load people into array
    if (isset($people_from_db)){
    	while($row = mysqli_fetch_row($people_from_db)){
            $person = new Person();
            $a = new Node();
            //user_name, user_surname, user_email, user_permission, user_node_id
            $person->set_details($row[2],$row[3],$row[4],$row[1],$row[6]);
            // constructor is name, surname, email, permission, node
            foreach ($nodes as $n):
                if($n->get_id() == $row[6]){
                    $n->add_researcher($person);
                    $nam = $n->get_name();
                    $nam_2 = $row[2];
                    //echo "<script>console.log('$nam_2 has been added to $nam node.');</script>";
                    break;
                }
            endforeach;

            
    		array_push($people, $person);
        }
        foreach ($nodes as $n):
            $c = count($n->get_researchers());
            $nam_3 = $n->get_name();
            echo "<script>console.log('$nam_3 has $c researchers');</script>";
        endforeach;
    }
    $_SESSION['people'] = serialize($people);


    //load articles into array
    if (isset($articles_from_db)){
        while($row = mysqli_fetch_row($articles_from_db)){
            $art = new Article();
            $a = new Person();
            $authors_list;
            $count = 0;
            if(count(explode(',',$row[2]))>1){
                $authors_list = explode(",", $row[2]);
                foreach ($authors_list as $email):
                    foreach($people as $p):
                        if ($p->get_email() == $email){
                            $a = $p;
                        }
                        break;
                    endforeach;
                if ($count == 0){
                    $art->set_details($row[0],$row[1],$a,$row[3],$row[4],$row[5]);
                    $count++;
                }
                else{
                $art->add_author($a);}
                endforeach;
            }
            else{
                foreach($people as $p):
                    if ($p->get_email() == $row[2]){
                        $a = $p;
                    }
                    break;
                endforeach;
                $art->set_details($row[0],$row[1],$a,$row[3],$row[4],$row[5]);
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

            //add articles to respective nodes
            foreach ($articles as $arti):
                $writers = $arti->get_authors();
                foreach($writers as $another):
                    $node_id_2 = $another->get_node_id();
                endforeach;
            endforeach;
        }
    }
    //store articles in session
    $_SESSION['articles'] = serialize($articles);
    
    foreach ($nodes as $a){
        $id =  $a->get_id();
    }

?>