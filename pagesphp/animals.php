<?php 
session_start();
include(__DIR__ . "/../config/database.php");

// AFFICHAGE DE TOUS LES ANIMAUX
function getAllAnimals() {
    global $connexion;
    $sql = "SELECT a.*, h.Nom_Habitat 
            FROM animal a 
            LEFT JOIN habitat h ON a.ID_Habitat = h.ID_Habitat";
    $result = mysqli_query($connexion, $sql);
    $animals = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $animals[] = $row;
        }
    }
    return $animals;
}

if(isset($_GET["delete"])){
      $delete_id = $_GET["delete"];
      $query = "DELETE FROM animal
WHERE ID_Animal = " . $delete_id;

      if(mysqli_query($connexion,$query)){
            header("location: ../index.php");
            exit;
      }
      else{
            echo "problem";
      }
}

?>