<?php
session_start();
$_SESSION['id_user']=$_POST['id'];

if (isset($_POST['id']) && isset($_POST['mdp'])) {
    $file_name = 'user.csv';

    $file = fopen($file_name, 'r');

    if ($file) {
        while (($line = fgetcsv($file)) !== false) {
            if ($line[2] === $_POST['id']) {
                if ($_POST['mdp'] === $line[3]) {
                    if($line[0] === 'admin'){
                     fclose($file);
                     header('Location: ./indexadmin.php');
                     exit();
                    }
                    else if($line[0] === 'Entreprise'){
                     fclose($file);
                     header('Location: ./indexentreprise.php');
                     exit(); 
                    }
                    else if($line[0] === 'Ecole'){
                        fclose($file);
                        header('Location: ./indexecole.php');
                        exit(); 
                    }
                    else{
                     fclose($file);
                     header('Location: ./indexuser.php');
                     exit(); 
                    }
                }
            }
        }
        include ('./login.php');
        fclose($file);
    }
}
?>
