<?php

if (!defined("DOSSIER_BASE_INCLUDE")) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/billet.class.php");

class BilletDAO implements DAO {
    public static function chercher($id_billet) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $billet = null;

        $requete = $connexion->prepare("SELECT * FROM Billet WHERE id_billet=?");
        $requete->execute(array($id_billet));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $billet = new Billet(
                $enr['id_billet'],
                $enr['motif'],
                $enr['texte'],
                $enr['date_billet'],
                $enr['email']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $billet;
    }

    public static function chercherTous() {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $billets = [];

        $requete = $connexion->prepare("SELECT * FROM Billet");
        $requete->execute();

        foreach ($requete as $enr) {
            $billet = new Billet(
                $enr['id_billet'],
                $enr['motif'],
                $enr['texte'],
                $enr['date_billet'],
                $enr['email']
            );
            array_push($billets, $billet);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $billets;
    }

    public static function chercherAvecFiltre($filtre) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $billets = [];

        $requete = $connexion->prepare("SELECT * FROM Billet " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $billet = new Billet(
                $enr['id_billet'],
                $enr['motif'],
                $enr['texte'],
                $enr['date_billet'],
                $enr['email']
            );
            array_push($billets, $billet);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $billets;
    }

    public static function inserer($billet) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Billet (motif, texte, date_billet, email) VALUES (?, ?, ?, ?)");

        $tableauInfos = [
            $billet->getMotif(),
            $billet->getTexte(),
            $billet->getDateBillet(),
            $billet->getEmail()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($billet) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Billet SET motif=?, texte=?, date_billet=?, email=? WHERE id_billet=?");

        $tableauInfos = [
            $billet->getMotif(),
            $billet->getTexte(),
            $billet->getDateBillet(),
            $billet->getEmail(),
            $billet->getIdBillet()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($id_billet) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Billet WHERE id_billet=?");

        $tableauInfos = [$id_billet];
        return $requete->execute($tableauInfos);
    }
}

?>
