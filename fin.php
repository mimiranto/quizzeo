<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz Terminer</title>
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

#inscription,
#connexion {
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

#connexion:hover {
    background-color: #F0E68C;
}

#contenu {
    display: flex;
    justify-content: space-between;
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
        .container {
            max-width: 795px;
            margin: 150px auto;
            background-color: #fff;
            padding: 56px;
            border-radius: 8px;
            box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
            color: #333; /* Couleur du texte */
        }
        .container input{
            align-items:center;
        }
        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: #403644; /* Couleur spécifique au titre */
        }
        #ac{
         display: inline-block;
         padding: 10px 20px;
         background-color: #FFB6C1;
         color: white;
         text-decoration: none;
         border-radius: 5px;
         display:flex;
         justify-content:center;
        }
        #ac:hover {
         background-color: #D8BFD8;
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
    <div class='container'>
     <h1>Quizz Terminé</h1>
     <a href="fin_traitement.php" id="ac">Retourner à l'accueil</a> 
    </div>
</body>
</html>