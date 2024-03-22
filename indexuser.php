<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Quizzeo</title>
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
        form{
            margin: 2%;
            transition: transform 0.3s ease;
            border: solid 2px black;
            padding: 1%;
            border-radius: 20px;
            box-shadow: 5px 10px 10px;
            background-color: #0000003b;
        }
        form a {
            text-decoration:none;
            color:black;
        }
        form img {
            box-shadow: 5px 5px 10px;
            width: 430px;
            height: 185px;
            padding:1%;
        }
        
        form:hover {
         transform: scale(1.02);
         box-shadow: 5px 10px 10px #FFB6C1;
        }
        form p{
         text-align:center;
         font-size: 15px;
         color: white;
        }
        h1{
            color:white;
            font-size:40px;
            margin-top:70px;
        }
        .container {
            padding:2%;
            position: relative;
            white-space: nowrap;
            margin-top:25px;
            overflow: hidden; /* Empêcher l'affichage de la barre de défilement */
        }

        .slide {
            display: inline-block;
            margin: 0 50px;
            width: 500px;
        }

        .arrow-container {
    position: relative;
    margin-top: 10px;
    text-align: center;
}

.arrow.left {
    left: 700px; /* Ajustez cette valeur selon votre préférence */
}

.arrow.right {
    right: 700px; /* Ajustez cette valeur selon votre préférence */
}

.arrow {
    position: absolute;
    bottom: -30px; /* Ajustez cette valeur selon votre préférence */
    width: 30px;
    height: 30px;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
        .titre{
            color:white;
            font-size:40px;
            display:flex;
            margin-left:55px;
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
                <a href="profil.php" id="inscription">Gérer le profil</a> 
                <a href="./traitement_deco.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
    <h1><?php
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
                        echo "Bienvenue " . $line[1];
                        break; // Sortir de la boucle une fois que l'entrée de l'utilisateur est trouvée
                    }
                }

                // Fermer le fichier des utilisateurs
                fclose($user_file);
            }
        }
        ?></h1>
    <div class='container'>
    <h1 class='titre'>Quizz</h1>
    <?php

    $file=fopen("nomquizz.csv","r"); 
    $lines = [];

    while(($data=fgetcsv($file))!==false){ 
        while(($line = fgetcsv($file)) !== false) { 
        $lines[] = $line;
        if ($line[5] === "Lancer") {
        ?>
        
           
            <?php
            $tre=false;
            $prog_file = fopen("progretion.csv", "r");
            while (($prog_data = fgetcsv($prog_file)) !== false) {
                if ($prog_data[1] === $line[1]) {
                    $lin='<p>' . $prog_data[4] . '</p>';
                    if ($prog_data[0] === $_SESSION['id_user'] && $prog_data[4] == "Terminé") {
                        $tre= true; 
                        break;
                        
                      }
   
                  
                }
        }
        fclose($prog_file);
        if (!$tre){?>
        <form class="slide"> 
            <p><?php echo $line[1] ?></p>
            <p><?php $prog_file1 = fopen("progretion.csv", "r");
            while (($prog_data1 = fgetcsv($prog_file1)) !== false) {
                if ($prog_data1[1] === $line[1]) {
                    if ($prog_data1[0] === $_SESSION['id_user'] && $prog_data1[4] != "Terminé")  {
                         echo  '<p>' . $prog_data1[4] . '</p>';
                         break;

                    }}
                  
                }  fclose($prog_file1);?></p>
            <p>
            <a href="<?php echo $line[3] ?>"><img src="<?php echo $line[2];?>"/></a>
            
            </p>
            <button type="button" onclick="share('<?php echo $line[3];?>','<?php echo $line[1];?>')">Partager</button>
         
        </form>
        <?php
        }?><?php
    }
    }}
    

    fclose($file); 
    ?>
    </div>

    <!-- Flèches de navigation -->
    <div class="arrow-container">
     <div class="arrow left" onclick="scrollLeft()">&#10094;</div>
     <div class="arrow right" onclick="scrollRight()">&#10095;</div>
    </div>

    <script>
        function scrollLeft() {
            const container = document.querySelector('.container');
            const scrollPos = container.scrollLeft;
            if (scrollPos > 0) {
                container.scrollBy({ left: -200, behavior: 'smooth' });
            } else {
                const slides = document.querySelectorAll('.slide');
                const lastSlide = slides[slides.length - 1];
                container.scrollTo({ left: lastSlide.offsetLeft, behavior: 'smooth' });
            }
        }

        function scrollRight() {
            const container = document.querySelector('.container');
            const scrollPos = container.scrollLeft;
            const maxScroll = container.scrollWidth - container.clientWidth;

            if (scrollPos < maxScroll) {
                container.scrollBy({ left: 525, behavior: 'smooth' });
            } else {
                container.scrollTo({ left: 0, behavior: 'smooth' });
            }
        }



        function share(url,titre) {
            if (navigator.share) {
                navigator.share({
                title: titre,
                text: 'Venez jouer a notre quizz',
                url: url,
                })
       
            } 
            }
    </script>
</body>
</html>