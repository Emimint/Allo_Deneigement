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
                    <li class="nav-link"><a href="?action=defaut" class="nav-link px-2 text-white">A propos</a></li>
                    <li class="nav-link">
                        <a id="demandesDeServices" href="?action=afficherDemandeDeServices" class="nav-link px-2 text-white" hidden>Mes demandes de service</a>
                    </li>
                    <li class="nav-link"><a href="<?php echo BASE_URL_VIEWS; ?>templates/pages/fournisseur.php" class="nav-link px-2 text-white">Liste de fournisseurs</a></li>
                    <li class="nav-link"><a id="dashboard-admin" href="?action=afficherDashboardAdmin" class="nav-link px-2 text-white" hidden>Dashboard Admin</a></li>
                   
                    <li class="nav-link"><a href="?action=defaut" class="nav-link px-2 text-white">Nous joindre</a></li>
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
                            require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/nav-link.php");
                        ?>
                       
                            <div class="btn btn-outline-light dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent;border-color: transparent;">
                                    Bienvenue, <?php
                                                if (($_SESSION['utilisateurConnecte']) == "administrateur" || ($_SESSION['utilisateurConnecte']) == "utilisateur") {
                                                    echo $_SESSION['infoUtilisateur']->getPrenom();
                                                } else {
                                                    echo $_SESSION['infoUtilisateur']->getPrenomContact();
                                                }
                                                ?>!
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" type="button" href="?action=afficherProfile">Votre profile</a></li>
                                    <li><a class="dropdown-item" type="button" href="?action=seDeconnecter">Deconnexion</a></li>
                                </ul>
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