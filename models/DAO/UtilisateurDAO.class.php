<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/utilisateur.class.php");

class UtilisateurDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $unUtilisateur = null;

        $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE id_utilisateur=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unUtilisateur = new Utilisateur(
                $enr['id_utilisateur'],
                $enr['email'],
                $enr['nom'],
                $enr['prenom'],
                $enr['telephone'],
                $enr['username'],
                $enr['mot_de_passe'],
                $enr['url_photo'],
                $enr['nom_companie'],
                $enr['note_globale']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $unUtilisateur;
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

        $requete = $connexion->prepare("SELECT * FROM utilisateur " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $unUtilisateur = new Utilisateur(
                $enr['id_utilisateur'],
                $enr['email'],
                $enr['nom'],
                $enr['prenom'],
                $enr['telephone'],
                $enr['username'],
                $enr['mot_de_passe'],
                $enr['url_photo'],
                $enr['nom_companie'],
                $enr['note_globale']
            );
            array_push($tableau, $unUtilisateur);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }


    public static function inserer($unUtilisateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Utilisateur (email, nom, prenom, telephone, username, mot_de_passe, url_photo, nom_companie, note_globale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $unUtilisateur->getEmail(),
            $unUtilisateur->getNom(),
            $unUtilisateur->getPrenom(),
            $unUtilisateur->getTelephone(),
            $unUtilisateur->getUsername(),
            $unUtilisateur->getMotDePasse(),
            $unUtilisateur->getUrlPhoto(),
            $unUtilisateur->getNomCompanie(),
            $unUtilisateur->getNoteGlobale()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function modifier($unUtilisateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Utilisateur SET email=?, nom=?, prenom=?, telephone=?, username=?, mot_de_passe=?, url_photo=?, nom_companie=?, note_globale=? WHERE id_utilisateur=?");

        $tableauInfos = [
            $unUtilisateur->getEmail(),
            $unUtilisateur->getNom(),
            $unUtilisateur->getPrenom(),
            $unUtilisateur->getTelephone(),
            $unUtilisateur->getUsername(),
            $unUtilisateur->getMotDePasse(),
            $unUtilisateur->getUrlPhoto(),
            $unUtilisateur->getNomCompanie(),
            $unUtilisateur->getNoteGlobale(),
            $unUtilisateur->getIdUtilisateur()
        ];

        return $requete->execute($tableauInfos);
    }


    public static function supprimer($unUtilisateur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Utilisateur WHERE id_utilisateur=?");

        $tableauInfos = [$unUtilisateur->getIdUtilisateur()];
        return $requete->execute($tableauInfos);
    }
}
