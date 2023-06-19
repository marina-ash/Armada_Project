​<?php
 include('connexionbdd.php');
?>
 
<html>
  <body>
    <pre>

      <?php
      
     
        $api_key = "9de816e3e2d89da6031822d6a82906c199c3378e";
        /*$tableauBateauxMMSI = ["224001900" => 'Atyla', "228061110" => 'Bel Espoir', "228796000" => 'Belle Poule', "770576100" => 'Capitan Miranda', "205208000" => 'Crocus', "228797000" => 'Etoile', "228000700" => 'Etoile Du Roy', "227731000" => 'Etoile Molene', "8650796" => 'Hydrograaf', "205209000" => 'Lobelia', "227806500" => 'Mutin', "224123770" => 'Nao Victoria', "224534350" => 'Pascual Flores', "273452840" =>'Shtandart', "263804290" => 'VERA CRUZ'];
        $tableauBateauxIMO = ["8622983" => 'Belem', "8333635" => 'Atlantis', "9792319" => 'Bima Suci', "7821075" => 'Dar Mlodziezy', "5183120" => 'Le Francais', "5225514" => 'Marite', "5241659" => 'Morgenster', "5312628" => 'Santa Maria Manuela', "5339248" => 'STATSRAAD LEHMKUHL', "8101276" => 'Thalassa' ];*/
        $tableauBateauxMMSI = ["224001900" => 'Atyla', "228061110" => 'Bel Espoir'];
        $tableauBateauxIMO = ["8622983" => 'Belem', "8333635" => 'Atlantis'];

        foreach ($tableauBateauxMMSI as $idMMSI => $nameMMSI){
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/
          $api_key/period:daily/days:1/mmsi:$idMMSI/protocol:xml");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // Vérifier la certification SSL et false pour la désactiver
  
          $xml = curl_exec($curl); //Ouvre la connexion
          curl_close($curl); //Ferme la connexion API
          
          echo ($xml);
            
          //Passer de XML en Json
          $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
          $xml = json_encode($xml);
          $xml = json_decode($xml, true);
            
          if (empty($xml)){ // Vérifie si l'XML est vide 
            var_dump('plus de credit valeur',$xml);
            return; // Quitte la fonction en cours
          }
  
          $xml = isset($xml['POSITION']) ? $xml['POSITION'] : null; 
          //Récupère les données de position du bateau et les assigne à la variable $xml
          
          // Vérifie si les attributs de position existent dans $xml, sinon récupère le dernier élément du tableau $xml et ses attributs
          $item = isset ($xml['@attributes']) ? $xml['@attributes'] : (is_array($xml) ? $xml[count($xml)-1]['@attributes'] : null); 
          echo $item['MMSI'] . "     :     " . $item['LAT'] . "    :   " . $item['LON'] .  "   :   " . $item['TIMESTAMP']. "  
           :   " . $nameMMSI."<br>"; // Affiche les valeurs des attributs

  
          $sql = "INSERT INTO position (lat, lon, timestamp, id_bateaux) VALUES 
          (:lat, :lon, :timestamp, SELECT bateaux.id_bateaux FROM bateaux WHERE bateaux.MMSI = :nameMMSI)";
          try {
            $stmt = $bdd->prepare($sql); // Prépare la requête SQL
            $stmt->bindParam(':nameMMSI', $nameMMSI); // Lie la valeur de $nameMMSI au paramètre :nameMMSI
            $stmt->bindParam(':lat', $item['LAT']); // Lie la valeur de $item['LAT'] au paramètre :lat
            $stmt->bindParam(':lon', $item['LON']); // Lie la valeur de $item['LON'] au paramètre :lon
            $stmt->bindParam(':timestamp', $item['TIMESTAMP']);// Lie la valeur de $item['TIMESTAMP'] au paramètre :timestamp
            $stmt->execute(); // Exécute la requête SQL
            echo "New record created successfully<br>"; // Affiche un message en cas de succès de l'insertion
          } 
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec de l'insertion
          }
        }
    
          
  
          
        foreach ($tableauBateauxIMO as $idIMO => $nameIMO){
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/$api_key/period:daily/days:1/imo:$idIMO/protocol:xml");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // Vérifier la certification SSL et false pour la désactiver
  
          $xml = curl_exec($curl); //Ouvre la connexion
          curl_close($curl); //Ferme la connexion API
            
          //Passer de XML en Json
          $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
          $xml = json_encode($xml);
          $xml = json_decode($xml, true);
  
          if (empty($xml)){ // Vérifie si l'XML est vide 
            var_dump('plus de credit valeur',$xml);
            return; // Quitte la fonction en cours
          }
  
          $xml = isset($xml['POSITION']) ? $xml['POSITION'] : null;
  
          $item = isset ($xml['@attributes']) ? $xml['@attributes'] : (is_array($xml) ? $xml[count($xml)-1]['@attributes'] : null);
          echo $item['MMSI'] . "     :     " . $item['LAT'] . "    :   " . $item['LON'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $nameIMO."<br>";
  
          $sql = "INSERT INTO position (lat, lon, timestamp, id_bateaux) VALUES (:lat, :lon, :timestamp, SELECT bateaux.id_bateaux FROM bateaux WHERE bateaux.IMO = :nameIMO)";
  
          try {
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nameIMO', $nameIMO);
            $stmt->bindParam(':lat', $item['LAT']);
            $stmt->bindParam(':lon', $item['LON']);
            $stmt->bindParam(':timestamp', $item['TIMESTAMP']);
            $stmt->execute();
            echo "New record created successfully<br>";
          } 
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        }
      ?>
      
    </pre>
  </body>
</html>