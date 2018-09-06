<?php
class Node{
    var $id;
    var $name;
    var $focus;
    var $description;
    var $dp_url;

    var $researchers;
    var $admins;
    var $articles;

    /*CONSTRUCTOR*/
    function __construct(){
        $this -> name = 'undefined';
        $this -> id = -1;
        $this -> focus = 'undefined';
        $this -> description = 'undefined';
        $this -> dp_url = 'undefined';

        $this -> researchers = array();
        $this -> admins = array();
        $this -> articles = array();
    }
    /*SETTERS*/
    function set_details($id, $name, $focus, $description, $url ){
        $this -> name = $name;   
        $this -> focus = $focus;   
        $this -> description = $description;   
        $this -> dp_url = $url;
        $this -> id = $id;

    }
    function set_id($id){
        $this -> id = $id;
    }
    function set_name($name){
        $this -> name = $name;
    }
    function set_focus($focus){
        $this -> focus = $focus;
    }
    function set_description($description){
        $this -> description = $description;
    }
    function set_dp_url($dp_url){
        $this -> dp_url = $dp_url;
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
    function get_id(){
        return $this -> id;
    }
    function get_name(){
        return $this -> name;
    }
    function get_focus(){
        return $this -> focus;
    }
    function get_description(){
        return $this -> description;
    }
    function get_dp_url(){
        return $this -> dp_url;
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