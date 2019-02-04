<?php 
//session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styleAdmin.css" rel="stylesheet" type="text/css" />
    <title>DOSSIER ADMINISTRATEUR</title>
</head>
<body>
    

    <?php
    include ('menuAdmin.php');
    //include('menu.php');
    include('connexionBd.php');
    $db = getConnexion();

//liste des clients enregistrés sur le site
    echo "<hr><h1>LISTE DES CLIENTS</h1><hr>";
    $resultat = mysqli_query($db, "SELECT * FROM client");
    echo "<table border =1>
    <th>ID CLIENT</th><th>NOM CLIENT</th><th>PRENOM CLIENT</th><th>EMAIL CLIENT</th><th>USER CLIENT</th><th>PASSWORD CLIENT</th>
    <th>ADRESSE CLIENT</th><th>TEL CLIENT</th><th>COMPTE</th>";
    while ($valeur = mysqli_fetch_assoc($resultat)) {
        echo "<tr><td>" . $valeur['idClt'] . "</td><td>" . $valeur['nomClt'] . "</td><td>" .
            $valeur['prenomClt'] . "</td><td>" . $valeur['emailClt'] . "</td><td>" . $valeur['usernameClt'] . "</td>
            <td>" . $valeur['passwordClt'] . "</td><td>" . $valeur['adresseClt'] . "</td><td>" . $valeur['telClt'] . "</td>
            <td>" . $valeur['compte'] . "</td></tr>";
    }
    echo "</table>";
    ?>

<!--formulaire d'ajout de catégories-->    
    <?php
    echo "<hr><h1>AJOUT CATEGORIES</h1><hr>";
    ?>
    <form action = "administrateur.php" method = "POST" name="" class= "form_categorie">
        <div class = "categorie">
            <label for="Nom">libelle : </label>   
                <input type="text" name="libelle" class= "input_field"/><br>
                <input type="submit"  name= "Enregistrer" value="Enregistrer" id= "submit_btn1" />     
        </div> 
    <?php
        if (isset($_POST['Enregistrer'])) {
//récupération des données
            $libelle = $_POST['libelle'];
            if ($libelle != "") {
//insertion des nouvelles catégories avec requete SQL            
                mysqli_query($db, "INSERT INTO categorie(libelle) VALUES ('$libelle')");
            } 
 //Suppression catégorie            
        } elseif (isset($_POST['supprimer'])) {
            $idCat = $_POST['supprimer'];
            mysqli_query($db, "DELETE FROM categorie WHERE idCat = $idCat");
        } elseif (isset($_POST['modifier'])) {
            $libelle = $_POST['libelle'];
            $idCat = $_POST['modifier'];
            mysqli_query($db, "UPDATE categorie SET libelle = '$libelle' WHERE idCat = $idCat");
        }
//Liste des catégories existantes            
        $resultat1 = mysqli_query($db, "SELECT * FROM categorie");
        echo "<table border =1>
        <th>ID CAT</th><th>LIBELLE</th><th>SUPPRESSION</th><th>MODIFICATION</th>";
        while ($valeur = mysqli_fetch_assoc($resultat1)) {
            echo "<tr><td>" . $valeur['idCat'] . "</td><td>" . $valeur['libelle'] . "</td>
            <td><input type=\"submit\" value=" . $valeur['idCat'] . " name= \"supprimer\"</td>
            <td><input type=\"submit\" value=" . $valeur['idCat'] . " name= \"modifier\"</td></tr>";
        }
        echo "</table>";
    ?>     
    </form>  
    
