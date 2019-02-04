<?php 
session_start();
include("connexionBd.php");
$db=getConnexion();
include("fonctionPanier.php");

    $idpdt = $_GET['idpdt'];
    
    $reponse= mysqli_query($db,"SELECT * FROM produit WHERE idpdt = '$idpdt'");
            $valeur= mysqli_fetch_assoc($reponse);
              
            $idpdt = $valeur['idpdt'];
            $libelle = $valeur['libelle'];
            $prix = $valeur['prix'];
            $quantite = $valeur['qtePdt'];
          $photo1 = $valeur['photo1'];

                     
    $quantite = 1;
    $total = 0;

    ajoutPdtPanier($idpdt,$photo1,$libelle,$prix,$quantite);   
  
  header("Location:listePdts.php");
   

?>    