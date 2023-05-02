<?php
 include('connexionbdd.php');
 ?>
 
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
        <script src="https://kit.fontawesome.com/c6b2aeabb6.js" crossorigin="anonymous"></script>


    </head>
    <body >
       
        <header>
            <header >
                <img class="logo" src="img/logo.png">
            </header>
        </header>  

        <div class="fond-1" id="accueil">
            <nav id="bar" class="navbar">
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

            <section>
                <div class="containermap">
                    <div class="colonne"><h2 class="text">Vous pouvez suivre nos bateaux</h2></div>
                    <div id="map" class="map"> </div>
                    <div class="colonne">
                        <div>
                            <span id="rangeValue">0</span>
                            <Input class="range" type="range" name "" value="0" min="0" max="1000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
                        </div>
                        <script type="text/javascript">
                            function rangeSlide(value) {document.getElementById('rangeValue').innerHTML = value;}
                        </script>
                    </div>
                </div>
            </section>
            
            
        </div>
        
        <div class="fond-3" id="reservation">
            <div id="Réservations" class="réservation"></div>
        </div>

        <div class="fond-4" id= "presentation">

            <div class="titleContainer">
                <h2 class="text">Voici une petite présentation de notre équipe</h2>
            </div>
            
            <div class="cardContainer">
            <section>
                <div class="container">
                    <div class="content">
                        <div class="cadre">
                            <div class="cadre-content">
                                <div class="image">
                                    <img src="img/marina.jpg" alt="">
                                </div>
                                <div class="media-icons">
                                    <a href="https://www.instagram.com/marinouille_76/"><i class="fa-brands fa-instagram" style="color: #042883; z-index: 2000;" > </i></a>
                                    <a href="https://github.com/Marina-ASH"><i class="fa-brands fa-github" style="color: #042883; z-index: 2000;"></i></a>
                                    <a href="https://www.linkedin.com/in/marina-ashraf-moris-b1a1b1217/"><i class="fa-brands fa-linkedin" style="color: #042883; z-index: 2000;"></i></a>
                                </div>

                                <div class="name-profession">
                                    <span class="name">Marina ASHRAF</span>
                                    <span class="profession">Etudient en BTS SN</span>    
                                </div>

                                <p class="description"> Mon nom est Marina AHRAF MORIS, et je suis actuellement en deuxième année d'études en informatique. Mon rôle dans ce projet consiste à gérer la localisation des bateaux, ainsi que leur affichage sur notre site web, qui a été conçu par mes soins. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <section>
                <div class="container">
                    <div class="content">
                        <div class="cadre">
                            <div class="cadre-content">
                                <div class="image">
                                    <img src="img/djem.jpg" alt="">
                                </div>
                                <div class="media-icons">
                                    <a href="https://www.instagram.com/djem_brk/"><i class="fa-brands fa-instagram" style="color: #042883; z-index: 2000;" > </i></a>
                                    <a href="https://github.com/Djembrk"><i class="fa-brands fa-github" style="color: #042883; z-index: 2000;"></i></a>
                                    <a href="https://www.linkedin.com/in/djem-berkpinar/"><i class="fa-brands fa-linkedin" style="color: #042883; z-index: 2000;"></i></a>
                                </div>

                                <div class="name-profession">
                                    <span class="name">Djem Berkpinar</span>
                                    <span class="profession">Etudient en BTS SN</span>    
                                </div>

                                <p class="description"> Mon nom est Djem BERKPINAR, étudiant en 2 ème année de BTS informatique et réseaux . Mon rôle est de concevoir un système embarqué capable de detecter la présence de visiteurs entrant sur les bateaux . Je developpe aussi l'application mobile de l'équipage permettant la gestion de visiteurs au sein du bateaux </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="content">
                        <div class="cadre">
                            <div class="cadre-content">
                                <div class="image">
                                    <img src="img/matthias.jpg" alt="">
                                </div>
                                <div class="media-icons">
                                    <a href="https://www.instagram.com/matthias_bnd/"><i class="fa-brands fa-instagram" style="color: #042883; z-index: 2000;" > </i></a>
                                    <a href=""><i class="fa-brands fa-github" style="color: #042883; z-index: 2000;"></i></a>
                                    <a href="https://www.linkedin.com/in/matthias-bonnard-403449239/"><i class="fa-brands fa-linkedin" style="color: #042883; z-index: 2000;"></i></a>
                                </div>

                                <div class="name-profession">
                                    <span class="name">Matthias Bonnnard</span>
                                    <span class="profession">Etudient en BTS SN</span>    
                                </div>

                                <p class="description"> Je m'appelle Matthias BONNARD et je suis actuellement en 2eme année de BTS SN. Dans ce projet mon role est de créer et héberger le serveur web ainsi que la page de réservation </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
            
        </div>

        <footer >
            <div class="footerContainer">
                <div class="socialInons">
                    <a href="" > <i class="fa-brands fa-github" style="color: #0e2983;"></i> </a>
                    <a href="" > <i class="fa-brands fa-linkedin" style="color: #0e2983;"></i></i> </a>
                </div>
        
                <div class="footerBottom">
                     <p>Copyright &copy;2023; Designed by <span class="designer"> Marina ASHRAF MORIS</span> </p>
                </div>

            </div>
        </footer>

        <?php 
           
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
