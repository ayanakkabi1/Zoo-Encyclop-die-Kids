<?php
session_start();
include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action_type = $_POST['action_type'];

    if ($action_type == "ajouter_animal") {
        $nom_animal = $_POST['animal_name'];
        $image_animal = $_POST['animal_image'];
        $habitat_animal = intval($_POST['animal_habitat']); // assuming it's an ID from select
        $diet_animal = $_POST['animal_diet'];


        // Insert animal
        $sql = "INSERT INTO animal (NOM_Animal, image_animal, Type_Alimentaire, habitat_id) 
                VALUES ('$nom_animal', '$image_animal', '$diet_animal', $habitat_animal)";

        if (mysqli_query($connexion, $sql)) {
            $_SESSION['message'] = "✅ Animal ajouté avec succès !";
        } else {
            $_SESSION['message'] = "❌ Erreur: " . mysqli_error($connexion);
        }

    } elseif ($action_type == "ajouter_habitat") {
        $nom_habitat = $_POST['habitat_name'];
        $description = $_POST['habitat_description'];



        // Insert habitat
        $sql = "INSERT INTO habitat (Nom_Habitat, des_Habitat) 
                VALUES ('$nom_habitat', '$description')";

        if (mysqli_query($connexion, $sql)) {
            $_SESSION['message'] = "✅ Habitat ajouté avec succès !";
        } else {
            $_SESSION['message'] = "❌ Erreur: " . mysqli_error($connexion);
        }
    }

    header("Location: ../index.php");
    exit();
}
?>
