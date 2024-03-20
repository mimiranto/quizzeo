<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #403644;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            color: white; /* Couleur du texte par défaut */
        }

        nav {
            background-color: rgb(255, 255, 255);
            color: white;
            padding: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            text-align: right;
        }

        nav img {
            width: 13vw;
            text-align: center;
            margin-top: 18px;
        }

        .log {
            margin-top: 13px;
        }

        #inscription {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        #inscription:hover {
            background-color: #D8BFD8;
        }

        #contenu {
            display: flex;
            justify-content: space-between;
        }

        h1 {
            text-align: center;
            margin-top: 100px;
        }

        p {
            font-size: 20px;
        }

        /* Styles spécifiques */
        .reponses {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .carte {
            width: 300px;
            margin: 15px;
            padding: 20px;
            border-radius: 8px;
            background-color: #FFB6C1; /* Couleur de fond de la carte */
            transition: transform 0.3s ease;
        }
        .carte:hover{
        }
        .carte p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <nav> 
        <div id="contenu"> 
            <div> 
                <a href="accueil.php"><img class="logo" src="asset/quizzeo.png"></a>
            </div>
            <div class='log'> 
                <a href="./traitement_deco.php" id="inscription">Deconnexion</a>    
            </div>
        </div>
    </nav>

    <h1>Réponses</h1>
    <div class='reponses'>
        <?php 
        if (isset($_POST['view_notes']) && isset($_POST['route'])) {
            $action = $_POST['view_notes'];
            $route = $_POST['route'];

            $fichier_csv = 'reponse.csv';
            $file = fopen($fichier_csv, 'r');

            if ($file) {
                while (($line = fgetcsv($file)) !== false) {
                    if ($line[1] === $route) {
                        // Utilisation d'une carte pour chaque réponse
                        echo '<div class="carte">';
                        echo '<p>' . $line[0] . '</p>';
                        echo '<p>Question ' . $line[2]  ." : ". $line[3] . ' ?'. '</p>';
                        echo '<p>Réponse : ' . $line[4] . '</p>';
                        echo '</div>';
                    }
                }    
            }
        }
        ?>
    </div>
</body>
</html>
