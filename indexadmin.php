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
            margin:2%;
            transition: transform 0.3s ease;
        }
        form img {
            box-shadow: 5px 5px 10px;
            width: 250px;
            height: 100px;
            padding:1%;
        }
        
    form:hover {
         transform: scale(1.02);
        }
    form p{
     font-size: 10px;
     color: white;
     text-align: center;
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
        .container{
            display: flex;
            flex-wrap: nowrap;
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
                <img class="logo" src="asset/quizzeo.png"> 
            </div>
            <div class='log'> 
             <a href="./user.php" id="inscription">Voir tout les Utilisateurs</a>
             <a href="./index.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
    <h1>Liste Quizz</h1>
    <div class='container'>
    <?php
    session_start(); 

    $file=fopen("quizz.csv","r"); 

    
    while (($line = fgetcsv($file)) !== false) { 
    
        ?>
        <form action="" method="post"> 
            <p><?php echo $line[0]; ?></p> 
            <img src="<?php echo $line[1];?>"/> 
        </form>
        <?php
    }


 fclose($file); 
 ?>
    </div>
</body>
</html>