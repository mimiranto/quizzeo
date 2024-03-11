<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
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
            margin-top:11px;
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
        </style>
</head>
<body>
    <nav> 
        <div id="contenu"> 
            <div> 
                <img class="logo" src="Asset/quizzeo.png"> 
            </div>
            <div class='log'> 
             <a href="./user.php" id="inscription">Voir tout les Utilisateurs</a>
             <a href="./index.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
</body>
</html>