<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/adresse.class.php");

class AdresseDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $uneAdresse = null;

        $requete = $connexion->prepare("SELECT * FROM Adresse WHERE id_adresse=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $uneAdresse = new Adresse(
                $enr['id_adresse'],
                $enr['code_postal'],
                $enr['numero_civique'],
                $enr['nom_rue'],
                $enr['ville'],
                $enr['pays'],
                $enr['province'],
                $enr['coordonnees'],
                $enr['id_utilisateur']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $uneAdresse;
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

        $requete = $connexion->prepare("SELECT * FROM Adresse " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $uneAdresse = new Adresse(
                $enr['id_adresse'],
                $enr['code_postal'],
                $enr['numero_civique'],
                $enr['nom_rue'],
                $enr['ville'],
                $enr['pays'],
                $enr['province'],
                $enr['coordonnees'],
                $enr['id_utilisateur']
            );
            array_push($tableau, $uneAdresse);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($uneAdresse)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, coordonnees, id_utilisateur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $uneAdresse->getCodePostal(),
            $uneAdresse->getNumeroCivique(),
            $uneAdresse->getNomRue(),
            $uneAdresse->getVille(),
            $uneAdresse->getPays(),
            $uneAdresse->getProvince(),
            $uneAdresse->getCoordonnees(),
            $uneAdresse->getIdUtilisateur()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($uneAdresse)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Adresse SET code_postal=?, numero_civique=?, nom_rue=?, ville=?, pays=?, province=?, coordonnees=?, id_utilisateur=? WHERE id_adresse=?");

        $tableauInfos = [
            $uneAdresse->getCodePostal(),
            $uneAdresse->getNumeroCivique(),
            $uneAdresse->getNomRue(),
            $uneAdresse->getVille(),
            $uneAdresse->getPays(),
            $uneAdresse->getProvince(),
            $uneAdresse->getCoordonnees(),
            $uneAdresse->getIdUtilisateur(),
            $uneAdresse->getIdAdresse()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($uneAdresse)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Adresse WHERE id_adresse=?");

        $tableauInfos = [$uneAdresse->getIdAdresse()];
        return $requete->execute($tableauInfos);
    }
}
