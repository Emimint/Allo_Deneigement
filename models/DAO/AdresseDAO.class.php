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
                $enr['latitude'],
                $enr['longitude']
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
                $enr['latitude'],
                $enr['longitude']
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

        $requete = $connexion->prepare("INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $uneAdresse->getCodePostal(),
            $uneAdresse->getNumeroCivique(),
            $uneAdresse->getNomRue(),
            $uneAdresse->getVille(),
            $uneAdresse->getPays(),
            $uneAdresse->getProvince(),
            $uneAdresse->getLatitude(),
            $uneAdresse->getLongitude()
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

        $requete = $connexion->prepare("UPDATE Adresse SET code_postal=?, numero_civique=?, nom_rue=?, ville=?, pays=?, province=?, latitude=?, longitude=? WHERE id_adresse=?");

        $tableauInfos = [
            $uneAdresse->getCodePostal(),
            $uneAdresse->getNumeroCivique(),
            $uneAdresse->getNomRue(),
            $uneAdresse->getVille(),
            $uneAdresse->getPays(),
            $uneAdresse->getProvince(),
            $uneAdresse->getLatitude(),
            $uneAdresse->getLongitude(),
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

    public static function geocodeAddress($address)
    {
        try {
            $env = parse_ini_file('.env');
            if (isset($env["GEO_API_KEY"])) $GEO_API_KEY = $env["GEO_API_KEY"];
            else return null;

            if (!$GEO_API_KEY) {
                throw new Exception('GEO_API_KEY n\'est pas une variable d\' environment.');
            }

            $apiKey = $GEO_API_KEY;

            $address = urlencode($address);

            $url = "https://api.geoapify.com/v1/geocode/search?text=$address&apiKey=$apiKey";

            $response = file_get_contents($url);

            $data = json_decode($response);

            if (isset($data->features) && !empty($data->features)) {

                $latitude = $data->features[0]->properties->lat;
                $longitude = $data->features[0]->properties->lon;

                return array($latitude, $longitude);
            } else {
                return null;
            }
        } catch (Exception $e) {
            // echo $e->getMessage();
            flash('Erreur', 'Une erreur s\'est produite côté serveur.', FLASH_ERROR);
        }
        return null;
    }
}
