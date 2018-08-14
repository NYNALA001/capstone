<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=cbib','root','');
}catch (PDOException $e){ 
    exit('Database error.');
}
?>