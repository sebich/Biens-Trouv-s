<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Liste produits</title>  
</head>


<body>

<?php

    include("menu.php"); 

    include("header.php");

    include("sidebar.php");

    include("sidebar2.php");
?>
<div id="wrapper">
    <div id="content">
        <div class="content_section">
            <h2>Nos produits</h2>
            <?php
                $db = getConnexion();      
                $reponse = $db->query('SELECT * FROM produit');
                while ( $valeur= mysqli_fetch_assoc($reponse)){
            ?>    
           
        <div class="product_box">
            <h3><?php echo $valeur['libelle'] ?></h3>
                <div class="image_wrapper">
                    <img src="images/<?php echo $valeur['photo1']?>" alt=<?php echo $valeur['libelle'] ?> /></div>
                    <p class="prix"><?php echo "Prix : ".$valeur['prix']. " €" ?></p>
                    <a href="detailArticle.php?idpdt=<?php echo $valeur['idpdt'] ?>">Détail</a>
                     | <a href="ajoutPanier.php?idpdt=<?php echo $valeur['idpdt'] ?>">Ajout panier</a>
                    
        </div>

             
                <?php } ?>
        </div><!--end content-section--> 
    </div><!--end content-->
</div><!--end wrapper-->       

<?php include("footer.php"); ?>

</body>
</html>