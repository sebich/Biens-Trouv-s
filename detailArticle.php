<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lobster|Spicy+Rice" rel="stylesheet">
  <title>Détail articles</title>  
</head>

<body>
<?php include('menu.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<<div id="wrapper">
    <div id="content">
        <div class = "detail">
        <?php
        $idpdt = $_GET['idpdt'];
        
        $reponse= mysqli_query($db,"SELECT * FROM produit WHERE idpdt = '$idpdt'");    
            $idpdt = $valeur['idpdt'];
            $libelle = $valeur['libelle'];
            $photo1 = $valeur['photo1'];
            $photo2 = $valeur['photo2'];
            $photo3 = $valeur['photo3'];
            $photo4 = $valeur['photo4'];
            $description = $valeur['description'];
            $datePublication = $valeur['datePublication'];

            while ($valeur = mysqli_fetch_assoc($reponse)) {
            echo "<h3>Libelle</h3>";
                echo"<br>"; 
                echo "<div class=\"titre\">";   
                echo "<p>" . $valeur['libelle'] . "</p></div>";
                echo"<br>";
            echo "<h3>Photo</h3>"; 
                echo"<br>";
                echo"<div class=\"zoom\">";
                echo "<p><img src=\"images/".$valeur['photo1']."\"</p></div>";
                echo"<br>";
            echo "<h3>PHOTOS Supplémentaires</h3>";
                echo"<br>";
                echo "<p><img src=\"images/".$valeur['photo2']."\",<p><img src=\"images/".$valeur['photo3']."\",
                <p><img src=\"images/".$valeur['photo4']."\"</p>";
                echo"<br>";
            echo "<h3>Description</h3>"; 
                echo"<br>";
                echo "<p>".$valeur['description']."</p>";
                echo"<br>";
                echo "<div class=\"prix\">";
                echo "<p>".$valeur['prix']." €</p></div>";
                echo"<br>";
                echo "<p>".$valeur['datePublication']."</p>";  
            }
            echo "<div class=\"button_02\"><a href=\"listePdts.php\">Retour</a></div>";
            echo "<div class=\"button_03\"><a href=\"ajoutPanier.php?idpdt=".$valeur['idpdt']."\">Acheter</a></div>";
        ?>     
        </div>
    </div>
</div>    
<?php include('footer.php');?>
</body>
</html>