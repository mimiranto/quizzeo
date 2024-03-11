<?php
session_start();
$_SESSION['id_user'] = $_POST['id'];

if (isset($_POST['id']) && isset($_POST['mdp'])) {
    $file_name = 'user.csv';
    $log_file_name = 'log_login.csv'; // Nom du fichier pour les connexions

    $file = fopen($file_name, 'r');

    if ($file) {
        while (($line = fgetcsv($file)) !== false) {
            if ($line[2] === $_POST['id']) {
                if ($_POST['mdp'] === $line[3]) {
                    // Ouverture du fichier pour enregistrer les connexions en mode écriture
                    $log_file = fopen($log_file_name, 'a');

                    // Création d'un tableau avec les données à enregistrer dans le fichier CSV des connexions
                    $data = array(
                        date("Y-m-d H:i"), 
                        $_POST['id'],
                        'Connecté'
                    );

                    
                    fputcsv($log_file, $data);

                    
                    fclose($log_file);

                    // Redirection de l'utilisateur vers la page appropriée
                    if ($line[0] === 'admin') {
                        fclose($file);
                        header('Location: ./indexadmin.php');
                        exit();
                    } else if ($line[0] === 'Entreprise') {
                        fclose($file);
                        header('Location: ./indexentreprise.php');
                        exit();
                    } else if ($line[0] === 'Ecole') {
                        fclose($file);
                        header('Location: ./indexecole.php');
                        exit();
                    } else {
                        fclose($file);
                        header('Location: ./indexuser.php');
                        exit();
                    }
                }
            }
        }
        include('./login.php');
        fclose($file);
    }
}
?>
