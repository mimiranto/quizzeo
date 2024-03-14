<?php
    session_start(); // Démarre une session PHP

    if (isset($_GET['bb'])){
        $_SESSION['nom']=$_GET['bb'];
    }
    if (!isset( $_SESSION['ligne'])&&!isset(  $_SESSION['Point'])){
        $file_r=fopen("progretion.csv","r"); 
        $found=false;
        while(($pro=fgetcsv($file_r))!==false){
               if ($_SESSION['id_user'] == $pro[0] && $_SESSION['nom'] == $pro[1]){
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

   print_r($_SESSION['nom']);
    $file=fopen("quizz.csv","r"); // Ouvre le fichier CSV des favoris en mode lecture
   
    
    while(($data=fgetcsv($file))!==false){ // Parcours du fichier CSV des favoriss
        while(($line = fgetcsv($file)) !== false) {
            if($line[0] == $_SESSION['nom']){
            if($line[1] == $_SESSION['ligne']){
                $option=array($line[3], $line[4], $line[5], $line[6]);
                shuffle($option);
             // Lecture de chaque ligne du fichier
           ?>  <!-- Vérifie si l'ID de l'utilisateur correspond à celui stocké en session -->
           <form action="traitrement_quizz.php" method="post"> 
                <label for="nom"><?php echo $line[2]?></label>
                <select name="choix" id="">
                    <?php
                    foreach($option as $options){
                    echo "<option value=\"$options\">$options</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="action" id='Accueil' value="Accueil"> 
                <input type="submit" name="action" id='Continuer' value="Continuer"> 
            

            <?php
            }}}
    }  

fclose($file); // Ferme le fichier CSV des favoris
?>
  <h1><?php echo $_SESSION['ligne']."".$_SESSION['Point']?>/5</h1>