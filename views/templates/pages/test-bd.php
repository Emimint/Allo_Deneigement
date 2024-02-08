		<?php
        // si la constante n'existe pas, on la crée
        if (defined("DOSSIER_BASE_INCLUDE") == false) {
            define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
        }
        // Importe l'interface DAO et la classe Produit
        include_once(DOSSIER_BASE_INCLUDE . "models/utilisateur.class.php");
        include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/UtilisateurDAO.class.php');
        ?>

		<h2>Méthode chercherTous</h2>
		<?php
        echo "<h3>On cherche tous les utilisateurs :</h3>";
        $liste_utilisateurs = UtilisateurDAO::chercherTous();
        foreach ($liste_utilisateurs as $utilisateur) {
            echo "<p>" . $utilisateur->getNom() . " @" . $utilisateur->getEmail() . "</p>";
        }
        ?>