<<<<<<< HEAD
<html>
  <body>
    <?php

      // Définir la clé API dans une variable d'environnement
      $api_key = getenv("10617f57ee871819862ca005ccadefc45827d462");

      // Construire l'URL de requête
      $url =  "https://services.marinetraffic.com/api/exportvesseltrack/10617f57ee871819862ca005ccadefc45827d462/v:3/period:daily/days:3/mmsi:241486000";

      // Initialiser la requête CURL
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      // Vérifier si la requête CURL a réussi
      $data = file_get_contents($url);
      $data = json_decode($data,true);

      var_dump($data);

      foreach ($data as $item) {
          echo $item['MMSI'] . " : " . $item['SPEED'] . " : " . $item['LON'] . " : " . $item['LAT'] . "<br>";
      }

    ?>

  </body>
</html>
=======
<html>
  <body>
    <pre>
      <?php
          $api_key = "10617f57ee871819862ca005ccadefc45827d462";
          $tableauBateauxMMSI = ["224001900" => 'ATYLA', "228000700" => 'ETOILE DU ROY', "228796000" => 'BELLE POULE', "205208000" => 'CROCUS', "205208000" => 'CROCUS'];
          $tableauBateauxIMO = ["7821075" => 'DAR MLODZIEZY'];
        
          foreach ($tableauBateauxMMSI as $id => $name){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/10617f57ee871819862ca005ccadefc45827d462/period:daily/days:10/mmsi:".$id."/protocol:xml");
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
        
            $xml = $xml  ['POSITION'];
        
            $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[count($xml)-1] ['@attributes'];
            echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";
                        
          } 
          foreach ($tableauBateauxIMO as $id => $name){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/10617f57ee871819862ca005ccadefc45827d462/period:daily/days:3/imo:".$id."/protocol:xml");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
            $xml = curl_exec($curl);
            curl_close($curl);
        
            $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
            $xml = json_encode($xml);
            $xml = json_decode($xml, true);
            if (empty($xml)){
              continue;
            }
            
            $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[count($xml)-1] ['@attributes'];
            echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";
                        
          } 
          
          

      ?>
    </pre>
  </body>
</html>

>>>>>>> 3555f49873e2737357630d890f61dcdf70c6981f
