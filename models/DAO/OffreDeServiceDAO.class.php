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

        $requete = $connexion->prepare("SELECT * FROM Offre_de_service WHERE id_offre=?");

        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $uneOffre = new OffreDeService(
                $enr['id_offre'],
                $enr['titre'],
                $enr['description'],
                $enr['prix'],
                $enr['id_utilisateur'],
                $enr['date_creation']
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
                $enr['id_offre'],
                $enr['titre'],
                $enr['description'],
                $enr['prix'],
                $enr['id_utilisateur'],
                $enr['date_creation']
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

        $requete = $connexion->prepare("INSERT INTO Offre_de_service (titre, description, prix, id_utilisateur, date_creation) VALUES (?, ?, ?, ?, ?)");

        $tableauInfos = [
            $uneOffre->getTitre(),
            $uneOffre->getDescription(),
            $uneOffre->getPrix(),
            $uneOffre->getIdUtilisateur(),
            $uneOffre->getDateCreation()
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

        $requete = $connexion->prepare("UPDATE Offre_de_service SET titre=?, description=?, prix=?, id_utilisateur=?, date_creation=? WHERE id_offre=?");

        $tableauInfos = [
            $uneOffre->getTitre(),
            $uneOffre->getDescription(),
            $uneOffre->getPrix(),
            $uneOffre->getIdUtilisateur(),
            $uneOffre->getDateCreation(),
            $uneOffre->getIdOffre()
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

        $requete = $connexion->prepare("DELETE FROM Offre_de_service WHERE id_offre=?");

        $tableauInfos = [$uneOffre->getIdOffre()];
        return $requete->execute($tableauInfos);
    }
}
