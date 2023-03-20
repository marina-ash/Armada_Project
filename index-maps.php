<html>
    <body>
        <pre>
            <?php
                $api_key = "ce42de67371883f165af61fa1a53e660";
                $queryString = http_build_query([
                    'access_key' => 'ce42de67371883f165af61fa1a53e660',
                    'query' => '1600 Pennsylvania Ave NW',
                    'region' => 'Washington',
                    'output' => 'json',
                    'limit' => 1,
                  ]);
                  
                  $curl = curl_init(sprintf('%s?%s', 'https://api.positionstack.com/v1/forward', $queryString));
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                  
                  $json = curl_exec($curl);
                  
                  curl_close($curl);
                  
                  $apiResult = json_decode($json, true);
                  
                  var_dump($apiResult);
            ?>
        </pre>
    </body>
</html>