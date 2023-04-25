<?php 
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "armadaproj";    
        
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>