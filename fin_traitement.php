<?php
session_start();
     
     if ($_SESSION['sat'] == 'Ecole'){
     header('location: ./indexecole.php');
    }
    elseif($_SESSION['sat'] == 'Entreprise'){
     header('location: ./indexentreprise.php');
    }
    else {
     header('location: ./indexuser.php');
    }
?>
