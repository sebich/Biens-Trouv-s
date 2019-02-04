<?php
session_start();

if(isset($_SESSION['username'])){
            session_destroy();
            header('Location:accueil.php');
        }else{
            header('Location:accueil.php');
        }
?>