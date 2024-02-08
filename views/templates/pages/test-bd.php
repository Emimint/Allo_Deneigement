		<?php
        // si la constante n'existe pas, on la crée
        if (defined("DOSSIER_BASE_INCLUDE") == false) {
            define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
        }
        // Importe l'interface DAO et la classe Produit
        include_once(DOSSIER_BASE_INCLUDE . "models/adresse.class.php");
        include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/AdresseDAO.class.php');
        include_once(DOSSIER_BASE_INCLUDE . "models/utilisateur.class.php");
        include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/UtilisateurDAO.class.php');
        ?>

		<h2>Méthode chercherTous</h2>
		<?php
        $utilisateur1 = UtilisateurDAO::chercher(1);
        echo "<h3>On cherche tous les adresses pour {$utilisateur1->getNom()} ";
        $filtre = " WHERE id_utilisateur={$utilisateur1->getIdUtilisateur()}";
        echo " :</h3>";
        $liste_adresses = AdresseDAO::chercherAvecFiltre($filtre);
        foreach ($liste_adresses as $adresse) {
            echo "<p>" . $adresse->getCodePostal() . " -  rue " . $adresse->getNomRue() . "</p>";
        }
        ?>