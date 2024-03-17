<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
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
        #inscription:hover{
            background-color: #D8BFD8;
        }
        #contenu{
            display:flex;
            justify-content: space-between;
        }
        h1{
            color:white;
            text-align:center;
            margin-top:100px;
        }
        p{
            font-size:20px;
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
 
    <h1>Notes<span style="margin-left: 10px;"><?php 
    if (isset($_POST['view_notes']) && isset($_POST['route'])) {
        $action = $_POST['view_notes'];
        $route = $_POST['route'];
    
      
        $fichier_csv = 'nomquizz.csv';
    
      
        $file = fopen($fichier_csv, 'r');
    
        if ($file) {
            
            while (($line = fgetcsv($file)) !== false) {
                
                if ($line[1] === $route) {
                   
                    echo $line[1];
                }
            }    
        }
    }
    ?><h1>
    
    <?php 
    if (isset($_POST['view_notes']) && isset($_POST['route'])) {
        $action = $_POST['view_notes'];
        $route = $_POST['route'];
    

        $fichier_csv = 'progretion.csv';
    

        $file = fopen($fichier_csv, 'r');
    
        if ($file) {
            while (($line = fgetcsv($file)) !== false) {
                if ($line[1] === $route) {
                    echo '<p>' . $line[0] . ': Score '. $line[3] .'/5'.'</p>';
                }
            }    
        }
    }
    ?>
</body>
</html>