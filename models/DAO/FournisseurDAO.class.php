<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/Fournisseur.class.php");

class FournisseurDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $unFournisseur = null;

        $requete = $connexion->prepare("SELECT * FROM Fournisseur WHERE id_fournisseur=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unFournisseur = new Fournisseur(
                $enr['id'],
        $enr['nom'],
        $enr['prenom'],
        $enr['adresse'], // Adjusted to use the 'adresse' column
        $enr['telephone'],
        $enr['username'],
        $enr['password'],
        $enr['photo_url'],
        $enr['nom_de_la_compagnie'],
        $enr['note_globale']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $unFournisseur;
    }

    public static function chercherTous()
    {
        return self::chercherAvecFiltre("");
    }

    public static function chercherAvecFiltre($filtre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $tableau = [];

        $requete = $connexion->prepare("SELECT * FROM Fournisseur " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $unFournisseur = new Fournisseur(
                $enr['id'],
                $enr['nom'],
                $enr['prenom'],
                $enr['adresse'], // Adjusted to use the 'adresse' column
                $enr['telephone'],
                $enr['username'],
                $enr['password'],
                $enr['photo_url'],
                $enr['nom_de_la_compagnie'],
                $enr['note_globale']
            );
            array_push($tableau, $unFournisseur);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($unFournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Fournisseur (nom, prenom, nom_de_la_compagnie, note_globale) VALUES (?, ?, ?, ?)");

        $tableauInfos = [
            $unFournisseur->getNom(),
            $unFournisseur->getPrenom(),
            $unFournisseur->getNomDeLaCompagnie(),
            $unFournisseur->getNoteGlobale()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($unFournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Fournisseur SET nom=?, prenom=?, nom_de_la_compagnie=?, note_globale=? WHERE id_fournisseur=?");

        $tableauInfos = [
            $unFournisseur->getNom(),
            $unFournisseur->getPrenom(),
            $unFournisseur->getNomDeLaCompagnie(),
            $unFournisseur->getNoteGlobale(),
            $unFournisseur->getIdFournisseur()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($unFournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Fournisseur WHERE id_fournisseur=?");

        $tableauInfos = [$unFournisseur->getIdFournisseur()];
        return $requete->execute($tableauInfos);
    }
}
