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