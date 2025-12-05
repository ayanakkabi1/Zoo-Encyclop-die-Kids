<?php 
session_start();
include("./config/database.php");

// AFFICHAGE DE TOUS LES ANIMAUX
function getAllAnimals() {
    global $connexion;
    $sql =  $sql = "SELECT a.*, h.Nom_Habitat 
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
?>