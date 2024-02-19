<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/modal-adresse.php"); ?>
<div id="soumission-container" class="container mt-5 mx-2">
  <div class="d-flex flex-column align-items-center justify-content-between">
    <div class=" progress px-1 my-3" style="height: 3px;">
      <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="step-container d-flex justify-content-around">
      <div class="d-flex flex-column align-items-center  justify-content-between">
        <div class="step-circle" onclick="displayStep(1)">1</div>
        <h5>Choix du service</h5>
      </div>
      <div class="d-flex flex-column align-items-center  justify-content-between">
        <div class="step-circle" onclick="displayStep(2)">2</div>

        <h5>Valider adresse</h5>
      </div>
      <div class="d-flex flex-column align-items-center  justify-content-between">
        <div class="step-circle" onclick="displayStep(3)">3</div>

        <h5>Infos complémentaires</h5>
      </div>
      <div class="d-flex flex-column align-items-center  justify-content-between">
        <div class="step-circle" onclick="displayStep(4)">4</div>

        <h5>Récapitulatif</h5>
      </div>
    </div>
  </div>

  <form id="multi-step-form" class="needs-validation" novalidate>
    <div class="step step-1 m-2">
      <h3>Services offerts par <?php echo $controleur->getFournisseur()->getNomDeLaCompagnie(); ?></h3>
      <div class="mb-3">
        <label for="field1" class="form-label">Votre choix de service:</label>
        <?php if (count($controleur->getListeServices()) > 0) { ?>
          <select class="form-control" id="field-1" name="field-1" required disabled>
            <option><?php echo $controleur->getOffreChoisie()->getDescription(); ?></option>
            <?php foreach ($controleur->getListeServices() as
              $index => $service) {
              if ($service->getIdOffre() != $controleur->getOffreChoisie()->getIdOffre()) { ?>
                <option><?php echo $service->getDescription(); ?></option>
              <?php } ?>
            <?php } ?>
          <?php } ?>
          </select>
      </div>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-2 m-2">
      <h3>Adresse de livraison</h3>
      <div class="mb-3">
        <label for="field2" class="form-label">Choisissez l'adresse ou le service doit etre donné:</label>
        <select id="field2" class="form-control" name="field2" required>
          <?php
          if ($controleur->getListeAdresses() != null) {
            foreach ($controleur->getListeAdresses() as
              $index => $adresse) { ?>
              <option><?php echo $adresse->getNumeroCivique() . " " . $adresse->getNomRue() . ", " . $adresse->getCodePostal() . " " . $adresse->getProvince(); ?></option>
          <?php }
          } ?>
          <option>...</option>
          <form action="?action=faireDemandeSoumission" method="POST">
            <option>Saississez une adresse...</option>
          </form>
        </select>
      </div>
      <button type="button" class="btn prev-step">Précédent</button>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-3 m-2">
      <h3>Infos sur le service</h3>
      <div class="mb-3">
        <label for="field3" class="form-label">Sélectionnez la durée du service </label>
        <select id="field3" class="form-control" name="field3" required>
          <option> Une demie-journée: <?php echo $controleur->getOffreChoisie()->getPrixUnitaire() / 2; ?>$</option>
          <option>Une journée: <?php echo $controleur->getOffreChoisie()->getPrixUnitaire(); ?>$</option>
          <option>Deux journées: <?php echo $controleur->getOffreChoisie()->getPrixUnitaire() * 2; ?>$</option>
          <option>Forfait 10 journées: <?php echo $controleur->getOffreChoisie()->getPrixUnitaire() * 5; ?>$</option>
          <option>Forfait 6 mois: <?php echo $controleur->getOffreChoisie()->getPrixUnitaire() * 10; ?>$</option>
        </select>
      </div>
      <button type="button" class="btn prev-step">Précédent</button>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-4 m-2">
      <div class="mb-3 recapitulatif">
        <label class="h2" for="field4" class="form-label">Récapitulatif de votre commande</label>
        <!-- <input type="text" class="form-control" id="field4" name="field4"> -->
        <div class="container mt-3">
          <h2>Votre service</h2>
          <ul class="list-group">
            <li class="list-group-item"><?php echo $controleur->getOffreChoisie()->getDescription(); ?></li>
          </ul>
          <h2>Adresse de livraison</h2>
          <ul class="list-group">
            <li class="list-group-item">[Adresse]</li>
            <li class="list-group-item">[Adresse 2]</li>
            <li class="list-group-item">[Adresse 3]</li>
          </ul>
          <h2>Facturation</h2>
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Service</th>
                  <th scope="col">[Litrage/Tonnage/ect...]</th>
                  <th scope="col">Prix unitaire</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">[Nom service]</th>
                  <td>[moins dune tonne]</td>
                  <td>100$</td>
                  <td>100$</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mb-3">
          <label for="commentaire-soumission" class="form-label">Ajoutez un commentaire (demande de details, informations importantes, ...):</label>
          <textarea class="form-control" id="commentaire-soumission" rows="3"></textarea>
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn m-2 prev-step">Précédent</button>
        <button type="submit" class="btn m-2">Soumettre</button>
      </div>
    </div>
  </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/trigger-modal.js"></script>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/submission.js"></script>
</body>

</html>