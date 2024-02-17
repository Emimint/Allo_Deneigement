<?php
// Vérifiez si la constante DOSSIER_BASE_INCLUDE n'est pas déjà définie
if (!defined("DOSSIER_BASE_INCLUDE")) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

// Incluez les fichiers nécessaires
include_once(DOSSIER_BASE_INCLUDE . "models/adresse.class.php");
include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/AdresseDAO.class.php');
include_once(DOSSIER_BASE_INCLUDE . "models/personne.class.php");
include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/PersonneDAO.class.php');


try {
    $requete = "doe"; // adresse courriel entiere ou partielle
    $utilisateur1 = PersonneDAO::chercherEmail($requete) ?? null;
    echo
    $utilisateur1 ? "<h3>On cherche tous les adresses pour " . get_class($utilisateur1) . ", " . $utilisateur1->getUsername() . " :</h3>" : "<p><h3>Aucun utilisateur trouvé</h3></p>";
    $liste_adresses = PersonneDAO::chercherAdresses(
        get_class($utilisateur1),
        $utilisateur1->getId()
    );
    foreach ($liste_adresses as $adresse) {
        echo "<p>" . $adresse->getCodePostal() . " -  rue " . $adresse->getNomRue() . "</p>";
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
