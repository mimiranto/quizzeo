<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCUEIL</title>
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
        
 
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            text-align: right;
            
        }
        nav img{
            width:100px;
            text-align: center;
            margin-top: 18px;
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
            text-align: center;
        }
    </style>
</head>
<body>
 
    <nav> <!-- Balise de navigation -->
        <div id="contenu"> <!-- Conteneur de la barre de navigation -->
            <div> <!-- Première partie de la barre de navigation : logo -->
                <img class="logo" src="assets/quizzeo.png"> <!-- Logo -->
            </div>
            <div class='log'> <!-- Deuxième partie de la barre de navigation : liens d'inscription et de connexion -->
                <a href="./inscription.php" id="inscription">Inscription</a> <!-- Lien vers la page d'inscription -->
                <a href="./login.php" id="connexion">Connexion</a> <!-- Lien vers la page de connexion -->
            </div>
        </div>
    </nav>
 
    <div id="text">
                <h2>Tu es à l'accueil, tu peux te connecter ou t'inscrire !</h2>
                <h3>
                    Quizzeo est une plateforme de quizz en ligne. Le site vous permet de s’inscrire et de choisir si vous êtes utilisateur ou quizzeur, puis de vous connecter.
                    <br>
                    <br>
                    Une fois votre compte créé vous pourrez jouer à des quizzs ou bien créer vos propres quizz en fonction de votre grade.
                    <br>
                    <br>
                </h3>   
    </div>

 
</body>
</html>