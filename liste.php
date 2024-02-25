<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste photo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <a href="index.php" class="link">ajouter une photo</a>
        <?php
        include_once "connexion_dbb.php";
        //   afficher la liste des photos qui est dans la base de donnée

        $req =mysqli_query($con,"SELECT * FROM photos");

 
        // vérifier que la liste n'est pas vide

        if(mysqli_num_rows($req) < 1){
            ?>
            <p class = 'vide_message'> la liste des photos est vide</p>


            <?php

        }
        // afficher la liste des photos

        while($row = mysqli_fetch_assoc($req)){
            ?>
            
              <div class="box">
                        <img class="image_principal" src="image_bdd/<?=$row['img'] ?> " alt=""  width ="100%" height="200px" object-fit = "cover" >
                        <div><?= $row['txt'] ?></div>
                        <a href="delete.php?id=<?=$row['id']?>" class="delete_btn">
                        <img src="remove.png"  >
                        </a>
              </div>
        
            <?php 





        }







        ?>


    </section>
    
</body>
</html>