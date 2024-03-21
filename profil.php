<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;  
            background-color: #403644;        
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            display:flex;
            justify-content:center;
            flex-direction: column;
         
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
 
        #container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

#form {
  background-color: white;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  margin-top: 60px;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: none; /* Pour cacher les labels */
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 90%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  outline: none;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  border-color: #ff69b4; /* Rose */
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #FFB6C1;
  color: white;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #e6498e; /* Rose plus foncé au survol */
}
    </style>
     <nav> <!-- Balise de navigation -->
        <div id="contenu"> <!-- Conteneur de la barre de navigation -->
            <div> <!-- Première partie de la barre de navigation : logo -->
                <a href="indexuser.php"><img class="logo" src="asset/quizzeo.png"> </a><!-- Logo -->
            </div>
        </div>
    </nav>
</head>
<body>
 
  <div id="container">
 
    <div id="form">
        <h2>Modification de Profil</h2>
        <br>
        
        <form action="" method="post">
            <div class="form-group">
                <label for="id"></label><br>
                <input type="text" id="id" name="id" placeholder="Id" required><br><br>
            </div>
            <div class="form-group">
                <label for="lastname"></label><br>
                <input type="text" id="lastname" name="lastname" placeholder="Nom" ><br><br>
            </div>
            <div class="form-group">
                <label for="firstname"></label><br>
                <input type="text" id="firstname" name="firstname" placeholder="Prenom"><br><br>
            </div>
            <div class="form-group">
                <label for="email"></label><br>
                <input type="email" id="email" name="email" placeholder="Email"><br><br>
            </div>
            <div class="form-group">
                <label for="password"></label><br>
                <input type="text" id="password" name="password" placeholder="Mot de passe" ><br><br>
            </div>
            <button type="submit">Enregistrer les modifications</button>
        
        </form>
    </div>
  </div>   
 
 
</body>
</html>
 
<?php
// Vérification de l'existence des variables et assignation de valeurs par défaut si elles ne sont pas définies
if (!isset($id) && !isset($lastname) && !isset($firstname) && !isset($email) && !isset($password)) {
  $id = "";
  $lastname = "";
  $firstname = "";
  $email = "";
  $password = "";
}

// Récupération des valeurs depuis $_POST
$id = isset($_POST['id']) ? $_POST['id'] : $id;
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : $lastname;
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : $firstname;
$email = isset($_POST['email']) ? $_POST['email'] : $email;
$password = isset($_POST['password']) ? $_POST['password'] : $password;
 
// Chemin vers le fichier CSV
$chemin_fichier = 'user.csv';
 
// Lire le fichier CSV et stocker son contenu dans un tableau
$lignes = file($chemin_fichier);
 
foreach ($lignes as $index => $ligne) {
    $profil = str_getcsv($ligne);
    if ($profil[3] == $id) {
        // Mettre à jour les informations remplies dans le formulaire
        if (!empty($lastname)) {
            $profil[2] = $lastname;
        }
        if (!empty($firstname)) {
            $profil[1] = $firstname;
        }
        if (!empty($password)) {
            $profil[4] = $password;
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
        exit;
    }
    
}
?>
</div>
 