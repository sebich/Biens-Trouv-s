<?php
session_start();

include('connexionBd.php');
    $db = getConnexion();

    $resultat = mysqli_query($db, "SELECT idClt FROM client WHERE username = $_SESSION['username']");
    $idClt = mysqli_fetch_assoc($resultat);
    
    
    ?>    


?>