<?php


include_once "connexion_dbb.php";


// vérification
if(isset($_POST['send'])){

    if(!empty($_FILES['image']) && isset($_POST['text']) && $_POST['text']!="" ){

        // recupération de l'image
        $img_nom = $_FILES['image']['name'];

        // défintion d'un nom temporaire
        $tmp_nom = $_FILES['image']['tmp_name'];

        // on récupère l'heure actuelle
        $time = time();

        // on renomme l'image : heure + nom image (nom unique)
        $nouveau_nom_img = $time.$img_nom;
         
        // deplacer l'image vers le dossier "image_bdd"
        $deplacer_img = move_uploaded_file($tmp_nom,"image_bdd/".$nouveau_nom_img);

        if($deplacer_img){

            // insertion dans la base de donnée
            $text = $_POST['text'];
            $req = mysqli_query($con,"INSERT INTO photos VALUES(NULL,'$nouveau_nom_img','$text')");

            // vérifier que la requete fonctionne
            if($req){
                header("location:liste.php");

            }else{
                $message = "echec de l'ajout de l'image";

            }



        }else{
            $message = "veuillez choisir une image de taille inférieur à 1 MO";
        }


    }else{
        // si les champs sont vides
        $message = "veuillez rempli tous les champs";


    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserer image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="liste.php" class ="link">liste des photos</a>
    <p class = "error">
        <?php
        // afficher une erreur

        if(isset($message)){
            echo "$message";
        }
        
        
        ?>





    </p>
    <form action="" method="POST" enctype="multipart/form-data">
        <LAbel>ajouter une photo</LAbel>
        <input type="file" name="image"> 
        <label for=""> description</label>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="ajouter" name = "send">



    </form>
    
</body>
</html>

 