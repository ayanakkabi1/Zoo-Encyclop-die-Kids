<?php
session_start();
 include "../config/database.php";
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $action_type=$_POST['action_type'];
    if($action_type=="ajouter_animal"){
        $nom_animal=$_POST['animal_name'];
        $image_animal=$_POST['animal_image'];
        $habitat_animal=intval($_POST['animal_habitat']);
        $diet_animal=$_POST['animal_diet'];
        
        $nom_animal = $connexion->real_escape_string($nom_animal);
        $image_animal = $connexion->real_escape_string($image_animal);
       
        $sql="INSERT INTO animal (NOM_Animal,image_animal,Type_Alimentaire,habitat_id)
        VALUES ('$nom_animal','$image_animal','$diet_animal',(SELECT id FROM habitats WHERE nom = '$nom_habitat')";
        
         if ($connexion->query($sql) === TRUE) {
            $_SESSION['message'] = "✅ Animal ajouté avec succès !";
        } else {
            $_SESSION['message'] = "❌ Erreur: " . $connexion->error;
        }
}elseif ($action_type == "ajouter_habitat") {
        
        $nom_habitat = $_POST['habitat_name'];
        $description = $_POST['habitat_description'];
        
        $nom_habitat = $conn->real_escape_string($nom_habitat);
        $description = $conn->real_escape_string($description);
        
        $sql = "INSERT INTO habitat (Nom_Habitat, des_Habitat) 
                VALUES ('$nom_habitat', '$description')";
    }
    header("Location: ../index.php");
    exit();
 }
?>