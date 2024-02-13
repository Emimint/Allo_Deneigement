<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/demande_de_service.class.php");

class DemandeDeServiceDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $uneDemande = null;

        $requete = $connexion->prepare("SELECT * FROM Demande_de_service WHERE id_demande=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $uneDemande = new DemandeDeService(
                $enr['id_demande'],
                $enr['date_debut'],
                $enr['date_fin'],
                $enr['status'],
                $enr['commentaire'],
                $enr['id_utilisateur'],
                $enr['id_fournisseur'],
                $enr['id_review'],
                $enr['id_offre'],
                $enr['id_adresse']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $uneDemande;
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

        $requete = $connexion->prepare("SELECT * FROM Demande_de_service " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $uneDemande = new DemandeDeService(
                $enr['id_demande'],
                $enr['date_debut'],
                $enr['date_fin'],
                $enr['status'],
                $enr['commentaire'],
                $enr['id_utilisateur'],
                $enr['id_fournisseur'],
                $enr['id_review'],
                $enr['id_offre'],
                $enr['id_adresse']
            );
            array_push($tableau, $uneDemande);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }


    public static function inserer($uneDemande)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Demande_de_service (date_debut, date_fin, status, commentaire, id_utilisateur, id_fournisseur, id_review, id_offre, id_adresse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $uneDemande->getDateDebut(),
            $uneDemande->getDateFin(),
            $uneDemande->getStatus(),
            $uneDemande->getCommentaire(),
            $uneDemande->getIdUtilisateur(),
            $uneDemande->getIdFournisseur(),
            $uneDemande->getIdReview(),
            $uneDemande->getIdOffre(),
            $uneDemande->getIdAdresse()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function modifier($uneDemande)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Demande_de_service SET date_debut=?, date_fin=?, status=?, commentaire=?, id_utilisateur=?, id_fournisseur=?, id_review=?, id_offre=?, id_adresse=? WHERE id_demande=?");

        $tableauInfos = [
            $uneDemande->getDateDebut(),
            $uneDemande->getDateFin(),
            $uneDemande->getStatus(),
            $uneDemande->getCommentaire(),
            $uneDemande->getIdUtilisateur(),
            $uneDemande->getIdFournisseur(),
            $uneDemande->getIdReview(),
            $uneDemande->getIdOffre(),
            $uneDemande->getIdAdresse(),
            $uneDemande->getIdDemande()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function supprimer($uneDemande)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Demande_de_service WHERE id_demande=?");

        $tableauInfos = [$uneDemande->getIdDemande()];
        return $requete->execute($tableauInfos);
    }
}
