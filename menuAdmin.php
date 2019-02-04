<?php
//session_start();
include("fonctionArticlePanier.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lobster|Spicy+Rice" rel="stylesheet">
  <title>menu</title>
</head>

<body> 
  
    <div id="menu">
            <ul>
              <li><a href="accueilAdmin.php"><span>01</span>Accueil</a></li>
              <li><a href="listePdts.php"><span>02</span>Nos Produits</a></li>
              <li><a href="panier.php"><span>03</span>Mon Compte</a></li>
              <li><a href="administrateur.php"><span>04</span>Admin.</a></li>
            </ul>  
                         
<!--Définition d'un compteur de visite-->            
      <div class= "compteur">       
        <?php 
        $compteur = fopen("compteur.txt", "r+");
        $nbvisites = fgets($compteur, 10);
        if ($nbvisites == "") $nbvisites = 0;
        $nbvisites++;
        fseek($compteur, 0);
        fputs($compteur, $nbvisites);
        fclose($compteur);
        echo "<h4> Mon site compte : " . $nbvisites . " visite(s)</h4>";
        ?>   
      </div>
      
      <div class = "logopanier">
      <a href="panier.php"><img src="images/panier.png"/>
      <?php
        if(isset($_SESSION['username'])){
          echo"(". nbreArticlePanier().")" ;
        }
       ?>
      </a>
      </div>
    </div> 
</body>
</html> 
    