<?php

session_start();
if (isset($_POST['nom']) && isset($_POST['action'])&& isset($_GET['id'])) { // Vérifie si les données 'nom' et 'action' sont envoyées via POST et si la session utilisateur est active
     // Stocke l'ID de l'utilisateur actuel dans la variable $user
    $file_name = 'quizz.csv'; // Définit le nom du fichier de favoris
    $_SESSION['nom'] = $_POST['nom'];

    $file = fopen($file_name, 'a'); // Ouvre le fichier en mode "ajout" 

    if (filesize($file_name) == 0) { // Vérifie si le fichier est vide
        fputcsv($file, [ 'id_user'.'id_nom', 'id','qst1', 'reponse1', 'reponse2','reponse3','reponse4','point']); // Écrit une ligne d'en-tête CSV si le fichier est vide
    }
    fclose($file); // Ferme le fichier
    
    if ($_POST['action'] == 'Ajouter') { // Vérifie si l'action est d'ajouter une attraction aux favoris
        $file = fopen('quizz.csv', 'a+'); // Ouvre à nouveau le fichier des favoris en mode lecture et écriture
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Spécifier le dossier de destination où stocker le fichier téléchargé
             $uploadDirectory = 'C:\xampp\htdocs\quizzeo\Asset/';
             $chemin="Asset/";
             // Récupérer le nom du fichier téléchargé
            $fileName = $_FILES['image']['name'];
        
            // Construire le chemin complet du fichier de destination
              $destination = $uploadDirectory . $fileName;
             $affiche = $chemin .$fileName;
                
            // Déplacer le fichier téléchargé vers le dossier de destination
             if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                echo 'Le fichier a été téléchargé avec succès.';
             } 
         }
        
         if($_SESSION['ajouts']<6){
                    fputcsv($file,[$_POST['nom'],$_GET['id'],$_POST['qst1'],$_POST['reponse1'],$_POST['reponse2'],$_POST['reponse3'],$_POST['reponse4'],$_POST['point'], $affiche]);
                    $_SESSION['ajouts']++; // Incrémenter le compteur
                    header('location: ./pagecreation.php');

                    }
            
                // Logique pour vérifier et ajouter l'attraction aux favoris
                    fclose($file); // Ferme le fichier des favoris
           
   
          }

}
elseif ($_POST['action'] == 'Enregistre') { // Vérifie si l'action est d'ajouter une attraction aux favoris
    $_SESSION['ajouts']=6;
    header('location: ./pagecreation.php');

}