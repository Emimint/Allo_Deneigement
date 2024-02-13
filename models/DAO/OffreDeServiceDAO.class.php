<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/offre_de_service.class.php");

class OffreDeServiceDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $uneOffre = null;

        $requete = $connexion->prepare("SELECT * FROM Offre_de_service WHERE id_service=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $uneOffre = new OffreDeService(
                $enr['id_service'],
                $enr['id_fournisseur'],
                $enr['prix_unitaire'],
                $enr['description'],
                $enr['type_clientele'],
                $enr['categorie']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $uneOffre;
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

        $requete = $connexion->prepare("SELECT * FROM Offre_de_service " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $uneOffre = new OffreDeService(
                $enr['id_service'],
                $enr['id_fournisseur'],
                $enr['prix_unitaire'],
                $enr['description'],
                $enr['type_clientele'],
                $enr['categorie']
            );
            array_push($tableau, $uneOffre);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($uneOffre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Offre_de_service (id_fournisseur, prix_unitaire, description, type_clientele, categorie) VALUES (?, ?, ?, ?, ?)");

        $tableauInfos = [
            $uneOffre->getIdFournisseur(),
            $uneOffre->getPrixUnitaire(),
            $uneOffre->getDescription(),
            $uneOffre->getTypeClientele(),
            $uneOffre->getCategorie()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($uneOffre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Offre_de_service SET id_fournisseur=?, prix_unitaire=?, description=?, type_clientele=?, categorie=? WHERE id_service=?");

        $tableauInfos = [
            $uneOffre->getIdFournisseur(),
            $uneOffre->getPrixUnitaire(),
            $uneOffre->getDescription(),
            $uneOffre->getTypeClientele(),
            $uneOffre->getCategorie(),
            $uneOffre->getIdService()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($uneOffre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Offre_de_service WHERE id_service=?");

        $tableauInfos = [$uneOffre->getIdService()];
        return $requete->execute($tableauInfos);
    }
}
