<?php 
//session_start();
include('fonctionPanier.php');

include('menu.php');


$total = prixTotal();

?>

<div class="panier"> 
        <?php 
        if(isset($_SESSION['username'])){
        echo "<h1> Voici votre panier : ". $_SESSION['username'] ."</h1>"; 
        }else{
            echo "<p>Votre panier est vide, veuillez vous connecter</p>";
        }
        ?>  
             <span><h3>Mon panier<h3></span>
            <?php 
                echo "<table border=1>
                <th>idpdt</th><th>photo1</th><th>Libelle</th><th> Prix (Euro)</th><th>Quantite</th></th><th>Total (Euro)</th>";
                if(isset($_SESSION['panier']['libelle'])){
                if(count($_SESSION['panier']['libelle'])<=0){
                    echo "<h2>Votre panier est vide </h2>";
                }else{
                    for($i =0;$i<count($_SESSION['panier']['libelle']);$i++){
                        echo "<tr>";
                        echo "<td>".htmlspecialChars($_SESSION['panier']['idpdt'][$i])."</td>";
                        echo "<td><img src=\"images/".($_SESSION['panier']['photo1'][$i])."\"</td>";
                        echo "<td>".htmlspecialChars($_SESSION['panier']['libelle'][$i])."</td>";
                        echo "<td>".htmlspecialChars($_SESSION['panier']['prix'][$i])."</td>";
                        echo "<td><input type=\"text\" value=\"".($_SESSION['panier']['qtePdt'][$i] )."\"/></td>";
                        echo "<td>".($_SESSION['panier']['qtePdt'][$i] * $_SESSION['panier']['prix'][$i])."</td>";
                        echo "</tr>";
                    }
                }               
                echo"Nombre d'article(s) dans votre panier : " . nombreArticlePanier();
                echo "<table>";
            }
            ?> 
<br>
    <h3>Récapitulatif<h3>
    <?php
    echo"<table border = 1>";
    echo"<tr><td>Total achat </td><td>".$total." € </td></tr>";
    echo "</table>";
    ?> 
    <form action="#" method = "POST" name = "">    
        <input type="submit" name="valideachat" value="Valider mon panier" alt="Valider" id="valideachat_btn" />
    </form>
    <form action="listePdts.php" method = "POST" name = "">  
        <input type="submit" name="retourachat" value="Continuer mes achats" alt="Continuer" id="retourachat_btn" />          
    </form>
</div><!--end of panier-->                 
     
<?php include('footer.php');?>