<?php
session_start();
if (!isset( $_SESSION['nom']) && !isset($_SESSION['ajouts'])&& !isset($_SESSION['image'])&& !isset($_SESSION['Type'])&& !isset( $_SESSION['Toi'])){
    $_SESSION['nom']="";
    $_SESSION['image']="";
    $_SESSION['ajouts']=1 ;
    $_SESSION['Type']=0;
    $_SESSION['Toi']="";

}

$indice=$_SESSION['ajouts'];
if ($_SESSION['ajouts'] == 0){
    $indice=1 ;
}
if ( $_SESSION['ajouts']==6){
    $_SESSION['Toi']="";
    $quizz=$_SESSION['nom'];
    $url=$_SESSION['nom'];
    $_SESSION['nom']="";
    $_SESSION['Type']=0;
    $url_encoded = urlencode($url);
    $url_quiz = "http://localhost/PHP/Quizzeo/quizzstart.php?bb=$url_encoded";
    $file_name1 = 'nomquizz.csv';
    $file_y= fopen( $file_name1 , 'a');
    if (filesize( $file_name1) == 0) { // Vérifie si le fichier est vide
        fputcsv($file_y, [ 'id_user','id_quizz','image','url','status']); // Écrit une ligne d'en-tête CSV si le fichier est vide
    }
    fputcsv($file_y,[$_SESSION['id_user'],$quizz, $_SESSION['image'],$url_quiz,$_SESSION['sat'],"En cours","Activer"]);
    fclose($file_y); 
    $_SESSION['image']="";
    if ($_SESSION['sat'] == 'Ecole'){
        $_SESSION['ajouts']=1;
         header('location: ./indexecole.php');
    }
    else{
        $_SESSION['ajouts']=1;
        header('location: ./indexentreprise.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Quizz</title>
    <link rel="stylesheet" type="text/css" href='pagecreation.css'>
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
 
   


    <form id="QCM" method="post" action="creationquizz.php" enctype="multipart/form-data" >
        <h1>Création de Quizz</h1>
        <label for="choix"> Nom du Quizz </label>
         <input type="text" name="test" id='ajt' value="<?php echo $_SESSION['nom'] ?>" >
         <label for="image">Miniature</label>
         <img src="<?php echo  $_SESSION['image'] ?>" id="preview" style="max-width: 300px; max-height: 300px;">
         <br>
         <input type="file" name="miniature" id="image" accept="image/*" onchange="previewImage('image', 'preview') class="input-file-hidden">
        <input type="submit" name="action1" id="jt" value="QCM" >
        <input type="submit" name="action1" id="jt" value="Ouverte" >
    </form>

 
   
    <?php 
        if($_SESSION['Toi']=="QCM") {
            ?> 
            <form  method="post" action="creationquizz.php?id=<?php echo  $indice?>" enctype="multipart/form-data">
            <h1>Question <?php echo $indice?>/5</h1>
            <input type="hidden" name="nom" id='ajt' value="<?php echo $_SESSION['nom'] ?>" >
            <label for="choix"> Question  </label>
            <input type="text" name="qst1" id='ajt' required >
            <label for="choix"> Bonne reponse   </label>
            <input type="text" name="reponse1" id='ajt' required>
            <label for="choix"> Mauvaise reponse  </label>
            <input type="text" name="reponse2" id='ajt' required >
            <label for="choix"> Mauvaise reponse   </label>
            <input type="text" name="reponse3" id='ajt'  required>
            <label for="choix"> Mauvaise reponse   </label>
            <input type="text" name="reponse4" id='ajt' required>
            <label for="choix"> Point </label>
            <input type="number" name="point" id='ajt' required>
            <label for="image">Image</label>
            <img src="" id="preview1" style="max-width: 300px; max-height: 300px;">
            <br>
            <input type="file" name="image" id="image1" accept="image/*" onchange="previewImage('image1', 'preview1')">
            <input type="submit" name="action" id='ajt' value="Ajouter">
            </form>
            <form method="post" action="creationquizz.php">
            <input type="submit" name="action" id='ajt' value="Enregistre">
     </form>
     <?php } 
     elseif ($_SESSION['Toi']=="Ouverte") {
           ?>
            <form  method="post" action="creationquizz.php?id=<?php echo  $indice?>" enctype="multipart/form-data">
            <h1>Question <?php echo $indice?>/5</h1>
            <label for="image">Image</label>
            <img src="" id="preview2" style="max-width: 300px; max-height: 300px;">
            <br>
            <input type="file" name="image" id="image2" accept="image/*" onchange="previewImage('image2', 'preview2')">
            <input type="hidden" name="nom" id='ajt' value="<?php echo $_SESSION['nom'] ?>" >
            <label for="choix"> Question  </label>
            <input type="text" name="qst1" id='ajt' required >
            <label for="choix"> Bonne reponse (Facultatif)  </label>
            <input type="text" name="reponse1" id='ajt' >
            <label for="choix"> Point </label>
            <input type="number" name="point" id='ajt' required>
            <input type="submit" name="action" id='ajt' value="Ajouter">
            </form>
            <form method="post" action="creationquizz.php">
            <input type="submit" name="action" id='ajt' value="Enregistre">

        <?php
     }
     
     
     
     
     ?>
  <script>
    function previewImage(inputId, previewId) {
      var preview = document.getElementById(previewId);
      var fileInput = document.getElementById(inputId);
      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
      };

      if(file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
      }
    }
  </script>
</body>
</html>