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
                    $province = $liste_adresses[0]->getProvince();
                } else {
                    $numeroCivique = "";
                    $codePostal = "";
                    $nomRue = "";
                    $ville = "";
                    $province = "";
                }
    ?>
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
                        <a href="href=?=action=ToBeDeterminated" class="btn btn-light">Contacter</a>
                    </div>
                </div>
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
</script>