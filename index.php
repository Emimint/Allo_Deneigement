<?php
$chemin = (substr($_SERVER['DOCUMENT_ROOT'], -1) == "/") ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'] . "/";

define("DOSSIER_BASE_INCLUDE", $chemin . "Allo_Deneigement/");
define('DOSSIER_PAGES', $chemin . 'Allo_Deneigement/views/templates/pages/');
define('DOSSIER_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');

include_once DOSSIER_BASE_INCLUDE . "controllers/manufactureControleur.class.php";

if (!isset($_GET['action'])) {
        $action = "";
} else {
        $action = $_GET['action'];
}
$controleur = ManufactureControleur::creerControleur($action);

$nomVue = $controleur->executerAction();

include_once(DOSSIER_PAGES . $nomVue . ".php");
