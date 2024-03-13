<?php

session_start();
if (isset($_POST['nom']) && isset($_POST['action'])&& isset($_GET['id'])) { // Vérifie si les données 'nom' et 'action' sont envoyées via POST et si la session utilisateur est active
     // Stocke l'ID de l'utilisateur actuel dans la variable $user
    $file_name = 'quizz.csv'; // Définit le nom du fichier de favoris
    $_SESSION['nom'] = $_POST['nom'];

    $file = fopen($file_name, 'a'); // Ouvre le fichier en mode "ajout" 

    if (filesize($file_name) == 0) { // Vérifie si le fichier est vide
        fputcsv($file, [ 'id_nom', 'id','qst1', 'reponse1', 'reponse2','reponse3','reponse4','point']); // Écrit une ligne d'en-tête CSV si le fichier est vide
    }
    fclose($file); // Ferme le fichier

    if ($_POST['action'] == 'Ajouter') { // Vérifie si l'action est d'ajouter une attraction aux favoris
        $file = fopen('quizz.csv', 'a+'); // Ouvre à nouveau le fichier des favoris en mode lecture et écriture

       
           while ($_SESSION['ajouts']<6){
                fputcsv($file,[$_POST['nom'],$_GET['id'],$_POST['qst1'],$_POST['reponse1'],$_POST['reponse2'],$_POST['reponse3'],$_POST['reponse4'],$_POST['point']]);
                $_SESSION['ajouts']++; // Incrémenter le compteur
                header('location: ./pagecreation.php');
            }
            #else{
                $url=$_POST['nom'];
                $url_quiz = "http://localhost/quizzeo/quizzstart.php?bb=$url";
                $file_name1 = 'nomquizz.csv';
                $file_y= fopen( $file_name1 , 'a');
                if (filesize( $file_name1) == 0) { // Vérifie si le fichier est vide
                    fputcsv($file_y, [ 'id_quizz','image','url']); // Écrit une ligne d'en-tête CSV si le fichier est vide
                }
                fputcsv($file_y,[$_POST['nom'],$_POST['image'],$url_quiz]);
                fclose($file_y); 
                $file_z=fopen("user.csv","r"); 
                while (($line = fgetcsv($file_z)) !== false) { 
                    if ($_SESSION['id_user'] == $line[1]){
                        if($line[0] == 'Ecole'){
                            header('location: ./indexecole.php');

                        }
                        else{
                            header('location: ./indexentreprise.php');
                        }
            
                    }
                
                   
               
            #}
            fclose($file_z); 
            
            } // Logique pour vérifier et ajouter l'attraction aux favoris
            fclose($file); // Ferme le fichier des favoris
           
        }
    }