<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/administrateur.class.php");

class AdministrateurDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $unAdministrateur = null;

        $requete = $connexion->prepare("SELECT * FROM Administrateur WHERE id_administrateur=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unAdministrateur = new Administrateur(
                $enr['id_administrateur'],
                $enr['nom'],
                $enr['prenom'],
                $enr['telephone'],
                $enr['email'],
                $enr['username'],
                $enr['password'],
                $enr['url_photo']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $unAdministrateur;
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

        $requete = $connexion->prepare("SELECT * FROM Administrateur " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $unAdministrateur = new Administrateur(
                $enr['id_administrateur'],
                $enr['nom'],
                $enr['prenom'],
                $enr['telephone'],
                $enr['email'],
                $enr['username'],
                $enr['password'],
                $enr['url_photo']
            );
            array_push($tableau, $unAdministrateur);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }


    public static function inserer($unAdministrateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Administrateur (nom, prenom, telephone, email, username, password, url_photo) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $unAdministrateur->getNom(),
            $unAdministrateur->getPrenom(),
            $unAdministrateur->getTelephone(),
            $unAdministrateur->getEmail(),
            $unAdministrateur->getUsername(),
            $unAdministrateur->getPassword(),
            $unAdministrateur->getUrlPhoto()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function modifier($unAdministrateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Administrateur SET nom=?, prenom=?, telephone=?, email=?, username=?, password=?, url_photo=? WHERE id_administrateur=?");

        $tableauInfos = [
            $unAdministrateur->getNom(),
            $unAdministrateur->getPrenom(),
            $unAdministrateur->getTelephone(),
            $unAdministrateur->getEmail(),
            $unAdministrateur->getUsername(),
            $unAdministrateur->getPassword(),
            $unAdministrateur->getUrlPhoto(),
            $unAdministrateur->getIdAdministrateur()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function supprimer($unAdministrateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Administrateur WHERE id_administrateur=?");

        $tableauInfos = [$unAdministrateur->getIdAdministrateur()];
        return $requete->execute($tableauInfos);
    }
}
