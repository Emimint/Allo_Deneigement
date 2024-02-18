<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
if (!isset($controleur)) header("Location: " . DOSSIER_BASE_INCLUDE);
?>
<div>
    <header class="p-3 text-white vw-100" style="background-color: #b50303">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?php echo DOSSIER_BASE_INCLUDE; ?>" class="d-flex align-items-center mb-3 mb-lg-0 text-white text-decoration-none me-lg-auto">
                    <div class="d-flex align-items-center bd-highlight">
                        <img class="mb-4 mt-3 img-fluid img-logo" src="<?php echo BASE_URL_VIEWS; ?>static/image/flocon-black.svg" style="height: 80px; width: 80px;" alt="LOGO">
                        <h4>ALLO<br> DÉNEIGEMENT</h4>
                    </div>
                </a>
                <ul class="d-flex align-items-center nav col-12 col-lg-auto mb-2 mb-md-0">
                    <li class="nav-link"><a href="<?php echo DOSSIER_BASE_INCLUDE; ?>" class="nav-link px-2 text-white">A propos</a></li>
                    <li class="nav-link">
                        <a href="?action=afficherDemandeDeServices" class="nav-link px-2 text-white">Mes demandes de service</a>
                    </li>
                    <li class="nav-link"><a href="<?php echo BASE_URL_VIEWS; ?>templates/pages/fournisseur.php" class="nav-link px-2 text-white">Liste de fournisseurs</a></li>
                    <li class="nav-link"><a href="<?php echo BASE_URL_VIEWS; ?>templates/pages/contactPage.php" class="nav-link px-2 text-white">Nous joindre</a></li>
                    <li class="nav-link"><a href="#" class="nav-link px-2"><i class="fa-regular fa-bell" style="color: #ffffff;"></i></a></li>
                    <li class="nav-link dropdown">
                        <a href="#" class="nav-link px-2 dropdown-toggle" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="?lang=en">English</a></li>
                            <li><a class="dropdown-item" href="?lang=fr">Français</a></li>
                        </ul>
                    </li>
                    <li>
                        <?php
                        // Check if the user is logged in
                        if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] != "visiteur") {
                        ?>
                            <div class="d-flex">
                                <a href="#" class="nav-link px-2" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span style="color:white">Hello username!</span>
                                </a>
                                <a class="nav-link px-2" href="?action=seDeconnecter"><span style="color:white">Logout</span></a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="?action=seConnecter"><button type="button" class="btn btn-outline-light">Connexion</button></a>
                        <?php   }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <?php if (isset($_SESSION['FLASH_MESSAGES'])) {
        foreach ($_SESSION['FLASH_MESSAGES'] as $key => $value) {
            echo format_flash_message($value);
        }
        $_SESSION['FLASH_MESSAGES'] = null;
    } ?>
</div>