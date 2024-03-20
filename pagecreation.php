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
        <label for="choix"> Nom du Quizz </label>
         <input type="text" name="test" id='ajt' value="<?php echo $_SESSION['nom'] ?>" >
         <label for="image">Miniature</label>
         <img src="<?php echo  $_SESSION['image'] ?>" id="preview" style="max-width: 300px; max-height: 300px;">
         <br>
         <input type="file" name="miniature" id="image" accept="image/*" onchange="previewImage('image', 'preview')">
        <input type="submit" name="action1" id="jt" value="QCM" >
        <input type="submit" name="action1" id="jt" value="Ouverte" >
    </form>

 
   
    <?php 
        if($_SESSION['Toi']=="QCM") {
            ?> 
            <form  method="post" action="creationquizz.php?id=<?php echo  $indice?>" enctype="multipart/form-data">
            <h1>Création de Quizz</h1>
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
            <h1>Création de Quizz</h1>
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