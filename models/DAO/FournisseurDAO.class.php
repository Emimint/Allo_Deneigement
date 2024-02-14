<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/Fournisseur.class.php");

class FournisseurDAO  implements DAO{
    public static function chercher($id_fournisseur) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $fournisseur = null;

        $requete = $connexion->prepare("SELECT * FROM Fournisseur WHERE id_fournisseur=?");
        $requete->execute(array($id_fournisseur));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $fournisseur = new Fournisseur();
            $fournisseur->setIdFournisseur($enr['id_fournisseur']);
            $fournisseur->setEmail($enr['email']);
            $fournisseur->setNomDeLaCompagnie($enr['nom_de_la_compagnie']);
            $fournisseur->setNomContact($enr['nom_contact']);
            $fournisseur->setPrenomContact($enr['prenom_contact']);
            $fournisseur->setTelephone($enr['telephone']);
            $fournisseur->setUsername($enr['username']);
            $fournisseur->setPassword($enr['password']);
            $fournisseur->setPhotoUrl($enr['photo_url']);
            $fournisseur->setNoteGlobale($enr['note_globale']);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $fournisseur;
    }

    public static function chercherTous() {
        return self::chercherAvecFiltre("");
    }

    public static function chercherAvecFiltre($filtre) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $tableau = [];

        $requete = $connexion->prepare("SELECT * FROM Fournisseur " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $fournisseur = new Fournisseur();
            $fournisseur->setIdFournisseur($enr['id_fournisseur']);
            $fournisseur->setEmail($enr['email']);
            $fournisseur->setNomDeLaCompagnie($enr['nom_de_la_compagnie']);
            $fournisseur->setNomContact($enr['nom_contact']);
            $fournisseur->setPrenomContact($enr['prenom_contact']);
            $fournisseur->setTelephone($enr['telephone']);
            $fournisseur->setUsername($enr['username']);
            $fournisseur->setPassword($enr['password']);
            $fournisseur->setPhotoUrl($enr['photo_url']);
            $fournisseur->setNoteGlobale($enr['note_globale']);
            array_push($tableau, $fournisseur);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($fournisseur) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Fournisseur (email, nom_de_la_compagnie, nom_contact, prenom_contact, telephone, username, password, photo_url, note_globale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $fournisseur->getEmail(),
            $fournisseur->getNomDeLaCompagnie(),
            $fournisseur->getNomContact(),
            $fournisseur->getPrenomContact(),
            $fournisseur->getTelephone(),
            $fournisseur->getUsername(),
            $fournisseur->getPassword(),
            $fournisseur->getPhotoUrl(),
            $fournisseur->getNoteGlobale()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($fournisseur) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Fournisseur SET email=?, nom_de_la_compagnie=?, nom_contact=?, prenom_contact=?, telephone=?, username=?, password=?, photo_url=?, note_globale=? WHERE id_fournisseur=?");

        $tableauInfos = [
            $fournisseur->getEmail(),
            $fournisseur->getNomDeLaCompagnie(),
            $fournisseur->getNomContact(),
            $fournisseur->getPrenomContact(),
            $fournisseur->getTelephone(),
            $fournisseur->getUsername(),
            $fournisseur->getPassword(),
            $fournisseur->getPhotoUrl(),
            $fournisseur->getNoteGlobale(),
            $fournisseur->getIdFournisseur()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($fournisseur) {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Fournisseur WHERE id_fournisseur=?");

        $tableauInfos = [$fournisseur->getIdFournisseur()];
        return $requete->execute($tableauInfos);
    }
}

