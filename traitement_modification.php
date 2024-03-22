 
 <?php 
 session_start();  // Vérification de l'existence des variables et assignation de valeurs par défaut si elles ne sont pas définies


 $file_e=fopen("quizz.csv","r"); 
 while (($data4 = fgetcsv($file_e)) !== false) {
      if($data4[0] == $_POST['quizz']){
           $tab4[] = $data4;
          
  }
}
 fclose($file_e);
 $nb_ligen=count($tab4);
// Chemin vers le fichier CSV
$chemin_fichier = 'quizz.csv';
 
// Lire le fichier CSV et stocker son contenu dans un tableau
$lignes = file($chemin_fichier);
$_SESSION['Quizz']=  $_POST['quizz'];
if ($_SESSION['num'] < $nb_ligen){
        foreach ($lignes as $index => $ligne) {
            $profil = str_getcsv($ligne);
            if ($profil[0] == $_POST['quizz'] && $profil[1] == 1) {
                $_SESSION['num']++;
                // Mettre à jour les informations remplies dans le formulaire
                if (!empty($_POST['qst'])) {
                    $profil[2] = $_POST['qst'];
                }
                if (!empty($_POST['bonreponse1'])) {
                    $profil[3] = $_POST['bonreponse1'];
                }
                if (!empty($_POST['MVreponse2'])) {
                    $profil[4] =$_POST['MVreponse2'];
                }
                if (!empty($_POST['MVreponse3'])) {
                    $profil[5] = $_POST['MVreponse3'];
                }
                if (!empty($_POST['MVreponse4'])) {
                    $profil[6] =$_POST['MVreponse4'];
                }
                if (!empty($_POST['Point'])) {
                    $profil[7] = $_POST['Point'];
                }
            
                // Mettre à jour la ligne dans le tableau
                $lignes[$index] = implode(',', $profil) . "\n";
        
                // Écrire les modifications dans le fichier CSV
                file_put_contents($chemin_fichier, $lignes);
                
                ?>
                
                <div id="resultat">
                <?php echo "Profil mis à jour avec succès!";?>
                </div>
                <?php
        
                header('location: modification.php');
                exit;
            }
            
        }
}
else{
    unset($_SESSION['num']);
    unset($_SESSION['Quizz']);
    header('location: indexentreprise.php');
}
  

?>