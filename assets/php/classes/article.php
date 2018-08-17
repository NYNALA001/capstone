<?php
    class Article{
        var $id;
        var $title;
        var $authors;
        var $date;
        var $abstract;
        var $link;

        /*CONSTRUCTOR*/
        function __construct(){
            $this -> id = null;
            $this -> title = 'Untitled';
            $this -> authors = array();
            $this -> date = new DateTime();
            $this -> abstract = 'New article abstract';
            $this -> link = "";

        }
        /*SETTERS*/
        function set_details($id, $title, $authors, $abstract, $date, $url){
            $this->id = $id;
            $this->title = $title;
            array_push($this->authors,$authors);
            $this->date = $date;
            $this->abstract = $abstract;
            $this -> link = $url;
        }
        function set_title($title){
            $this->title = $title;
        }
        function set_author($author){
            $this->authors = array();
            array_push($this->authors, $author);
        }
        function set_date($date){
            $this->date = $date;
        }
        function set_abstract($abstract){
            $this->abstract = $abstract;
        }
        function set_link($link){
            $this->link = $link;
        }
        /*GETTERS*/
        function get_id(){
            return $this->id;
        }
        function get_title(){
            return $this->title;
        }
        function get_authors(){
            return $this->authors;
        }
        function get_date(){
            return $this->date;
        }
        function get_abstract(){
            return $this->abstract;
        }
        function get_link($link){
            return $this->link;
        }

        /*functions*/
        function add_author($author){
            array_push($this->authors, $author);
        }

        function push_to_db($dbc){
            //push article data into database
            $title = $this->title;
            $abstract = $this->abstract;
            $url = $this->link;
            $author_id = "";
            $date = $this -> date;
            $authors_list = $this -> authors;
            $count = 0;
            foreach ($authors_list as $a):
                    if ($count<1)
                    $author_id .= $a->get_email();
                    else
                    $author_id .= ','.$a->get_email();
                    $count++;
            endforeach;
            
            $query = "INSERT INTO articles (`article_title`, `article_content`, `article_author`, `article_url`, `article_timestamp`) VALUES ('$title', '$abstract', '$author_id', '$url', '$date')";
            $result = mysqli_query($dbc, $query);
        }
    }
?>