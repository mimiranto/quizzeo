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
form{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 400px;
    padding: 1%;
    margin-top: 80px;
    background-color: white;
    border: solid 1px black;
    border-radius: 10px;
    margin-left:35%;
    margin-bottom: 100px;
}
.input-file-hidden {
  opacity: 0;
  position: absolute;
  width: 0;
  height: 0;
  overflow: hidden;
  z-index: -1;
}
input[type="file"] {
  width: 70%;
  padding: 10px;
  margin: 5px 0;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box; 
  position: relative; 
}
input[type="text"]{
    width: 70%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box; 
  }
  input[type="number"]{
    width: 35%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box; 
  }
  input[type="submit"] {
    background-color: #FFB6C1; 
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #FF8C94; 
  }
  
  img {
    max-width: 300px;
    max-height: 300px;
    margin-bottom: 10px;
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
 
   <?php 
   if (!isset($_SESSION["num"])){
    $_SESSION['num']=1;
   }
   
   print_r($_SESSION['num']);
  
    if (!isset($_POST['route'])){

        $route=$_SESSION['Quizz'];
    }
        else{
            $route=$_POST['route'];
        }
      
        $fichier_csv = 'quizz.csv';
    
      
        $file = fopen($fichier_csv, 'r');
    
        
            
            while (($line = fgetcsv($file)) !== false) {
                
                if ($line[0] == $route) {
                    if ($line[1]== $_SESSION['num']) {
                        if($line[9] == 0){
                        ?>     
                        <form class="slide" action="traitement_modification.php" method="post"> 
                                <h1>Question <?php echo $_SESSION['num']?></h1>
                                <input type="hidden" name="quizz" id='ajt' value="<?php echo $route   ?>" >
                                <label for="choix"> Question  </label>
                                <input type="text" name="qst" id='ajt' value="<?php echo $line[2]?>" >
                                <label for="choix"> Bonne reponse   </label>
                                <input type="text" name="bonreponse1" id='ajt' value="<?php echo $line[3]?>" >
                                <label for="choix"> Mauvaise reponse  </label>
                                <input type="text" name="MVreponse2" id='ajt'  value="<?php echo $line[4]?>" >
                                <label for="choix"> Mauvaise reponse   </label>
                                <input type="text" name="MVreponse3" id='ajt' value="<?php echo $line[5]?>" >
                                <label for="choix"> Mauvaise reponse   </label>
                                <input type="text" name="Mvreponse4" id='ajt'  value="<?php echo $line[6]?>">
                                <label for="choix"> Point </label>
                                <input type="number" name="Point" id='ajt' value="<?php echo $line[7]?>" >
                                <label for="image">Image</label>
                                <img src="" id="preview1" style="max-width: 300px; max-height: 300px;" value="<?php echo $line[8]?>">
                                <br>
                                <input type="file" name="image" id="image1" accept="image/*" onchange="previewImage('image1', 'preview1')">
                                <input type="submit" name="action" id='ajt' value="Modifié">
                        </form>

                        <?php
                    }else{
                        ?>     
                        <form class="slide" action="traitement_modification.php" method="post"> 
                                <h1>Question <?php echo $_SESSION['num']?></h1>
                                <label for="image">Image</label>
                                <img src="" id="preview1" style="max-width: 300px; max-height: 300px;" value="<?php echo $line[8]?>">
                                <br>
                                <input type="file" name="image" id="image1" accept="image/*" onchange="previewImage('image1', 'preview1')">
                                <input type="hidden" name="quizz" id='ajt' value="<?php echo $route   ?>" >
                                <label for="choix"> Question  </label>
                                <input type="text" name="qst" id='ajt' value="<?php echo $line[2]?>" >
                                <label for="choix"> Bonne reponse   </label>
                                <input type="text" name="bonreponse1" id='ajt' value="<?php echo $line[3]?>" >
                                <label for="choix"> Point </label>
                                <input type="number" name="Point" id='ajt' value="<?php echo $line[7]?>" >
                                <input type="submit" name="action" id='ajt' value="Modifié">
                        </form>

                        <?php
                        
                    }
                
                }}
            } 
            fclose($file);   
        
   