<?php
$host="localhost";
$user="root";
$pass="";
$dbname="zoo";
try{
$connexion= new mysqli($host,$user,$pass,$dbname);
echo "Connexion réussie ";
}catch(mysqli_sql_exception $e){
    die($e->getMessage());
}
?>