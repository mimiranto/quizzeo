<?php
    // Vérification de l'existence des données envoyées via la méthode POST
    if (isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['id']) && isset($_POST['mdp']) && isset($_POST['choix'])) {
    
        // Nom du fichier CSV
        $file_name = 'user.csv';
    
        // Ouverture du fichier en mode ajout ('a')
        $file = fopen($file_name, 'a');
    
        // Vérification si le fichier est vide
        if (filesize($file_name) == 0) {
            // Écriture de l'en-tête du fichier CSV
            fputcsv($file, ['choix','prenom', 'nom', 'id', 'mdp','mail','0']);
        }
    
        fputcsv($file, [$_POST['choix'], $_POST['nom'], $_POST['prenom'], $_POST['id'], $_POST['mdp'],$_POST['mail'],'0']);


        fclose($file);
    
        header('location: ./login.php');
    }
?>
