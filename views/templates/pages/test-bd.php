<?php
// Vérifiez si la constante DOSSIER_BASE_INCLUDE n'est pas déjà définie
if (!defined("DOSSIER_BASE_INCLUDE")) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

// Incluez les fichiers nécessaires
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/billet.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/BilletDAO.class.php");


try {
    // Récupérez tous les billets
    $liste_billets = BilletDAO::chercherTous();
echo "nimporte quoi";
    // Affichez les billets
    foreach ($liste_billets as $billet) {
        echo "<p>ID: " . $billet->getIdBillet() . "</p>";
        echo "<p>Motif: " . $billet->getMotif() . "</p>";
        echo "<p>Texte: " . $billet->getTexte() . "</p>";
        echo "<p>Date: " . $billet->getDateBillet() . "</p>";
        echo "<p>Email: " . $billet->getEmail() . "</p>";
        echo "<hr>";
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
?>
