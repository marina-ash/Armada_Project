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

        <div class="fond-1" id="accueil">
            <nav id="bar">
                <ul class="menu-bar">
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#carte">Carte Maps</a></li>
                    <li><a href="#reservation">Réservations</a></li>
                    <li><a href="#presentation">Qui sommes nous?</a></li>
                </ul>
            </nav>
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
                    <h1>
                        L’ARMADA : UNE RÉUSSITE DEPUIS 30 ANS : DÉJÀ 6 ÉDITIONS !
                    </h1>
                </div>
                
            </div>
            
            
        </div>

        <div class="fond-2" id="carte">

           
            <h2>les positions de nos bateaux sur notre carte</h2>
             
            
            <div id="map" class="map">
                
            </div>

        </div>

        <div class="fond-3" id="reservation">
            <div id="Réservations" class="réservation"></div>
        </div>

        <div class="fond-4" id= "presentation">

            <section class="articles">
            <article>
                <div class="article-wrapper">
                    <figure>
                        <img src="https://picsum.photos/id/1011/800/450" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>This is some title</h2>
                        <p>
                        Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
                        </p>
                        <a href="#" class="read-more">
                        Read more <span class="sr-only">about this is some title</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        </a>
                    </div>
                </div>
            </article>
            <article>

                <div class="article-wrapper">
                    <figure>
                        <img src="https://picsum.photos/id/1005/800/450" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>This is some title</h2>
                        <p>
                        Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
                        </p>
                        <a href="#" class="read-more">
                        Read more <span class="sr-only">about this is some title</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        </a>
                    </div>
                </div>
            </article>
            <article>

                <div class="article-wrapper">
                    <figure>
                        <img src="https://picsum.photos/id/103/800/450" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>This is some title</h2>
                        <p>
                        Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
                        </p>
                        <a href="#" class="read-more">
                        Read more <span class="sr-only">about this is some title</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        </a>
                    </div>
                </div>
            </article>
            </section>
            
            <footer>
                <p>Copyright @2023 | Designed With by Marina ASHRAF MORIS</p>
            </footer>

        </div>

        <?php 
            
            $servername ="localhost";
            $username = "armada";
            $password = "btssnir";
            $dbname = "armadaproj";    
        
            // Connexion à la base de données
            $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // Requete de trie de donnée 
            $sql = "SELECT * FROM `bateau` where `id` in (select max(`id`) from `bateau` group by `name`)";
            $requete = $bdd->query($sql);
            $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <script>
        
            var map = L.map('map').setView([50.06, 1.49], 13); // zonne d'affiche de maps
            let marker;
            <?php foreach ($donnees as $row ): ?>
                    marker = L.marker(['<?= $row["lat"] ?>','<?= $row["lon"] ?>']); // mettre un marker sur la position du bateau
                    marker.addTo(map);
                    marker.bindPopup('<?= $row['name'] ?>').openPopup(); // afficher le nom du bateau
            <?php endforeach; ?>
            
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        </script>
      
    </body>
</html>