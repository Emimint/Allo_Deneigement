<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div id="soumission-container" class="container mt-5 mx-2">

  <!-- Modal for adresse: -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Adresse de livraison</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3">
            <div class="col-md-8">
              <label for="inputAddress" class="form-label">Rue/avenue</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="rue Principale">
            </div>

            <div class="col-md-2">
              <label for="inputAddress2" class="form-label">Appartement</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, etage">
            </div>

            <div class="col-md-6">
              <label for="inputCity" class="form-label">Ville</label>
              <input type="text" class="form-control" id="inputCity">
            </div>

            <div class="col-md-4">
              <label for="inputState" class="form-label">State</label>
              <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>

            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">Remember me</label>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

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

        <h5>Infos complementaires</h5>
      </div>
      <div class="d-flex flex-column align-items-center  justify-content-between">
        <div class="step-circle" onclick="displayStep(4)">4</div>

        <h5>Recapitulatif</h5>
      </div>
    </div>
  </div>

  <form id="multi-step-form" class="needs-validation" novalidate>
    <div class="step step-1 m-2">
      <h3>Services offerts par [nom du fournisseur]</h3>
      <div class="mb-3">
        <label for="field1" class="form-label">Choisissez un type de service:</label>
        <select class="form-control" id="field1" name="field1" required>
          <option>Deneigement</option>
          <option>Ependage</option>
          <option>Transport de neige</option>
        </select>
      </div>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-2 m-2">
      <h3>Adresse de livraison</h3>
      <div class="mb-3">
        <label for="field2" class="form-label">Choisissez l'adresse ou le service doit etre donne:</label>
        <select id="field2" class="form-control" name="field2" required>
          <option>Domicile : [Adresse du client]</option>
          <option>Adresse secondaire : [Autre adresse au dossier]</option>
          <option>Saississez une adresse...</option>
        </select>
      </div>
      <button type="button" class="btn prev-step">Precedent</button>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-3 m-2">
      <h3>Step 3</h3>
      <div class="mb-3">
        <label for="field3" class="form-label">Field 3:</label>
        <input type="text" class="form-control" id="field3" name="field3">
      </div>
      <button type="button" class="btn prev-step">Precedent</button>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-4 m-2">
      <h3>Step 4</h3>
      <div class="mb-3">
        <label for="field4" class="form-label">Field 4:</label>
        <input type="text" class="form-control" id="field4" name="field4">
      </div>
      <button type="button" class="btn prev-step">Precedent</button>
      <button type="submit" class="btn">Soumettre</button>
    </div>
  </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL; ?>/static/scripts/trigger-modal.js"></script>
<script src="<?php echo BASE_URL; ?>/static/scripts/submission.js"></script>
</body>

</html>