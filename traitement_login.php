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
                    fclose($file);
                    header('Location: ./index1.php');
                    exit(); 
                }
            }
        }
        include ('./login.php');
        fclose($file);
    }
}
?>
