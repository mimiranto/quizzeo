<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a9b1444fa4.js" crossorigin="anonymous"></script>
    <title>ACCUEIL</title>
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
       
        #txt{
            width:40% ;
            height:40vh;
            border-radius:30px;
            background-color:white;
            text-align: center;
            font-size:20px;
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 25vh;
            letter-spacing: 1px;
        }
        #txt:hover{
            transform: scale(1.02);
         box-shadow: 5px 10px 10px #FFB6C1;
         transition:0.5s;
        }
        #txt-container{
            width:100%;
            display:flex;
            justify-content:center;
            flex-wrap: wrap;
            
        }
        footer
{
    height: 200px;
    background-color: #252424;
    bottom: 0;
}

.box_footer
{
    width: 40%;
    margin: 0 auto;
    border-bottom: none;
    height: 100px;
    padding-top: 2rem;
}

.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
    padding: 0;
}

.socials li{
    margin: 0 10px;
}

.socials a{
    color: #fff;
    border: 2px solid white;
    padding: 5px;
    border-radius: 50%;
    vertical-align: middle;

}

.socials a i{
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}

.socials a:hover i{
    color: #008e9e;
    transition:.4s ease;
}

.p_footer
{
    font-size:small;
    text-align: center;
    padding: 0;
    color:white;
}
    </style>
</head>
<body>
 
    <nav> <!-- Balise de navigation -->
        <div id="contenu"> <!-- Conteneur de la barre de navigation -->
            <div> <!-- Première partie de la barre de navigation : logo -->
                <img class="logo" src="asset/quizzeo.png"> <!-- Logo -->
            </div>
            <div class='log'> <!-- Deuxième partie de la barre de navigation : liens d'inscription et de connexion -->
                <a href="./inscription.php" id="inscription">Inscription</a> <!-- Lien vers la page d'inscription -->
                <a href="./login.php" id="connexion">Connexion</a> <!-- Lien vers la page de connexion -->
            </div>
        </div>
    </nav>
 
    <div id="txt-container">
    <div id="txt">
        <h2>Quizzeo🤩🧠</h2><br/>
        <p>Découvrez le monde des quiz comme jamais auparavant! </p>
        <p>Créez, partagez puis jouez à des quiz passionnants sur tous les sujets imaginables et éclatez-vous avec vos amis ! 🎉 </p>
        <p>Rejoignez la communauté Quizzeo dès maintenant en vous inscrivant ou en vous connectant pour une expérience inoubliable! 🧠🔥</p>
    </div>
    </div>  
    <br><br>
    <footer>
        <div class="box_footer">
            <div class="all_reseau">
                <ul class="socials">
                    <li><a href="www.linkedin.com/in/ezechiel-batchi-2b47a623a" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="https://github.com/mimiranto/quizzeo.git" target="_blank"><i class="fa-brands fa-github"></i></a></li>
                 </ul>
            </div> 

            <hr>
            <p class="p_footer">Ezechiel BATCHI ; Stevens Simonis ; Miranto Rakotobe ; Karlson Tabe , © 2024 Tous droit réservés</p>
        </div>
</footer>
</body>
</html>