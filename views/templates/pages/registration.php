<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div class="container" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL;?>/static/image/snow-plow.jpg'); background-size: cover; background-position: center;">
    <div class="row">
        <div class="col-lg-6 bg-white text-dark m-auto" >
           <div class="form-card" style=" padding: 50px">
               <h2 class="text-center p-3 mb-3">Créer un compte</h2>
               <!--form start-->

               <form action="#">

                  <div id="admin-input" class="input-group mb-3 mt-5">
                       <span class="input-group-text"><i class="fa fa-building"></i></span>
                       <input type="text" class="form-control" placeholder="nom de la compagnie">
                   </div>
                   <div class="input-group mb-3 ">
                       <span class="input-group-text"><i class="fa fa-user"></i></span>
                       <input type="text" class="form-control" placeholder="Prenom">
                   </div>
                   <div class="input-group mb-3">
                       <span class="input-group-text"><i class="fa fa-user"></i></span>
                       <input type="text" class="form-control" placeholder="Nom">
                   </div>
                   <div class="input-group mb-3">
                       <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                       <input type="email" class="form-control" placeholder="Courriel">
                   </div>
                   <div class="input-group mb-3">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                       <input type="password" class="form-control" placeholder="Mot de passe">
                   </div>
                   <div class="input-group mb-3">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                       <input type="password" class="form-control" placeholder="Confirmer mot de passe">
                   </div>
                   <div  class="d-flex flex-column justify-content-center pt-6">
                       <label class="text-center text-muted mt-3">
                           <input  type="checkbox" id="agreeCheckbox"> J'accepte les termes et conditions du service
                       </label>
                       <button type="button" class="btn btn-success mb-3">Soumettre</button><br>
                       <p class="text-center text-muted">Vous avez déjà un compte ? <a href="#">Connectez-vous</a></p>

                     <a id="link-role" class="text-center mb-4" href="#"> Vous êtes un fournisseur ?</a>

                   </div>
               </form>
           </div>

            <!--form ends-->
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL;?>/static/scripts/registration-form-user-update.js" ></script>
</body>
</html>