<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Armada</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
        crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""> </script>


    </head>
    <body >
       
        <header>
            <header >
                <img class="logo" src="img/logo.png">
            </header>
        </header>  

        <div class="fond-1">
            <div id="bar">
                <ul class="menu-bar">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Carte Maps</a></li>
                    <li><a href="#">Réservations</a></li>
                    <li><a href="#">Qui sommes nous?</a></li>
                </ul>
            </div>
            <div id="boxes">
                <div id="colonne1">
                    <h1> 
                        L’ARMADA, UN PEU D’HISTOIRE, LA NAISSANCE D’UN GRAND ÉVÉNEMENT 
                    </h1>
                </div>
                <div class="blockquote-wrapper">
                    <div class="blockquote">
                      <h1>
                        Bienvenue sur notre site web dédié aux bateaux de l'armada ! Ici, vous pouvez découvrir la localisation en temps réel de tous les bateaux, et même réserver votre place à bord de l'un d'entre eux. Que vous soyez un passionné de navigation ou simplement à la recherche d'une expérience unique, nous sommes ravis de vous offrir un accès privilégié à cet événement exceptionnel. Notre équipe est à votre disposition pour vous guider et vous aider à profiter au maximum de votre visite. Nous vous souhaitons une excellente découverte de notre site et espérons vous voir bientôt à bord de l'un des bateaux de l'armada !
                      </h1>
                    </div>
                </div>
                <div id="colonne3">
                    <h2>
                        L’ARMADA : UNE RÉUSSITE DEPUIS 30 ANS : DÉJÀ 6 ÉDITIONS !
                    </h2>
                </div>
                
            </div>
            
            
        </div>

        <div class="fond-2">
            
            <div id="map" class="map">
                
            </div>

        </div>

        <div class="fond-3">
            <div id="Réservations" class="réservation"></div>
        </div>

        <div class="fond-4">

            <div id="Qui sommes nous?" class="nous">
                <div class="marina">

                </div>

                <div class="matthias">

                </div>
                <div class="djem">

                </div>
            </div>
            
            <footer>
                <p>Copyright @2023 | Designed With by Marina ASHRAF MORIS</p>
            </footer>

        </div>

        <?php 
        
            $servername ="localhost";
            $username = "root";
            $password = "";
            $dbname = "armadaproj";    
        
            // Connexion à la base de données
            $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `bateau` where `id bateau` in (select max(`id bateau`) from `bateau` group by `name`)";
            $requete = $bdd->query($sql);
            $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <script>
            var map = L.map('map').setView([51.505, -0.09], 13);
            let marker;
            <?php foreach ($donnees as $row ): ?>
                    marker = L.marker(['<?= $row["lon"] ?>','<?= $row["lat"] ?>']);
                    marker.addTo(map);
                    marker.bindPopup('<?= $row['name'] ?>').openPopup();
            <?php endforeach; ?>
            
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        </script>
      
    </body>
</html>