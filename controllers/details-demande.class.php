<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/ReviewDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/UtilisateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/PersonneDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");



class DetailDemande extends Controleur
{
    private $addresseTrouvee;
    private $FournisseursAssocies;
    private $commentaire;
    private $offreAssocies;
    private $utilisateurAssocies;
    private $status;
    private $demande;


    public function __construct()
    {
        parent::__construct();
    }

    public function getUtilisateurAssocie()
    {
        return $this->utilisateurAssocies;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDemande()
    {
        return $this->demande;
    }
    public function getAddresseTrouvee()
    {
        return $this->addresseTrouvee;
    }
    public function getFournisseursAssocies()
    {
        return $this->FournisseursAssocies;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getOffreAssocies()
    {
        return $this->offreAssocies;
    }

    public function handleStatusUpdate($demande, $newStatus, $messageSuccess)
    {
        try {
            $currentDemande = $demande;
            $currentDemande->setStatus($newStatus);
            DemandeDeServiceDAO::modifier($demande);
            header("Location: http://localhost/Allo_Deneigement/?action=afficherDemandeDeServices");
            flash("Mise a jour", $messageSuccess, FLASH_SUCCESS);
            exit;
        } catch (Exception $e) {
            flash("Error", "An error occurred while updating status: " . $e->getMessage(), FLASH_ERROR);
        }
    }

    function calculateDuration($startDate, $endDate)
    {
        $diffInHours = round((strtotime($endDate) - strtotime($startDate)) / (60 * 60));

        switch (true) {
            case $diffInHours <= 12:
                return "Une demie-journée";
            case $diffInHours <= 24:
                return "Une journée";
            case $diffInHours <= 48:
                return "Deux journées";
            case $diffInHours <= 240:
                return "Forfait 10 journées";
            case $diffInHours <= 4380:
                return "Forfait 6 mois";
            default:
                return "Custom duration";
        }
    }

    function calculateTotalPrice($duration, $pricePerHour)
    {
        switch ($duration) {
            case "Une heure":
                return $pricePerHour;
            case "Une demie-journée":
                return $pricePerHour * 3;
            case "Une journée":
                return $pricePerHour * 4;
            case "Deux journées":
                return $pricePerHour * 5;
            case "Forfait 10 journées":
                return $pricePerHour * 7;
            case "Forfait 6 mois":
                return $pricePerHour * 10;
            default:
                return 0;
        }
    }


    public function executerAction()
    {
        try {
            if ($this->acteur != "utilisateur" && $this->acteur != "fournisseur") {
                array_push($this->messagesErreur, "Vous êtes déjà connecté.");
                flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
                return "login";
            }

            if (!isset($_GET['id'])) {
                throw new Exception("ID non trouvé");
            }

            $demandeId = $_GET['id'];
            $demande = DemandeDeServiceDAO::chercher($demandeId);

            $this->addresseTrouvee = AdresseDAO::chercher($demande->getIdAdresse());

            $this->demande = $demande;


            if (!$demande) {
                throw new Exception("Demande non trouvée");
            } else {

                $this->status = $demande->getStatus();

                $fournisseur = FournisseurDAO::chercher($demande->getIdFournisseur());
                $this->FournisseursAssocies = $fournisseur->getNomDeLaCompagnie();

                $service = OffreDeServiceDAO::chercher($demande->getIdOffre());
                $this->offreAssocies = $service;

                $commentaire = $demande->getCommentaire();
                $this->commentaire = $commentaire;

                $utilisateur = UtilisateurDAO::chercher($demande->getIdUtilisateur());
                $this->utilisateurAssocies = $utilisateur;

                if (isset($_POST['updateComment'])) {

                    $newComment = $_POST['commentaire'];
                    $demande->setCommentaire($newComment);
                    DemandeDeServiceDAO::modifier($demande);
                    $this->commentaire = $newComment;

                    flash("Mise a jour", " Mise a jour effectue", FLASH_SUCCESS);
                }



                if (isset($_POST['AddReview'])) {
                    if ($this->demande->getIdReview() == null) {
                        $score = (isset($_POST['score'])) ? intval($_POST['score']) : 0;
                        $reviewComment = isset($_POST['review-comment']) ? $_POST['review-comment'] : "";


                        //cette requete retourne id de lavis ajoutee
                        $review_id = ReviewDAO::insererNouvelAvis($score, $reviewComment, $this->utilisateurAssocies->getIdUtilisateur(), $this->offreAssocies->getIdOffre(), date("Y-m-d"));
                        //mettre a jour id de la demande
                        DemandeDeServiceDAO::updateReview($this->demande->getIdDemande(), $review_id);


                        flash("SUCCES", "Vous avez soumis votre avec succes", FLASH_SUCCESS);
                    } else {
                        flash("error", "Vous avez deja soumis un avis", FLASH_WARNING);
                    }
                }





                if (isset($_POST['deleteRequest'])) {
                    DemandeDeServiceDAO::supprimer($demande);
                    header("Location: http://localhost/Allo_Deneigement/?action=afficherDemandeDeServices");
                    flash("Suppression", " Votre demande a ete bien supprimee", FLASH_SUCCESS);
                    exit;
                }

                if (isset($_POST['cancelRequest'])) {
                    $this->handleStatusUpdate($demande, 'Refusée', 'La demande a été refusée avec succès.');
                }

                if (isset($_POST['completeRequest'])) {
                    $this->handleStatusUpdate($demande, 'Completée', 'La demande a été complétée avec succès.');
                }

                if (isset($_POST['acceptRequest'])) {
                    $this->handleStatusUpdate($demande, 'Acceptée', 'La demande a été acceptée avec succès.');
                }

                return "detail-offre";
            }
        } catch (Exception $e) {
            flash("Erreur", "Une erreur s'est produite: " . $e->getMessage(), FLASH_ERROR);
            return "detail-offre";
        }
    }
}
