<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;  
            background-color: #403644;        
            background-position: center;
            background-size: cover;
            background-attachment: fixed;    
            
         
        }
        nav {
            background-color: rgb(255,255,255);
            color: white;
            padding: 15px;
        }
        h1{
            text-align:center;
            color:white;
            margin-top:60px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            text-align: right;
            
        }
        nav img{
            width:13vw;
            text-align: center;
            margin-top:18px;
        }
        .log{
            margin-top: 13px;
        }
 
        #inscription, #connexion {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        #inscription:hover{
            background-color: #D8BFD8;
        }
 
        #connexion:hover{
            background-color: #F0E68C;
        }
 
        #contenu{
            display:flex;
            justify-content: space-between;
        }
        #txt{
            color:white;
            font-family:Impact,fantasy;
            font-weight: bold;
            display:flex;
            justify-content: center;
        }
        </style>
</head>
<body>
    <nav> 
        <div id="contenu"> 
            <div> 
                <img class="logo" src="asset/quizzeo.png"> 
            </div>
            <div class='log'> 
                <a href="./traitement_deco.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
    <h1><?php
        session_start();

        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['id_user'])) {
            // Chemin vers le fichier des utilisateurs
            $user_file_name = 'user.csv';

            // Ouvrir le fichier des utilisateurs en lecture
            $user_file = fopen($user_file_name, 'r');

            // Vérifier si le fichier a été ouvert avec succès
            if ($user_file) {
                // Lire la première ligne pour obtenir les en-têtes
                $headers = fgetcsv($user_file);

                // Parcourir le fichier pour rechercher l'entrée de l'utilisateur
                while (($line = fgetcsv($user_file)) !== false) {
                    // Si l'identifiant de l'utilisateur correspond à celui de la session actuelle
                    if ($line[3] === $_SESSION['id_user']) {
                        // Afficher un message de bienvenue avec le nom de l'utilisateur
                        echo "Bienvenue " . $line[2];
                        break; // Sortir de la boucle une fois que l'entrée de l'utilisateur est trouvée
                    }
                }

                // Fermer le fichier des utilisateurs
                fclose($user_file);
            }
        }
        ?></h1>
</body>
</html>