<?php
class Node{
    var $name;
    var $researchers;
    var $admins;
    var $articles;

    /*CONSTRUCTOR*/
    function __construct(){
        $this -> name = 'undefined';
        $this -> researchers = new_array();
        $this -> admins = new_array();
        $this -> articles = new_array();
    }
    /*SETTERS*/
    function set_name($name){
        $this -> name = $name;
    }

    function set_admin($admin){
        $this->admins = new_array();
        array_push($this->admins, $admin);
    }
    function set_researcher($researcher){
        $this->researchers = new_array();
        array_push($this->researchers, $researcher);
    }
    function set_article($article){
        $this->articles = new_array();
        array_push($this->articles, $article);
    }

    /*GETTERS*/
    function get_name(){
        return $this -> name;
    }
    function get_admins(){
        return $this -> admins;
    }
    function get_researchers(){
        return $this -> researchers;
    }

    /*functions*/
    
    function add_admin($admin){
        array_push($this->admins, $admin);
    }
    
    function add_researcher($researcher){
        array_push($this->researchers, $researcher);
    }
}
?>