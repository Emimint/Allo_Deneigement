<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
    define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE . "models/Review.class.php");

class ReviewDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $uneReview = null;

        $requete = $connexion->prepare("SELECT * FROM Review WHERE id_review=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $uneReview = new Review(
                $enr['id_review'],
                $enr['score'],
                $enr['commentaire'],
                $enr['id_utilisateur'],
                $enr['id_service'],
                $enr['date_commentaire']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $uneReview;
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

        $requete = $connexion->prepare("SELECT * FROM Review " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $uneReview = new Review(
                $enr['id_review'],
                $enr['score'],
                $enr['commentaire'],
                $enr['id_utilisateur'],
                $enr['id_service'],
                $enr['date_commentaire']
            );
            array_push($tableau, $uneReview);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    public static function inserer($uneReview)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }


        $requete = $connexion->prepare("INSERT INTO Review (score, commentaire, id_utilisateur, id_service, date_commentaire) VALUES (?, ?, ?, ?, ?)");

        

        $uneReview = [
            $uneReview->getScore(),
            $uneReview->getCommentaire(),
            $uneReview->getIdUtilisateur(),
            $uneReview->getIdService(),
            $uneReview->getDateCommentaire()
        ];

        
         $requete->execute($uneReview);
         $newReviewId = $connexion->lastInsertId();
         return  $newReviewId;
        
    }

    public static function modifier($uneReview)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE Review SET score=?, commentaire=?, id_utilisateur=?, id_service=?, date_commentaire=? WHERE id_review=?");

        $tableauInfos = [
            $uneReview->getScore(),
            $uneReview->getCommentaire(),
            $uneReview->getIdUtilisateur(),
            $uneReview->getIdService(),
            $uneReview->getDateCommentaire(),
            $uneReview->getIdReview()
        ];

        return $requete->execute($tableauInfos);
    }

    public static function supprimer($uneReview)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM Review WHERE id_review=?");

        $tableauInfos = [$uneReview->getIdReview()];
        return $requete->execute($tableauInfos);
    }

    public static function insererNouvelAvis($score, $reviewComment,$userId,$OfferId, $date)
{

   $review = new Review('',$score, $reviewComment,$userId,$OfferId, $date);
   $review_id = ReviewDAO::inserer($review);
  
    return $review_id ;

 
  
}

}