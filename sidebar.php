
<?php 

//session_start(); 
include('fonctionPanier.php');
include('connexionBd.php');
$db = getConnexion();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>sidebar</title>
</head>

<body> 
    <div class = "cleaner"></div>
      <div id="sidebar">
          <div class="sidebar_section">
            <h2>Membres</h2>
<!--Définition du formulaire d'identification-->
            <form action="accueil.php" method="POST" name= "">
              <label>Pseudo</label>
              <input type="text" value="" name="username" size="10" class="input_field" />
              <label>Mot de passe</label>
              <input type="password" value="" name="password" class="input_field" />
              <input type="submit" name="identification" value="Connexion" alt="Identification" id="submit_btn" />
            </form>
<!--Définition du formulaire d'inscription-->              
            <form action="inscription.php" method = "POST" name = "">  
              <input type="submit" name="inscription" value="S'inscire" alt="Inscription" id="submit_btn" />
            </form>
          </div><!--end sidebar_section-->

          <div class="sidebar_section1">
            <h3>Bienvenue :</h3>
            <?php 
            if(isset($_SESSION['username'])){
              echo "<h1>" . $_SESSION['username'] .",<h1>";
            }
            ?>
            <?php
 
    /*identification nouvel utilisateur*/
              if(isset($_POST['username']) && isset($_POST['password'])){  
              if (count($_POST) > 0) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $result = mysqli_query($db, "SELECT usernameClt, passwordClt, compte FROM client 
                WHERE usernameClt='" . $_POST["username"] . "' and passwordClt = '" . $_POST["password"] . "'");

                $count = mysqli_num_rows($result);
                $donnee = mysqli_fetch_assoc($result);

                if ($count == 0) {
                  echo "Username ou mot de passe invalide, veuillez vous inscrire SVP.";
                } else {    
                  if(isset($_SESSION['username'])){
                  }else{
                      $_SESSION['username']= $_POST['username'];
                      creationPanier();
                  }  
                    if($donnee['compte']!="admin"){
                      //echo "<h3>Bienvenue :</h3>";
                      echo "<h1>" .$_SESSION['username'] .",</h1>";
                      //header('Location: accueil.php');
                    }elseif($donnee['compte']=="admin"){
                      //echo "<h3><a href=\"administrateur.php\">Bienvenue : <a/></h3>";
                     echo "<h1>" .$_SESSION['username'] .",<h1>";
                      //header('Location: accueilAdmin.php');
                      header("Location:Administrateur/administrateur.php");
                     // echo"<h1><a href=\"administrateur.php\">".$_SESSION['username'] ."</a></h1>";
                    }
              }
            }
        }
            ?>
            <form action="deconnexion.php" method="POST" name= "">
              <input type="submit" name="Deconnexion" value="Déconnexion" alt="Déconnexion" id="deconn_btn" />
            </form>
          </div><!--end sidebar_section1-->

<!-- Définition de la barre de recherche -->
          <div class="sidebar_section2">  
            <h2>Recherche</h2>
              <div class="search_box"> 
                <form action="" id="searchthis" method="get">
                  <input type="text" name="q"  placeholder="Mot clé" class="search_field"/>
                  <input type="submit" id="search_btn"  value="Rechercher" />
                </form>        
              </div>    
          </div><!--end sidebar_section2-->   

<!--Définition de la liste déroulante catégories-->
          <div class="sidebar_section3">
            <h2>Categories</h2>
          <?php
         /*include('connexionBd.php');
          $db = getConnexion();*/

          $resultat = mysqli_query($db,"SELECT * FROM categorie");
//liste deroulante catégorie dynamique
          ?>
          <form method = "POST">
            <select name="cat">
              <?php
                while($valeur=mysqli_fetch_assoc($resultat)){
              ?>     
            <option id= "input_field" value ="<?php echo $valeur['idCat']; ?>"><?php echo $valeur['libelle'] ;?></option> 
              <?php         
                }
              ?>      
            </select>
              <input type ="submit" id= "cat_btn" value = "valider">
          </form>
<!--liste deroulante catégorie statique        
            <ul class="categories_list">
              <li><a href="#">Console & jeux</a></li>
              <li><a href="#">DVD</a></li>
              <li><a href="#">CD-Musique</a></li>
              <li><a href="#">Livres</a></li>
              <li><a href="#">Jeux & jouets</a></li>
              <li><a href="#">Ameubleument</a></li>
              <li><a href="#">Bricolage</a></li>
            </ul>-->
          </div><!--end sidebar_section3-->
      </div><!--end sidebar-->      
</body>
</html>

    