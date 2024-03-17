<?php
session_start();
if (!isset( $_SESSION['nom'])){
    $_SESSION['nom']="";
}
if (!isset( $_SESSION['ajouts'])){
    $_SESSION['ajouts']=0;
}
$indice=$_SESSION['ajouts'];
if ($_SESSION['ajouts'] == 0){
    $indice=1 ;
}
if ( $_SESSION['ajouts']==6){
    $quizz=$_SESSION['nom'];
    $url=$_SESSION['nom'];
    $_SESSION['nom']="";
    $url_encoded = urlencode($url);
    $url_quiz = "http://localhost/PHP/Quizzeo/quizzstart.php?bb=$url_encoded";
    $file_name1 = 'nomquizz.csv';
    $file_y= fopen( $file_name1 , 'a');
    if (filesize( $file_name1) == 0) { // Vérifie si le fichier est vide
        fputcsv($file_y, [ 'id_user','id_quizz','image','url','status']); // Écrit une ligne d'en-tête CSV si le fichier est vide
    }
    fputcsv($file_y,[$_SESSION['id_user'],$quizz,$_POST['image'],$url_quiz,$_SESSION['sat'],"En cours"]);
    fclose($file_y); 
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
     <form method="post" action="creationquizz.php?id=<?php echo  $indice?>">
     <h1>Création de Quizz</h1>
     <h1>Question <?php echo $indice?>/5</h1>
     <label for="choix"> Nom du Quizz </label>
     <input type="text" name="nom" id='ajt' value="<?php echo $_SESSION['nom'] ?>" >
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
     <input type="submit" name="action" id='ajt' value="Ajouter">
     
</body>
</html>