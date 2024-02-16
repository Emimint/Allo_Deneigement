<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div id="soumission-container" class="container mt-5 mx-2">

  <!-- Modal for adresse: -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered p-2">
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

            <div class="col-md-4">
              <label for="inputAddress2" class="form-label">Appartement</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, etage">
            </div>

            <div class="d-flex align-items-end">
              <div class="col-sm-6 mx-1">
                <label for="ville">Ville</label>
                <input class="form-control" name="ville" placeholder="Montreal" />
                <nordpass-icon data-np-uid="cb62c672-0256-4aa3-be50-a7bc133f49bd"></nordpass-icon>
              </div>
              <div class="col-sm-3 mx-1">
                <label for="PostalCode">Code Postal</label>
                <input class="form-control" name="PostalCode" placeholder="A1B 2C3" />
              </div>
              <div class="col-sm-3 mx-1">
                <label for="Province">Province</label>
                <select class="form-control">
                  <option>Quebec</option>
                  <option>Ontario</option>
                  <option>...</option>
                </select>
              </div>
            </div>


            <div class="col-12 mt-5">
              <button type="submit" class="btn btn-primary">Soumettre</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
          </form>
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
      <h3>Infos sur le service</h3>
      <div class="mb-3">
        <label for="field3" class="form-label">Veuillez donner des precisions sur le service: [Nombre approximatif de tonne de neige a deplacer] </label>
        <select id="field3" class="form-control" name="field3" required>
          <option> Moins de 500kg</option>
          <option>De 500kg a 1 tonne </option>
          <option>Plus d'une tonne</option>
        </select>
      </div>
      <button type="button" class="btn prev-step">Precedent</button>
      <button type="button" class="btn next-step">Suivant</button>
    </div>

    <div class="step step-4 m-2">
      <div class="mb-3 recapitulatif">
        <label class="h2" for="field4" class="form-label">Recapitulatif de votre commande</label>
        <!-- <input type="text" class="form-control" id="field4" name="field4"> -->
        <div class="container mt-3">
          <h2>Votre service</h2>
          <ul class="list-group">
            <li class="list-group-item">[Nom du service]</li>
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
        <button type="button" class="btn m-2 prev-step">Precedent</button>
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