<?php

session_start();

// Vérifie si les données 'choix' et 'action' sont envoyées via POST et si la session utilisateur est active
if (isset($_POST['action']) && isset($_POST['choix']) && isset($_SESSION['ligne'])) {

    if ($_POST['action'] == 'Continuer') { // Vérifie si l'action est de continuer

        // Ouvre le fichier CSV des favoris en mode lecture
        $file = fopen("quizz.csv", "r");

        while (($line = fgetcsv($file)) !== false) {
            if ($_POST['choix'] == $line[3]) { 
                $_SESSION['Point']= $_SESSION['Point']+$line[7];
                 // Marquer que le choix est trouvé
                break; // Sort de la boucle si un match est trouvé
            }

        }
        fclose($file); // Ferme le fichier CSV des favoris
     
        if ($_SESSION['ligne'] < 5) {
           // Si le choix n'est pas trouvé
                $_SESSION['ligne']++;
                header('location: ./quizzstart.php');
            
        } else {
            $_SESSION['ligne'] = 1;
            header('location: ./quizzstart.php');
        }

        
       
    }
    // if ($_POST['action'] == 'Accueil') {

        
    //     $file_ = fopen("quizz.csv", "a");
    //     fputcsv($file_y,["stevens",$_POST['nom'],);
    //     fclose($file);

    // }    
}