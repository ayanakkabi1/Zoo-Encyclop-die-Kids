<?php
$host="localhost";
$user="root";
$pass="";
$dbname="zoo";
try{
$connexion=  mysqli_connect($host,$user,$pass,$dbname);
}catch(mysqli_sql_exception $e){
    die($e->getMessage());
}
?>