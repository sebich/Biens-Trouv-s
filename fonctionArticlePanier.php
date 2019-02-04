<?php
function nbreArticlePanier(){
    if(isset($_SESSION['panier']['libelle'])){
    $nombre = 0;
        for($i =0;$i<count($_SESSION['panier']['libelle']);$i++)
        { 
            $nombre += $_SESSION['panier']['qtePdt'][$i];
        }
            return $nombre;
    }
}

?>