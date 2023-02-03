<html>
  <body>
    <?php

      // Définir la clé API dans une variable d'environnement
      $api_key = getenv("0c0e7b2ac6b9afd4ee3aeb83a772ef7a&language=en-US");
      // Construire l'URL de requête
      $url =  "https://api.themoviedb.org/3/movie/5000?api_key=0c0e7b2ac6b9afd4ee3aeb83a772ef7a&language=en-US";

      // Initialiser la requête CURL
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      // Vérifier si la requête CURL a réussi
      $data = file_get_contents($url);
      $data = json_decode($data,true);
      curl_close($curl);
      
      //Afficher la partie demander
      $overview = $data['overview'];
      var_dump($overview);

    ?>
    <p> <?php echo $overview; ?> </p>

  </body>
</html>