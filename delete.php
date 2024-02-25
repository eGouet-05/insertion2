 <?php
//  supprimer la photo
// récupérer l'ID dans le lien
$id = $_GET['id'];
// inclure la page de connexion
include_once "connexion_dbb.php";
// supprimer la photo qui correspond a l'id
$req = mysqli_query($con,"DELETE FROM photos WHERE id = $id ");
header("location:liste.php");




?>