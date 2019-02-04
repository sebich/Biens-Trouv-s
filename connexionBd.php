<?php
function  getConnexion(){
    if($db=mysqli_connect('localhost', 'root', '', 'eshop')){
        return $db;
    }else{
        echo "Erreur de connexion";
    }
}

?>