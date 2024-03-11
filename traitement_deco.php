<?php
session_start();

if (isset($_SESSION['id_user'])) {
    $log_file_name = 'log_login.csv';

    $log_file = fopen($log_file_name, 'a');

    if ($log_file) {
        $data = array(
            date("Y-m-d H:i"),
            $_SESSION['id_user'], 
            "Déconnecté" 
        );

        
        fputcsv($log_file, $data);

        
        fclose($log_file);
    }
}
header('Location: login.php');
?>