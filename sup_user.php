<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppresion</title>
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
            width:13vw;
            text-align: center;
            margin-top:18px;
        }
        .log{         
            margin-left: 15vw;
        }
 
        #inscription, #connexion {
            display: flex;
            justify-content: center;
            display: inline-block;
            margin-left:7vw;
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
           
            font-family:Georgia,serif;
            font-size:20px;
            display:flex;
            justify-content: center;
           
            align-items: center;
            margin-top: 25vh;
            letter-spacing: 1px;
        }
        #mot{
            border-radius:30px;
            background-color: white;
            width:50%;
            height:25vh;
            margin-left:245px;
            margin-right:250px;
           
        }
    </style>
</head>
<body>
 
    <nav> <!-- Balise de navigation -->
        <div id="contenu"> <!-- Conteneur de la barre de navigation -->
            <div> <!-- Première partie de la barre de navigation : logo -->
                <img class="logo" src="asset/quizzeo.png"> <!-- Logo -->
            </div>
        </div>
    </nav>
 
    <div id="mot">
                
                
                <h2 id="txt">Votre compte a été supprimé avec succès !</h2>
                <br>
                <div class='log'> <!-- Deuxième partie de la barre de navigation : liens d'inscription et de connexion -->
                <a href="./index.php" id="inscription">OK</a> <!-- Lien vers la page d'inscription -->
            
                </div>
    </div>
 
 
</body>
</html>