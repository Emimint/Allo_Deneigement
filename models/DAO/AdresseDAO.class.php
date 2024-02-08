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
        // Get the database connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Default value for the object to return if not found
        $uneAdresse = null;

        // Prepare a PDOStatement query with SQL parameters
        $requete = $connexion->prepare("SELECT * FROM Adresse WHERE id_adresse=?");

        // Execute the query
        $requete->execute(array($cles));

        // Analyze the record, if it exists, and create an instance of Adresse
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

        // Close the query cursor and the database connection
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
        // Get the database connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Initialize an empty array
        $tableau = [];

        // Prepare a PDOStatement query with SQL parameters
        $requete = $connexion->prepare("SELECT * FROM Adresse " . $filtre);

        // Execute the query
        $requete->execute();

        // Analyze the records if there are any
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

        // Close the query cursor and the database connection
        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($uneAdresse)
    {
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the insert command
        $requete = $connexion->prepare("INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, coordonnees, id_utilisateur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Execute it, and return the success state (true/false)
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
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the update command
        $requete = $connexion->prepare("UPDATE Adresse SET code_postal=?, numero_civique=?, nom_rue=?, ville=?, pays=?, province=?, coordonnees=?, id_utilisateur=? WHERE id_adresse=?");

        // Execute it, and return the success state (true/false)
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
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the delete command
        $requete = $connexion->prepare("DELETE FROM Adresse WHERE id_adresse=?");

        // Execute it, and return the success state (true/false)
        $tableauInfos = [$uneAdresse->getIdAdresse()];
        return $requete->execute($tableauInfos);
    }
}
