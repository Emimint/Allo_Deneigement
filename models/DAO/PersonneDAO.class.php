<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/connexionBD.class.php');
include_once(DOSSIER_BASE_INCLUDE . "models/personne.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/adresse.class.php");
include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/AdministrateurDAO.class.php');
include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/UtilisateurDAO.class.php');
include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/FournisseurDAO.class.php');

class PersonneDAO
{

    public static function chercherPersonne($filtre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("SELECT 'administrateur' AS user_type, id_administrateur AS user_id FROM Administrateur WHERE email like '%" . $filtre . "%' UNION SELECT 'utilisateur' AS user_type, id_utilisateur AS user_id FROM Utilisateur WHERE email like '%" . $filtre . "%' UNION SELECT 'fournisseur' AS user_type, id_fournisseur AS user_id FROM Fournisseur WHERE email like '%" . $filtre . "%';");

        $requete->execute();

        if ($requete->rowCount() == 0) {
            return null;
        }

        $res = $requete->fetch();

        $requete->closeCursor();

        ConnexionBD::close();

        if ($res['user_type'] == 'administrateur') {
            return AdministrateurDAO::chercher($res['user_id']);
        }

        if ($res['user_type'] == 'utilisateur') {
            return UtilisateurDAO::chercher($res['user_id']);
        }

        if ($res['user_type'] == 'fournisseur') {
            return FournisseurDAO::chercher($res['user_id']);
        }
        return null;
    }

    public static function chercherAdresses($user_type, $email)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $tableau = [];

        $requete = $connexion->prepare("SELECT L.id_adresse, code_postal, numero_civique, nom_rue, ville, pays, province, coordonnees from " . $user_type . " T, liste_adresses_" . $user_type . " L, adresse A WHERE T.id_" . $user_type . " = L.id_" . $user_type . " AND L.id_adresse = A.id_adresse AND T.email like '" . $email . "';");

        $requete->execute();

        if ($requete->rowCount() == 0) {
            return null;
        }

        foreach ($requete as $enr) {
            $uneAdresse = new Adresse(
                $enr['id_adresse'],
                $enr['code_postal'],
                $enr['numero_civique'],
                $enr['nom_rue'],
                $enr['ville'],
                $enr['pays'],
                $enr['province'],
                $enr['coordonnees']
            );
            array_push($tableau, $uneAdresse);
        }
        $requete->closeCursor();

        ConnexionBD::close();

        return $tableau;
    }

    public static function getId($user_type, $email)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("SELECT id_" . $user_type . " FROM " . $user_type . " WHERE email like '%" . $email . "%' LIMIT 1;");

        $requete->execute();

        $id_user = $requete->fetchColumn();

        $requete->closeCursor();

        return $id_user;
    }

    public static function insererAdresse($user_type, $nouvelleAdresse, $email)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        try {
            AdresseDAO::inserer($nouvelleAdresse);
        } catch (Exception $e) {
            throw new Exception("Impossible de faire l'ajout.");
        }

        // Check if the id_adresse exists in the adresse table
        $id_adresse = $connexion->lastInsertId();
        $checkQuery = $connexion->prepare("SELECT COUNT(*) FROM adresse WHERE id_adresse = ?");
        $checkQuery->execute([$id_adresse]);
        $count = $checkQuery->fetchColumn();

        if ($count == 0) {
            throw new Exception("id_adresse does not exist in the adresse table.");
        }

        // Insert into liste_adresses_administrateur table
        $requete = $connexion->prepare("INSERT INTO liste_adresses_" . $user_type . " (id_" . $user_type . ", id_adresse) VALUES (?,?);");

        $tableauInfos = [
            PersonneDAO::getId($user_type, $email),
            $id_adresse
        ];

        return $requete->execute($tableauInfos);
    }

    public static function modifier($unePersonne)
    {
        if ($unePersonne instanceof Utilisateur) {
            UtilisateurDAO::modifier($unePersonne);
        } else if ($unePersonne instanceof Administrateur) {
            AdministrateurDAO::modifier($unePersonne);
        } else if ($unePersonne instanceof Fournisseur) {
            FournisseurDAO::modifier($unePersonne);
        }
    }
}
