<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/Fournisseur.class.php");

class FournisseurDAO  implements DAO
{
    public static function chercher($id_fournisseur)
    {
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
            $fournisseur = new Fournisseur(
                $enr['id_fournisseur'],
                $enr['email'],
                $enr['nom_de_la_compagnie'],
                $enr['nom_contact'],
                $enr['prenom_contact'],
                $enr['description'],
                $enr['telephone'],
                $enr['username'],
                $enr['password'],
                $enr['url_photo'],
                $enr['note_globale']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $fournisseur;
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

        $requete = $connexion->prepare("SELECT * FROM Fournisseur " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $fournisseur = new Fournisseur(
                $enr['id_fournisseur'],
                $enr['email'],
                $enr['nom_de_la_compagnie'],
                $enr['nom_contact'],
                $enr['prenom_contact'],
                $enr['description'],
                $enr['telephone'],
                $enr['username'],
                $enr['password'],
                $enr['url_photo'],
                $enr['note_globale']
            );
            array_push($tableau, $fournisseur);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($fournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO Fournisseur (email, nom_de_la_compagnie, nom_contact, prenom_contact, description, telephone, username, password, url_photo, note_globale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

        $tableauInfos = [
            $fournisseur->getEmail(),
            $fournisseur->getNomDeLaCompagnie(),
            $fournisseur->getNomContact(),
            $fournisseur->getPrenomContact(),
            $fournisseur->getDescription(),
            $fournisseur->getTelephone(),
            $fournisseur->getUsername(),
            $fournisseur->getPassword(),
            $fournisseur->getUrlPhoto(),
            $fournisseur->getNoteGlobale()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($fournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Fournisseur SET email=?, nom_de_la_compagnie=?, nom_contact=?, prenom_contact=?, description=?, telephone=?, username=?, password=?, url_photo=?, note_globale=? WHERE id_fournisseur=?");

        $tableauInfos = [
            $fournisseur->getEmail(),
            $fournisseur->getNomDeLaCompagnie(),
            $fournisseur->getNomContact(),
            $fournisseur->getPrenomContact(),
            $fournisseur->getDescription(),
            $fournisseur->getTelephone(),
            $fournisseur->getUsername(),
            $fournisseur->getPassword(),
            $fournisseur->getUrlPhoto(),
            $fournisseur->getNoteGlobale(),
            $fournisseur->getIdFournisseur()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($fournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Fournisseur WHERE id_fournisseur=?");

        $tableauInfos = [$fournisseur->getIdFournisseur()];
        return $requete->execute($tableauInfos);
    }

    public static function calculerScoreGlobal($fournisseur)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        try {
            $scoreQuery = $connexion->prepare("SELECT SUM(R.score)/count(*) AS score FROM review R, offre_de_service O, fournisseur F WHERE R.id_service = O.id_service AND O.id_fournisseur = F.id_fournisseur and F.id_fournisseur=" . $fournisseur->getIdFournisseur() . ";");

            $scoreQuery->execute();

            $score = $scoreQuery->fetch(PDO::FETCH_ASSOC)['score'];

            $fournisseur->setNoteGlobale($score); // mettre le score de l'instance a jour

        } catch (Exception $e) {
            throw new Exception("Impossible de calculer le score.");
        }

        FournisseurDAO::modifier($fournisseur); // mettre la base de donnees a jour
    }
}
