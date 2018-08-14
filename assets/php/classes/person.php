<?php
class Person{
    var $name;
    var $surname;
    var $email;
    var $permission;

    /*CONSTRUCTOR*/
    function __construct(){
        $this->name = "";
        $this->surname = "";
        $this->email = "";
        $this->permission = 0;
    }
    

    /*SETTERS*/
    function set_details($user_name, $user_surname, $user_email, $user_permission, $user_node){
        $this->name = $user_name;
        $this->surname = $user_surname;
        $this->email = $user_email;
        $this->permission = $user_permission;
    }
    function set_name($name){
        $this -> name = $name;
    }

    function set_surname($surname){
        $this -> surname = $surname;
    }

    function set_email($email){
        $this -> email = $email;
    }

    function set_permission($permission){
        $this -> permission = $permission;
    }

    /*GETTERS*/        
    function get_name(){
        return $this -> name;
    }

    function get_surname(){
        return $this -> surname;
    }

    function get_email(){
        return $this -> email;
    }

    function get_permission(){
        return $this -> permission;
    }

}
class Researcher extends Person{
    var $node;

    /*CONSTRUCTOR*/
    function __construct(){
        parent::__construct();
        parent::set_permission(1);
        $this->node = null;
    }
    /*SETTERS*/
    function set_details($user_name, $user_surname, $user_email, $user_permission, $user_node){
        parent::set_details($user_name, $user_surname, $user_email, 2, $user_node);
        $this->node = $user_node;
    }
    function set_node($node){
        $this -> node = $node;
    }
    /*GETTERS*/
    function get_node(){
        return $this->node;
    }
}

class Node_Administrator extends Researcher{
    function __construct(){
        parent::__construct();
        parent::set_permission(2);
    }
    function set_details($user_name, $user_surname, $user_email, $user_permission, $user_node){
        parent::set_details($user_name, $user_surname, $user_email, $user_permission, $user_node);
        
    }

    /*functions*/
    function get_reports(){
        //returns array with all researchers and research papers from the node the adminstrator administrates.
        $report = new_array();
        //all researchers in the node
        $researchers = parent::get_node()->get_researchers();
        //all articles in the node
        $articles = parent::get_node()->get_articles();
        //add elements to report array
        array_push($report, $researchers, $articles);

        return $report;
    }
}
class Global_Administrator extends Person{
    function __construct(){
        parent::__construct();
        parent::set_permission(3);
    }

    /*functions*/
    function get_reports(){
        //returns array with all researchers and research papers from the node the adminstrator administrates.
        $report = new_array();
        //all researchers in the node
        $researchers = parent::get_node()->get_researchers();
        //all articles in the node
        $articles = parent::get_node()->get_articles();
        //add elements to report array
        array_push($report, $researchers, $articles);

        return $report;
    }
}
?>