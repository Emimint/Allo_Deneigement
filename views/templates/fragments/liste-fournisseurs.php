<div class="list-group list-group-flush border-bottom scrollarea">
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/flash.php");
    try {
        if (isset($_SESSION["liste_fournisseurs"])) {
            foreach ($_SESSION["liste_fournisseurs"] as $fournisseur) {
                $liste_adresses = PersonneDAO::chercherAdresses('fournisseur', $fournisseur->getEmail());
                if ($liste_adresses != null) {
                    $numeroCivique = $liste_adresses[0]->getNumeroCivique();
                    $codePostal = $liste_adresses[0]->getCodePostal();
                    $nomRue = $liste_adresses[0]->getNomRue();
                    $ville = $liste_adresses[0]->getVille();
                    $province = $liste_adresses[0]->getProvince(); ?>
                    <div class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true" onclick="toggleActive(this)">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">
                                <i class="fa-solid fa-map-pin" style="color:white"></i>
                                <?php echo $fournisseur->getNomDeLaCompagnie(); ?>
                            </strong>
                            <small class="text-body-secondary">
                                <i class="fa fa-star-half-o" aria-hidden="true" style="color:yellow;"></i>
                                <?php echo $fournisseur->getNoteGlobale(); ?>/5
                            </small>
                        </div>
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <div class="col-10 mb-1 small"><?php
                                                            echo $numeroCivique . ' ' . $nomRue . ', ' . $ville . ', ' . $province . ' ' . $codePostal; ?></div>
                            <a href="?action=faireDemandeSoumission&id_fournisseur=<?php echo $fournisseur->getIdFournisseur(); ?>" class="btn btn-light">Contacter</a>
                        </div>
                    </div>
                <?php
                } else { ?>
                    <div class="d-flex align-items-center justify-content-between p-2">
                        <p class="m-0">Pas d'adresse pour <?php echo $fournisseur->getNomDeLaCompagnie(); ?>.</p>
                        <a href="?action=faireDemandeSoumission" class="btn btn-light">Contacter</a>
                    </div>
                <?php
                }
                ?>
        <?php }
        }
    } catch (Exception $e) { ?>
        <div> Aucun fournisseur...</div>
    <?php format_flash_message(["Erreur", "Impossible d'afficher les fournisseurs.", FLASH_ERROR]);
    }  ?>
</div>
<script>
    function toggleActive(element) {
        var allElements = document.querySelectorAll('.list-group-item');
        allElements.forEach(function(el) {
            el.classList.remove('active');
        });
        element.classList.add('active');
    }

    $(document).ready(function() {

        const infoLocation = document.getElementById("info-location");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    centerMapOnLocation([position.coords.longitude, position.coords.latitude]);
                });
            } else {
                infoLocation.innerHTML = "Pas de géolocation dans ce navigateur.";
            }
        }

        var map = L.map('map').setView([0, 0], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var markers = [];

        function addMarker(lng, lat, name) {
            var marker = L.marker([lng, lat]).addTo(map);
            marker.bindPopup(name);
            markers.push(marker);
        }

        function centerMapOnLocation(location) {
            var latitude = location[0];
            var longitude = location[1];

            map.setView([latitude, longitude], 12);

            var positionClient = L.marker([longitude, latitude])
                .addTo(map)
                .bindPopup("Votre position")
                .openPopup();
        }

        <?php
        foreach ($_SESSION["liste_fournisseurs"] as $fournisseur) {
            $liste_adresses = PersonneDAO::chercherAdresses('fournisseur', $fournisseur->getEmail());
            if ($liste_adresses != null) {
                $latitude = $liste_adresses[0]->getLatitude();
                $longitude = $liste_adresses[0]->getLongitude();
                $nomDeLaCompagnie = $fournisseur->getNomDeLaCompagnie();
                echo "addMarker($longitude, $latitude, '$nomDeLaCompagnie');";
            }
        }
        ?>

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            if (e.target.hash === '#carte') {
                map.invalidateSize();
            }
        });
        getLocation();
    });
</script>