<!--Formulaire d'ajout produit-->
    <?php
    echo "<hr><h1>AJOUT PRODUIT</h1><hr>";
    ?>
    <form action = "administrateur.php" method = "POST" name="" class= "form_produit">
        <div class = "produit">
            <label for="libelle">Libelle : </label>   
                <input type="text" name="libelle" class= "input_field"/><br>
            <label for="description">Description : </label>   
                <textarea name="description" class= "description" rows="10" cols="40"></textarea><br>  
            <label for="prix">Prix : </label>   
                <input type="text" name="prix" class= "input_field"/><br>
            <label for="quantite"> Quantité disponible : </label>   
                <input type="text" name="quantite" class= "input_field"/><br>      
            <label for="date">Format date</label>
                <input type="date" name="date" class="date"/><br>
            <label for="cat">Catégorie</label>
                <input type="text" name="categorie" class="categorie"/><br>    
            <label for="photo1">Photo1 : </label>
                <input type="file" name="photo1" src= "#" class="photo1" alt="photo1"/><br>   
            <label for="photo2">Photo2 : </label>
                <input type="file" name="photo2" src= "#" class="photo2" alt="photo2"/><br>
            <label for="photo3">Photo3 : </label>
                <input type="file" name="photo3" src= "#" class="photo3" alt="photo3"/><br>
            <label for="photo4">Photo4 : </label>
                <input type="file" name="photo4" src= "#" class="photo4" alt="photo4"/><br>
                <input type="submit"  name= "Sauvegarder" value="Sauvegarder" id= "submit_btn" />        
        </div> 
   
    <?php
        if (isset($_POST['Sauvegarder'])) {
//récupération des données
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            $date = $_POST['date'];
            $categorie= $_POST['categorie'];
            $photo1 = $_POST['photo1'];
            $photo2 = $_POST['photo2'];
            $photo3 = $_POST['photo3'];
            $photo4 = $_POST['photo4'];

           if ($libelle != "" && $description != "" && $prix != "" && $quantite != "" && $date != "" && $categorie !="" 
           && $photo1 != "") {
//insertion des nouveaux produits avec requete SQL            
                mysqli_query($db, " INSERT INTO `produit`(`libelle`, `description`, `prix`, `qtePdt`, `datePublication`, `categorie`, `photo1`, `photo2`, `photo3`, `photo4`)
                VALUES ('$libelle','$description','$prix','$quantite','$date','$categorie','$photo1','$photo2','$photo3','$photo4')");
            } 
        
 //Suppression produit            
        } elseif (isset($_POST['supprimer'])) {
            $idpdt = $_POST['supprimer'];
            mysqli_query($db, "DELETE FROM produit WHERE idpdt = $idpdt");
        } elseif (isset($_POST['modifier'])) {
            $idpdt = $_POST['modifier'];
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            $date = $_POST['date'];
            $categorie= $_POST['categorie'];
            $photo1 = $_POST['photo1'];
            $photo2 = $_POST['photo2'];
            $photo3 = $_POST['photo3'];
            $photo4 = $_POST['photo4'];
            mysqli_query($db, "UPDATE produit SET libelle='$libelle','description'='$description',prix = '$prix',
                qtePdt='$quantite','datePublication'='$date',categorie='$categorie',photo1='$photo1',photo2='$photo2',photo3='$photo3',photo4='$photo4' 
                WHERE idpdt = $idpdt");
        }
      
    //Liste des produits existants       
        $resultat2 = mysqli_query($db, "SELECT * FROM produit");
        echo "<table border =1>
        <th >ID PDT</th><th>LIBELLE</th><th>DESCRIPTION</th><th>PRIX</th><th>QUANTITE</th><th>DATE PUBLICATION</th>
        <th>CAT</th><th>PHOTO1</th><th>PHOTO2</th><th>PHOTO3</th><th>PHOTO4</th><th>SUPPRESSION</th><th>MODIFICATION</th>";
        while ($valeur = mysqli_fetch_assoc($resultat2)) {
            echo "<tr><td>" . $valeur['idpdt'] . "</td><td>" . $valeur['libelle'] . "</td><td>" . $valeur['description'] . "</td>
            <td>" . $valeur['prix'] . "</td><td>" . $valeur['qtePdt'] . "</td><td>" . $valeur['datePublication'] . "</td>
            <td>" .$valeur['categorie'] ."</td><td>" . $valeur['photo1'] . "</td><td>" . $valeur['photo2'] . "</td>
            <td>" . $valeur['photo3'] . "</td><td>" . $valeur['photo4'] . "</td>
            <td><input type=\"submit\" value=" . $valeur['idpdt'] . " name= \"supprimer\"</td>
            <td><input type=\"submit\" value=" . $valeur['idpdt'] . " name= \"modifier\"</td></tr>";
        }
        echo "</table>";
    ?>     
    </form>  
</body>
</html>