<?php
 include "../config/database.php";
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $action_type=$_POST['action_type'];
    if($action_type=="ajouter_animal"){
        $nom_animal=$_POST['animal_name'];
        $image_animal=$_POST['animal_image'];
        $habitat_animal=$_Post['animal_habitat'];
        $diet_animal=$_Post['animal_diet'];
    }
    $nom_animal = $connexion->real_escape_string($nom_animal);
    $image_animal = $connexion->real_escape_string($image_animal);
 }
?>