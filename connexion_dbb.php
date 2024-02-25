<?php
// connexion à la base de donnée
$con = mysqli_connect("localhost","root","","gestion_metier");

if(!$con){
    die('Erreur :'.mysqli_connect_error());
}
?>
