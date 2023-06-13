<?php 
    /*$servername ="172.18.214.195";
    $username = "root";
    $password = "btssnir";
    $dbname = "projetArmada"; */
    
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "armada";
        
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>