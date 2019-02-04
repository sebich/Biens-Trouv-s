<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lobster|Spicy+Rice" rel="stylesheet">
    <title>Inscription client</title>

</head>
<body>
    <?php include('menu.php'); ?>
<!--Définition formulaire d'inscription-->
    <div class="conteneur">
        <form action = "inscription.php" method = "POST" name="" class= "form_inscription">
                    <div class = "client">
                        <label for="Nom">Nom : </label>   
                        <input type="text" name="nom"  required class= "input_field"/><br>
                        <label for="Prenom">Prénom : </label>
                        <input type="text" name="prenom"  required class= "input_field"/><br>
                        <label for="Email">Email : </label>
                        <input type="text" name="email" required class= "input_field"/><br>
                        <label for="Username">Pseudo: </label>
                        <input type="username" name="username" required class= "input_field"/><br>
                        <label for="Password">Password: </label>
                        <input type="password" name="password" required class= "input_field"/><br>
                        <label for="Adresse ">Adresse : </label>
                        <input type="text" name="adressePostale"required class= "input_field"/><br>
                        <label for="Tel ">Téléphone : </label>
                        <input type="text" name="telephone" class= "input_field"/>
                        <input type="submit"  name= "Enregistrer" value="Enregistrer" id= "submit_btn1" />    
                    </div> 

        <?php
        include('connexionBd.php');
        $db = getConnexion();


//Eviter les champs vides
        if (isset($_POST['Enregistrer'])) {
//récupération des données
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $adresse = $_POST['adressePostale'];
        $telephone = $_POST['telephone'];

        if ($nom != "" && $prenom != "" && $email != "" && $username != ""&& $password != "" && $adresse != "" && $telephone != ""){
           // $reponse = mysqli_query($db, "SELECT * FROM client WHERE username = $username"){
               // $valeur= mysqli_fetch_assoc($reponse);
                //$idpdt = $valeur['idpdt'];
            //}

            if ($username == $_POST['username']);
//insertion des nouvelles données avec requete SQL            
            mysqli_query($db, "INSERT INTO client(nomClt,prenomClt,emailClt,usernameClt,passwordClt,adresseClt,telClt,compte) 
                    VALUES ('$nom','$prenom','$email','$username','$password','$adresse','$telephone','users')");
            header("location:accueil.php");
        } else {
            echo "Veuillez renseigner tous les champs";
        }

        }
        ?>     
        </form>    
    </div>
        
    <?php include('footer.php'); ?>

</body>
</html>