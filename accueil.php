<?php
session_start();

// Vérifier si l'utilisateur est connecté et a un rôle défini
if (!isset($_SESSION['sat'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ./login.php');
    exit();
}

// Rediriger en fonction du rôle de l'utilisateur
if ($_SESSION['sat'] == 'admin') {
    header('Location: ./indexadmin.php');
    exit();
} elseif ($_SESSION['sat'] == 'Entreprise') {
    header('Location: ./indexentreprise.php');
    exit();
} elseif ($_SESSION['sat'] == 'Ecole') {
    header('Location: ./indexecole.php');
    exit();
} else {
    header('Location: ./indexuser.php');
    exit();
}
?>