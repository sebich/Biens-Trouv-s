<?php
                $db = getConnexion();      
                $reponse = $db->query('SELECT * FROM produit');
                while ( $valeur= mysqli_fetch_assoc($reponse)){
        ?>    
  <div class="slider">
    <div class="slides">
        <div id= "vignettes">          
            <img src="images/<?php echo $valeur['photo1']?>"alt=<?php echo $valeur['libelle'] ?>/>
        </div>     
      </div> 
    </div>
  </div>
              <?php } ?> 
/*.slider {
	width: 100px;
	overflow: hidden;
	margin: auto;
}
.slides {
	width: auto;
	/*animation: glisse 10s infinite;
}
.vignettes {
	position: left;
	margin:0;
	padding: 0;
}

/*@keyframes glisse {
	0% {
		transform: translateX(0);
	}
	10% {
		transform: translateX(0px);
	}
	25% {
		transform: translateX(100px);
	}
	25% {
		transform: translateX(100px);
	}
	50% {
		transform: translateX(200px);
	}
	50% {
		transform: translateX(200px);
	}
	75% {
		transform: translateX(300px);
	}
	75% {
		transform: translateX(300px);
	}
	100% {
		transform: translateX(0);
	}
}