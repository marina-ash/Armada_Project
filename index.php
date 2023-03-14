<html>
  <body>
    <pre>
      <?php
          $api_key = "9de816e3e2d89da6031822d6a82906c199c3378e";
          $servername ="172.18.214.149";
          $username = "ArmadaAdmin";
          $password = "btssnir";
          $dbname = "armada_projet";

          $tableauBateauxMMSI = ["224001900" => 'Atyla', "228061110" => 'Bel Espoir', "228796000" => 'Belle Poule', "770576100" => 'Capitan Miranda', "205208000" => 'Crocus', "228797000" => 'Etoile', "228000700" => 'Etoile Du Roy', "227731000" => 'Etoile Molene', "8650796" => 'Hydrograaf', "227306100" => 'La Recouvrance', "205209000" => 'Lobelia', "227806500" => 'Mutin', "224123770" => 'Nao Victoria', "224534350" => 'Pascual Flores', "273452840" =>'Shtandart', "263804290" => 'VERA CRUZ'];
          $tableauBateauxIMO = ["8622983" => 'Belem', "8333635" => 'Atlantis', "9792319" => 'Bima Suci', "8107505" => '8107505', "7821075" => 'Dar Mlodziezy', "9648506" => 'Jeanne Barret', "5183120" => 'Le Francais', "5225514" => 'Marite', "5241659" => 'Morgenster', "5312628" => 'Santa Maria Manuela', "5339248" => 'STATSRAAD LEHMKUHL', "8101276" => 'Thalassa' ];
        
          //Connexion à la base de donnée
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // Localisation des bateaux MMSI
          foreach ($tableauBateauxMMSI as $id => $name){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/$api_key/period:daily/days:3/mmsi:".$id."/protocol:xml");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
            $xml = curl_exec($curl);
            curl_close($curl);
        
            $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
            $xml = json_encode($xml);
            $xml = json_decode($xml, true);
            
            if (empty($xml)){
              continue;
            }
            var_dump($xml);
        
            $xml = $xml['DATA']['POSITION'];
        
            $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[count($xml)-1] ['@attributes'];
            echo $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";

            // Insérer les données dans la base de données
            $sql = "INSERT INTO positions (bateau,lon, lat, timestamp) VALUES ('".$item['NAME']."','".$item['LON']."', '".$item['LAT']."', '".$item['TIMESTAMP']."', '".$name."')";

            if (mysqli_query($conn, $sql)) 
            {
                echo "New record created successfully<br>";
            } 
            
            else 
            {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
                        
          } 

          // Localisation des bateaux IMO 
          foreach ($tableauBateauxIMO as $id => $name){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/$api_key/period:daily/days:3/imo:".$id."/protocol:xml");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
            $xml = curl_exec($curl);
            curl_close($curl);
        
            $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
            $xml = json_encode($xml);
            $xml = json_decode($xml, true);
            
            if (empty($xml)){
              continue;
            }
            var_dump($xml);
        
            $xml = $xml['DATA']['POSITION'];
            
            $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[count($xml)-1] ['@attributes'];
            echo $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";

            // Insérer les données dans la base de données
            $sql = "INSERT INTO positions (bateau,lon, lat, timestamp) VALUES ('".$item['NAME']."','".$item['LON']."', '".$item['LAT']."', '".$item['TIMESTAMP']."', '".$name."')";

            if (mysqli_query($conn, $sql)) 
            {
                echo "New record created successfully<br>";
            } 
            
            else 
            {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
                        
          } 
          
          

      ?>
    </pre>
  </body>
</html>
