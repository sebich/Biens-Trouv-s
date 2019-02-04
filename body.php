<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lobster|Spicy+Rice" rel="stylesheet">
    <title>accueil</title>  
</head>


<body>
<div id="wrapper">
  <div id="content">
    <div class= "first_content">
      <h2>Produits présentés</h2>
      <?php
                $db = getConnexion();  
                
                $result = $db->query('SELECT * FROM produit');
                  while ( $valeur= mysqli_fetch_assoc($result)){
        ?>    
      <div class="slider">
       <!-- <div class="slides">-->
          <!--<div id= "vignettes">-->       
              <img src="images/<?php echo $valeur['photo1'] ?>"alt=<?php echo $valeur['libelle'] ?>/>
         <!--</div>-->     
       <!-- </div> -->
      </div>
          <?php } ?>  
    </div>
    <!--end of first_content-->
    <div class="content_section">
        <h2>Bienvenue sur notre site</h2>
          <p>Première réalisation en sortant de ma formation, ce site à été conçu en famille avec l'aide de ma femme et mes enfants.
          Non, nous ne voulons pas concurrencer ces grands sites dèjà existants, notre souhait est de permette à toute personne 
          visitant notre site de trouver son bonheur parmi les articles que nous vendons.
          Nous vous invitons une fois connecter à nous laisser quelques commentaires.
          Bonne visite. :o))
          </p>
    </div>
        
    <div class="content_section">
        <h2>Nos produits</h2>
        <?php
                $db = getConnexion();      
                $reponse = $db->query('SELECT * FROM produit LIMIT 0, 6');
                while ( $valeur= mysqli_fetch_assoc($reponse)){
        ?>    
        <div class="product_box">
          <h3><?php echo $valeur['libelle'] ?></h3>
            <div class="image_wrapper">
              <img src="images/<?php echo $valeur['photo1']?>" alt=<?php echo $valeur['libelle'] ?> /></div>
              <p class="prix"><?php echo "Prix : ".$valeur['prix']. " €" ?></p>
                <a href="detailArticle.php?idpdt=<?php echo $valeur['idpdt'] ?>">Détail</a>
        </div>
                <?php } ?>
              
    <div class="cleaner"></div><br />

    <div class="button_01"><a href="listePdts.php">Voir tout</a></div>
    </div><!--end content-section-->        
  </div><!--end content-->
</div><!--end wrapper-->

</body>

</html>