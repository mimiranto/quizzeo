<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <style>
        /* Votre CSS existant ici */
        /* Assurez-vous de garder vos styles pour .container, form, img, etc. */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;  
            background-color: #403644;        
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
         
        }
        h1{
            color:white;
            font-size:40px;
            margin-left:70px;
            margin-top:70px;
        }
        .container{
            padding:2%;
            margin-top:-40px;
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
        nav {
            background-color: rgb(255,255,255);
            color: white;
            padding: 15px;
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
            font-size:20px;
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 25vh;
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
            margin: 0 10px;
            width: 450px;
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
        input[type="submit" i]{
            margin-top:10px;
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        input[type="submit" i]:hover{
            background-color: #D8BFD8;
        }
        form .image-container {
         display: flex;
         flex-direction: column;
         align-items: center;
         margin-top: 10px; 
        }
        .btn {
            display:flex;
            justify-content:center;
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
             <a href="./user.php" id="inscription">Voir tout les Utilisateurs</a>
             <a href="./traitement_deco.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
    <h1>Liste Quizz</h1>
    <div class='container'>
    <?php

    $file=fopen("nomquizz.csv","r"); 
    $lines = [];

    while(($data=fgetcsv($file))!==false){ 
        while(($line = fgetcsv($file)) !== false) { 
        $lines[] = $line;
        ?>
        <form class="slide" action="activation_quizz.php" method="post" > 
            <p><?php echo $line[1]; ?></p> 
            <input type="hidden" name="route" value="<?php echo $line[1]; ?>"> 
            <a href="<?php echo $line[3] ?>"><img src="<?php echo $line[2];?>"/></a>
            <div class="btn">
             <input type="submit" name="action" value="<?php echo $line[5]; ?>">
             <input type="submit"  name="action" value="<?php echo  $line[6]; ?>">
            </div>
        </form>
        <?php
      }
    }

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
    </script>
</body>
</html>
