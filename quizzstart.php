<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
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

/* Styles pour le contenu spécifique du quiz */

.container {
            max-width: 800px;
            margin: 125px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333; /* Couleur du texte */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #403644; /* Couleur spécifique au titre */
        }

        form {
            margin-bottom: 20px;
        }
        form img{
            display: flex;
            align-items: center;
            width: 300px;
            margin-left: 230px;
        }
        label {
            display: block;
            font-weight: bold;
        }

        .reponse {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #FFB6C1;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #D8BFD8;
        }
        .libre {
            display: flex;
            flex-direction: column;
            border-radius: 8px;
            background-color: #f5f5f5;
            box-shadow: 
        }

        .libre label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .libre input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Styles pour les boutons dans ce formulaire */
        .libre input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #FFB6C1;
            color: white;
            cursor: pointer;
        }

        .libre input[type="submit"]:hover {
            background-color: #D8BFD8;
        }
        
        </style>
</head>
<body>
    
</body>
</html>
<nav> 
        <div id="contenu"> 
            <div> 
                <img class="logo" src="asset/quizzeo.png" value =''>
            </div>
            <div class='log'> 
                <a href="./traitement_deco.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>
    <div class='container'>
        
<?php
    session_start(); // Démarre une session PHP

    if (isset($_GET['bb'])){
        $_SESSION['nom1']=$_GET['bb'];
    }
    if (!isset( $_SESSION['ligne'])&&!isset( $_SESSION['Point'])){
        $file_r=fopen("progretion.csv","r"); 
        $found=false;
        while(($pro=fgetcsv($file_r))!==false){
               if ($_SESSION['id_user'] == $pro[0] && $_SESSION['nom1'] == $pro[1]){
                $_SESSION['ligne'] = $pro[2];
                $_SESSION['Point']=  $pro[3]; 
                $found=true;
                break;
               }
        }
        fclose($file_r); 
        if(!$found){
            $_SESSION['ligne'] = 1;
            $_SESSION['Point']=0; 

           }
        
    }
    $file=fopen("quizz.csv","r"); // Ouvre le fichier CSV des favoris en mode lecture
    
    while(($data=fgetcsv($file))!==false){ // Parcours du fichier CSV des favoriss
        while(($line = fgetcsv($file)) !== false) {
            if($line[0] == $_SESSION['nom1']){
            if($line[1] == $_SESSION['ligne']){
            if($line[9] == 0){
                $option=array($line[3], $line[4], $line[5], $line[6]);
                shuffle($option);
             // Lecture de chaque ligne du fichier
           ?>  
           <form action="traitrement_quizz.php" method="post">
                <h1>Question <?php echo $_SESSION['ligne']?></h1>
                <img src='<?php echo $line[8] ?>'>
                <label for="nom"><?php echo $line[2]?> ? </label>
                <?php
                foreach($option as $key => $options) {
                ?>
                <div class="reponse">
                 <input type='radio' name='choix' id='option<?php echo $key ?>' value='<?php echo $options ?>'>
                 <label for='option<?php echo $key ?>'><?php echo $options ?></label><br>
                </div>
                 <?php
                } 
            ?>
                <input type="submit" name="action" id='Accueil' value="Accueil"> 
                <input type="submit" name="action" id='Continuer' value="Continuer"> 
            
           </form>
            <?php
            }
            else{
                ?>  
                <form action="traitrement_quizz.php" method="post">
                     <h1>Question <?php echo $_SESSION['ligne']?></h1>
                     <img src='<?php echo $line[8] ?>'>
                     <div class ='libre'>
                      <label for="nom"><?php echo $line[2]?> ? </label>
                      <input type="text" name="choix" id='choix'> 
                     </div>
                     <input type="submit" name="action" id='Accueil' value="Accueil"> 
                      <input type="submit" name="action" id='Continuer' value="Continuer"> 
                     </div>
                </form>
                 <?php
            }
        }}}
    }  

fclose($file); // Ferme le fichier CSV des favoris
?>
    
  <h1>Score <?php echo $_SESSION['Point']?>/5</h1>
</div>
  </body>
</html>