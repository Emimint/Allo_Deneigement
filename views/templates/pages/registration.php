<?php
if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<style>

</style>

<div class="container-fluid w-100" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL; ?>/static/image/snow-plow.jpg'); background-size: cover; background-position: center; width: 70%;">
  <div class="row m-auto" style="width: 70%">
    <div class="col-lg-6 bg-white text-dark m-auto mt-5 mb-5">
      <div class="form-card" style=" padding: 50px">
        <h2 class="text-center p-3 mb-3">Créer un compte</h2>
        <!--form start-->

        <form id="myForm" action="#" class="needs-validation" novalidate>

          <div id="admin-input" class="input-group mb-3 mt-5">
            <span class="input-group-text"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" placeholder="nom de la compagnie" id="companyName" required>
            <div class="invalid-feedback" id="companyNameError"></div>
          </div>

          <div class="input-group mb-3 ">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Prenom" id="firstName" required>
            <div class="invalid-feedback" id="firstNameError"></div>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Nom" id="lastName" required>
            <div class="invalid-feedback" id="lastNameError"></div>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Courriel" id="email" required>
            <div class="invalid-feedback" id="emailError"></div>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Mot de passe" id="password" required>
            <div class="invalid-feedback" id="passwordError"></div>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Confirmer mot de passe" id="confirmPassword" required>
            <div class="invalid-feedback" id="confirmPasswordError"></div>
          </div>

          <div class="d-flex flex-column justify-content-center pt-6">
            <label>
              <input type="checkbox" id="agreeCheckbox" required> Agree to terms and conditions
            </label>
            <button type="submit" class="btn btn-success mb-3">Submit</button>
            <p class="text-muted">Already have an account? <a href="#">Log in</a></p>
            <a id="link-role" href="#">Are you a supplier?</a>
          </div>
        </form>
      </div>

      <!--form ends-->
    </div>
  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL; ?>/static/scripts/registration-form-user-update.js"></script>
<script src="<?php echo BASE_URL; ?>/static/scripts/registrations-validation.js"></script>



</body>

</html>