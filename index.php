​<html>
  <body>
    <pre>

      <?php
        // Génère un code unique pour chaque jour en utilisant la date du jour
        $code = "CODE-" . date('Y-m-d');

        // Affiche le code généré pour le jour en cours
        echo $code;
        
        $api_key = "9de816e3e2d89da6031822d6a82906c199c3378e";
        $tableauBateauxMMSI = ["228000700" => 'Etoile Du Roy'];
        $tableauBateauxIMO = ["7821075" => 'DAR MLODZIEZY'];
        $servername ="localhost";
        $username = "root";
        $password = "";
        $dbname = "armadaproj";
 
         // Connexion à la base de données
         $dsn = "mysql:host=$servername;dbname=$dbname";
         $options = array(
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         );
         try {
             $conn = new PDO($dsn, $username, $password, $options);
         } catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             exit;
         }
 
         foreach ($tableauBateauxMMSI as $idMMSI => $nameMMSI){
           $curl = curl_init();
           curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/$api_key/period:daily/days:1/mmsi:$idMMSI/protocol:xml");
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // Vérifier la certification SSL et false pour la désactiver
 
           $xml = curl_exec($curl);
           curl_close($curl);
 
           $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
           $xml = json_encode($xml);
           $xml = json_decode($xml, true);
 
           if (empty($xml)){
             continue;
           }
 
           $xml = $xml['POSITION'];
 
           $item = isset ($xml['@attributes']) ? $xml['@attributes'] : $xml[count($xml)-1]['@attributes'];
           echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $nameMMSI."<br>";
 
           $sql = "INSERT INTO bateau (name, lon, lat, timestamp, vessel_id) VALUES (:nameMMSI, :lon, :lat, :timestamp, :vessel_id)";
 
             try {
                 $stmt = $conn->prepare($sql);
                 $stmt->bindParam(':nameMMSI', $nameMMSI);
                 $stmt->bindParam(':lon', $item['LON']);
                 $stmt->bindParam(':lat', $item['LAT']);
                 $stmt->bindParam(':timestamp', $item['TIMESTAMP']);
                 $stmt->bindParam(':vessel_id', $idMMSI);
                 $stmt->execute();
                 echo "New record created successfully<br>";
             } catch(PDOException $e) {
                 echo "Error: " . $e->getMessage();
             }
         }
   
         
 
        
         foreach ($tableauBateauxIMO as $idIMO => $nameIMO){
           $curl = curl_init();
           curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/9de816e3e2d89da6031822d6a82906c199c3378e/period:daily/days:1/imo:".$idIMO."/protocol:xml");
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // Vérifier la certification SSL et false pour la désactiver
 
           $xml = curl_exec($curl);
           curl_close($curl);
 
           $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
           $xml = json_encode($xml);
           $xml = json_decode($xml, true);
 
           if (empty($xml)){
             continue;
           }
 
           $xml = $xml['POSITION'];
 
           $item = isset ($xml['@attributes']) ? $xml['@attributes'] : $xml[count($xml)-1]['@attributes'];
           echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $nameMMSI."<br>";
 
           $sql = "INSERT INTO bateau (name, lon, lat, timestamp, vessel_id) VALUES (:nameMMSI, :lon, :lat, :timestamp, :vessel_id)";
 
             try {
                 $stmt = $conn->prepare($sql);
                 $stmt->bindParam(':nameMMSI', $nameIMO);
                 $stmt->bindParam(':lon', $item['LON']);
                 $stmt->bindParam(':lat', $item['LAT']);
                 $stmt->bindParam(':timestamp', $item['TIMESTAMP']);
                 $stmt->bindParam(':vessel_id', $idIMO);
                 $stmt->execute();
                 echo "New record created successfully<br>";
             } catch(PDOException $e) {
                 echo "Error: " . $e->getMessage();
             }
         }
       ?>
 
        
     </pre>
   </body>
 </html>