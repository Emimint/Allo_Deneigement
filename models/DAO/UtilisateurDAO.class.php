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
        // Get the database connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Default value for the object to return if not found
        $unUtilisateur = null;

        // Prepare a PDOStatement query with SQL parameters
        $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE id_utilisateur=?");

        // Execute the query
        $requete->execute(array($cles));

        // Analyze the record, if it exists, and create an instance of Utilisateur
        // Note: You could also throw an exception if more than one result is found
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

        // Close the query cursor and the database connection
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
        // Get the database connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Initialize an empty array
        $tableau = [];

        // Prepare a PDOStatement query with SQL parameters
        $requete = $connexion->prepare("SELECT * FROM utilisateur " . $filtre);

        // Execute the query
        $requete->execute();

        // Analyze the records if there are any
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

        // Close the query cursor and the database connection
        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }


    public static function inserer($unUtilisateur)
    {
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the insert command
        $requete = $connexion->prepare("INSERT INTO Utilisateur (email, nom, prenom, telephone, username, mot_de_passe, url_photo, nom_companie, note_globale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Execute it, and return the success state (true/false)
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
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the update command
        $requete = $connexion->prepare("UPDATE Utilisateur SET email=?, nom=?, prenom=?, telephone=?, username=?, mot_de_passe=?, url_photo=?, nom_companie=?, note_globale=? WHERE id_utilisateur=?");

        // Execute it, and return the success state (true/false)
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
        // Try to establish a connection
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        // Prepare the delete command
        $requete = $connexion->prepare("DELETE FROM Utilisateur WHERE id_utilisateur=?");

        // Execute it, and return the success state (true/false)
        $tableauInfos = [$unUtilisateur->getIdUtilisateur()];
        return $requete->execute($tableauInfos);
    }
}
