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
            $etat='Terminer';
            $file_s=fopen("progretion.csv","r"); 
        while (($data = fgetcsv($file_s)) !== false) {
            $tab1[] = $data;
        }
        fclose($file_s);
        $verif=false;
        // Parcourir le tableau pour trouver et modifier la ligne appropriée
        foreach ($tab1 as $key => $value) {
            if ($value[0] == $_SESSION['id_user'] && $value[1] == $_SESSION['nom'] ) { 
                $tab1[$key][2] = $_SESSION['ligne'];
                $tab1[$key][3] =  $_SESSION['Point'];
                $tab1[$key][4] =  $etat;
                $verif=true;
                break;
                }
            }


        if ($verif) {
          $file_u = fopen('progretion.csv', 'w');
         // Écrire les modifications dans le fichier CSV
            foreach ($tab1 as $ligne) {
            fputcsv($file_u, $ligne);
         }
            fclose($file_u);
            //header('fin.php');
         }
         else {
            $file_p= fopen("progretion.csv", "a");
             fputcsv($file_p,array($_SESSION['id_user'],$_SESSION['nom'],$_SESSION['ligne'], $_SESSION['Point'],$etat));
            fclose($file_p);
            // header('location: ./indexentreprise.php');
       }

            if ($_SESSION['sat'] == 'Ecole'){

                  header('location: ./fin.php');
             }
             elseif($_SESSION['sat'] == 'Entreprise'){

                 header('location: ./fin.php');
             }
             else {
                 header('location: ./fin.php');
            }
        }



    }
    elseif ($_POST['action'] == 'Accueil') {
            $etat= 'En cours';

        $file_s=fopen("progretion.csv","r"); 
        while (($data = fgetcsv($file_s)) !== false) {
            $tab1[] = $data;
        }
        fclose($file_s);
        $verif=false;
        // Parcourir le tableau pour trouver et modifier la ligne appropriée
        foreach ($tab1 as $key => $value) {
            if ($value[0] == $_SESSION['id_user'] && $value[1] == $_SESSION['nom'] ) { 
                $tab1[$key][2] = $_SESSION['ligne'];
                $tab1[$key][3] =  $_SESSION['Point'];
                $verif=true;
                break;
                }
            }


        if ($verif) {
          $file_u = fopen('progretion.csv', 'w');
         // Écrire les modifications dans le fichier CSV
            foreach ($tab1 as $ligne) {
            fputcsv($file_u, $ligne);
         }
            fclose($file_u);
            // header('location: ./indexentreprise.php');
         }
         else {
            $file_p= fopen("progretion.csv", "a");
             fputcsv($file_p,array($_SESSION['id_user'],$_SESSION['nom'],$_SESSION['ligne'], $_SESSION['Point'],$etat));
            fclose($file_p);
            // header('location: ./indexentreprise.php');
       }
         if ($_SESSION['sat'] == 'Ecole'){
         header('location: ./indexecole.php');
        }
        elseif($_SESSION['sat'] == 'Entreprise'){

         header('location: ./indexentreprise.php');
         }
        else {
         header('location: ./indexuser.php');
        }

    }

    }    