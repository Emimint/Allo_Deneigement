<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div id="container" class="container mt-5">
  <div class="progress px-1 m-3" style="height: 3px;">
    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <div class="step-container d-flex">
    <div class="d-flex flex-column align-items-center">
      <div class="step-circle" onclick="displayStep(1)">1</div>
      <h5 class="text-wrap">Choix du service</h5>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div class="step-circle" onclick="displayStep(2)">2</div>

      <h5>Valider adresse</h5>
    </div>
        <div class="d-flex flex-column align-items-center">
          <div class="step-circle" onclick="displayStep(3)">3</div>

      <h5>Infos complementaires</h5>
    </div>
        <div class="d-flex flex-column align-items-center">
          <div class="step-circle" onclick="displayStep(4)">4</div>

      <h5>Recapitulatif</h5>
    </div>
  </div>

  <form id="multi-step-form">
    <div class="step step-1">
      <!-- Step 1 form fields here -->
      <h3>Step 1</h3>
      <div class="mb-3">
        <label for="field1" class="form-label">Field 1:</label>
        <input type="text" class="form-control" id="field1" name="field1">
      </div>
      <button type="button" class="btn btn-primary next-step">Next</button>
    </div>

    <div class="step step-2">
      <!-- Step 2 form fields here -->
      <h3>Step 2</h3>
      <div class="mb-3">
        <label for="field2" class="form-label">Field 2:</label>
        <input type="text" class="form-control" id="field2" name="field2">
      </div>
      <button type="button" class="btn btn-primary prev-step">Previous</button>
      <button type="button" class="btn btn-primary next-step">Next</button>
    </div>

    <div class="step step-3">
      <!-- Step 3 form fields here -->
      <h3>Step 3</h3>
      <div class="mb-3">
        <label for="field3" class="form-label">Field 3:</label>
        <input type="text" class="form-control" id="field3" name="field3">
      </div>
      <button type="button" class="btn btn-primary prev-step">Previous</button>
      <button type="button" class="btn btn-primary next-step">Next</button>
    </div>

        <div class="step step-4">
      <!-- Step 4 form fields here -->
      <h3>Step 4</h3>
      <div class="mb-3">
        <label for="field4" class="form-label">Field 4:</label>
        <input type="text" class="form-control" id="field4" name="field4">
      </div>
      <button type="button" class="btn btn-primary prev-step">Previous</button>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL;?>/static/scripts/submission.js"></script> 
</body>
</html>