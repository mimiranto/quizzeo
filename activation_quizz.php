<?php
session_start();
if (isset($_POST['action']) && isset($_POST['route'])) {
    $action = $_POST['action'];
    $route = $_POST['route'];

    // Vérifier l'action et la route
    
        // Chemin vers le fichier CSV
        $fichier_csv = 'nomquizz.csv';

        // Ouvrir le fichier CSV en mode lecture et écriture
        $file = fopen($fichier_csv, 'r');

        if ($file) {
            // Lire le contenu du fichier CSV dans un tableaus
            $tab1 = [];
            while (($data = fgetcsv($file)) !== false) {
                $tab1[] = $data;
            }
            fclose($file);
            // Parcourir le tableau pour trouver et modifier la ligne appropriée
            foreach ($tab1 as $key => $value) {
                if ($value[1] == $route ) { 
                    if($tab1[$key][5]== 'En cours'){
                    $tab1[$key][5] = 'Lancer';
                    $tab1[$key][6] ="Activer";
                    break;
                    }
                    if($tab1[$key][5]== 'Lancer'){
                        $tab1[$key][5] = 'Terminer';
                        $tab1[$key][6] ="Desactiver";
                        break;
                        }
                    else {
                        $tab1[$key][5] = 'En cours';
                        break;
                    }
                }
                
            }

            $file1 = fopen('nomquizz.csv', 'w');
            // Écrire les modifications dans le fichier CSV
            foreach ($tab1 as $ligne) {
                fputcsv($file1, $ligne);
            }

            // Fermer le fichier
            fclose($file1);

            if ($_SESSION['sat']=="admin"){// Rediriger l'utilisateur vers user.php après modification
            header('Location: indexadmin.php');
            exit; }
            elseif ($_SESSION['sat'] == 'Ecole'){
                header('location: ./indexecole.php');
                exit;
               }
            else{
                header('location: ./indexentreprise.php') ;
                exit;
               }// Assurez-vous d'utiliser exit après header pour arrêter l'exécution du script
        } 
    }

?>
