<html>
    <body>
        <pre>
            <?php
                $api_key = "prj_live_sk_5014c0483ac78ccca7ea5a847c0de989446ae828";
                $curl = curl_init();
                curl "https://api.radar.io/v1/geocode/forward?query=20+jay+st+brooklyn+ny" \-H "Authorization: prj_live_pk_...";
                curl_setopt($curl, CURLOPT_URL, "https://services.marinetraffic.com/api/exportvesseltrack/v:3/10617f57ee871819862ca005ccadefc45827d462/period:daily/days:10/mmsi:".$id."/protocol:xml");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
                $xml = curl_exec($curl);
                curl_close($curl);
        
                $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
                $xml = json_encode($xml);
                $xml = json_decode($xml, true);
            ?>
        </pre>
    </body>
</html>