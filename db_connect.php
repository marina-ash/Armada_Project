<?php  


    $user = 'root';
    $passwordbdd = '';
   
    if (!empty($_POST)) {

        $email = $_POST["user_email"];
        $password = $_POST["user_password"];

        try {       
            $pdo = new PDO('mysql:host=localhost;dbname=movie', $user, $passwordbdd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "INSERT INTO info (email, password)
            VALUES (:value1, :value2)";
    
            $statement = $pdo->prepare($sql);
            $statement->bindParam("value1", $email);
            $statement->bindParam("value2", $password);
            $statement->execute();
    
            echo "Données insérées avec succès.";
        } 
        catch (PDOException $e) {
             echo "Erreur : " . $e->getMessage();
        }

        echo "Email :" . $email. "<br>";
        echo "Password :" . $password ."<br>";
    }
    
?>