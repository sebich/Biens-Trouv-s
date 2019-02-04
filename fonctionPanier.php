    
    <?php
//session_start();
          
//création du panier
        function creationPanier(){
        $_SESSION['panier']=array();
        $_SESSION['panier']['idpdt']=array();
        $_SESSION['panier']['libelle']=array(); 
        $_SESSION['panier']['prix']=array();
        $_SESSION['panier']['qtePdt']=array();
        $_SESSION['panier']['photo1']=array(); 
        }

//ajouter produit au panier
        function ajoutPdtPanier($idpdt,$photo1,$libelle,$prix,$quantite){
        $position = isProduitExistePanier($libelle);
            if($position !==false){
                $_SESSION['panier']['qtePdt'][$position] += 1;
            }else{
                array_push($_SESSION['panier']['idpdt'],$idpdt);
                array_push($_SESSION['panier']['libelle'],$libelle);
                array_push($_SESSION['panier']['prix'],$prix);
                array_push($_SESSION['panier']['qtePdt'],$quantite);    
                array_push($_SESSION['panier']['photo1'],$photo1);
                
                
            }   
        }

//calcul du prix total
        function prixTotal(){
        $total = 0;
        for($i =0;$i<count($_SESSION['panier']['libelle']);$i++)
            { 
                $total += ($_SESSION['panier']['qtePdt'][$i] *  $_SESSION['panier']['prix'][$i]);
            }
                return $total;
        }
// rechercher l'existense d'un produit dans le panier
        function isProduitExistePanier($libelle){
        $position = array_search($libelle,$_SESSION['panier']['libelle']);
            return $position;
        }
// renvoie le nombre d'article dans le panier
        function nombreArticlePanier(){
        $nombre = 0;
            for($i =0;$i<count($_SESSION['panier']['libelle']);$i++)
            { 
                $nombre += $_SESSION['panier']['qtePdt'][$i];
            }
                return $nombre;
        }

 // suppression panier
       function deleteArticlePanier($idpdt){
            $tmp['libelle']=array();
            $tmp['quantite']=array();
            $tmp['prix']=array();
            $tmp['idpdt']=array();

            for($i=0;$i<count($_SESSION['panier']['libelle']);$i++)
            {
                if($_SESSION['panier']['idpdt'][$i]!= $idpdt){
                    array_push($tmp['libelle'],$_SESSION['panier']['libelle'][$i]);
                    array_push($tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
                    array_push($tmp['prix'],$_SESSION['panier']['prix'][$i]);
                    array_push($tmp['idpdt'],$_SESSION['panier']['idpdt'][$i]);
            }
        }
            $_SESSION ['panier']= $tmp;   
        } 

    ?>
