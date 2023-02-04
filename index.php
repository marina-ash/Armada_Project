<html>
  <body>
    <pre>

      <?php
        $api_key = "10617f57ee871819862ca005ccadefc45827d462";
        $tableauBateauxMMSI = ["224001900" => 'ATYLA', "228000700" => 'ETOILE DU ROY', "228796000" => 'BELLE POULE', "205208000" => 'CROCUS', "205208000" => 'CROCUS'];
        $tableauBateauxIMO = ["7821075" => 'DAR MLODZIEZY'];

        foreach ($tableauBateauxMMSI as $id => $name){
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/10617f57ee871819862ca005ccadefc45827d462/period:daily/days:3/mmsi:".$id."/protocol:xml");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

          $xml = curl_exec($curl);
          curl_close($curl);

          $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
          $xml = json_encode($xml);
          $xml = json_decode($xml, true);
          $xml = $xml  ['POSITION'];

          $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[sizeof($xml)-1] ['@attributes'];
          echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";
                    
        } 

        foreach ($tableauBateauxMMSI as $id => $name){
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/10617f57ee871819862ca005ccadefc45827d462/period:daily/days:3/imo:".$id."/protocol:xml");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

          $xml = curl_exec($curl);
          curl_close($curl);

          $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
          $xml = json_encode($xml);
          $xml = json_decode($xml, true);
          $xml = $xml  ['POSITION'];

          $item = isset ($xml ['@attributes']) ? $xml ['@attributes'] : $xml[sizeof($xml)-1] ['@attributes'];
          echo $item['MMSI'] . "     :     " . $item['LON'] . "    :   " . $item['LAT'] .  "   :   " . $item['TIMESTAMP']. "   :   " . $name."<br>";
                    
        } 
      ?>

    </pre>
  </body>
</html>
