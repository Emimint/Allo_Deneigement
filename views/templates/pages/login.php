<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php");
?>
<div class="login vh-100 vw-100 fw-bold m-auto d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL_VIEWS; ?>static/image/snow-plow.jpg'); background-size: cover; background-position: center;">
    <div class="form-signin col-sm-6 m-auto">
        <form novalidate class="needs-validation" action="?action=seConnecter" method="post">
            <br>
            <h1 class="mb-3 deep-shadow text-center">CONNEXION</h1>
            <div class="form-floating text-uppercase">
                <input type="email" name="email" class="form-control border border-3 border-light rounded-0 mb-2" id="floatingInput" placeholder="name@example.com" required>
                <div class="invalid-feedback">
                    Saississez une adresse courriel valide.
                </div>
            </div>
            <div class="form-floating text-uppercase">
                <input type="password" name="password" class="form-control border border-3 border-light rounded-0" id="floatingPassword" placeholder="mot de passe" required>
                <div class="invalid-feedback">
                    Saississez un mot de passe.
                </div>
            </div>
            <div class="form-check text-start my-3 text-uppercase">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-label" for="flexCheckDefault">
                    Se souvenir de moi
                </label>
            </div>
            <button id="login-btn" class="btn w-100 py-2 btn-light btn-lg" type="submit">Connexion</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2024</p>
        </form>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/css-validation.js"></script>
</body>

</html>
<?php
if ($controleur) echo get_class($controleur); ?>