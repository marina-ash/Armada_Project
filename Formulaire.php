<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$username = 'ArmadaAdmin';
$password = 'btssnir';
$dbname = 'armada_projet';

if (!empty($_POST)) {
    $user_nom = $_POST["user_nom"];
    $user_prenom = $_POST["user_prenom"];
    $user_datenaissance = $_POST["user_datenaissance"];
    $user_adressemail = $_POST["user_adressemail"];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO utilisateur (nom, prenom, dateDeNaissance, adresseMail) VALUES (:value1, :value2, :value3, :value4)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":value1", $user_nom);
        $statement->bindParam(":value2", $user_prenom);
        $statement->bindParam(":value3", $user_datenaissance);
        $statement->bindParam(":value4", $user_adressemail);
        $statement->execute();
        echo "Données insérées avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    
}
?>



