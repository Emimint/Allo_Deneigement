<?php

class DemandeDeService
{
    private $idDemande;
    private $dateDebut;
    private $dateFin;
    private $status;
    private $commentaire;
    private $idUtilisateur;
    private $idReview;
    private $idOffre;
    private $idAdresse;

    public function __construct($idDemande, $dateDebut, $dateFin, $status, $commentaire, $idUtilisateur, $idReview, $idOffre, $idAdresse)
    {
        $this->idDemande = $idDemande;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->status = $status;
        $this->commentaire = $commentaire;
        $this->idUtilisateur = $idUtilisateur;
        $this->idReview = $idReview;
        $this->idOffre = $idOffre;
        $this->idAdresse = $idAdresse;
    }

    public function getIdDemande()
    {
        return $this->idDemande;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getIdReview()
    {
        return $this->idReview;
    }

    public function getIdOffre()
    {
        return $this->idOffre;
    }

    public function getIdAdresse()
    {
        return $this->idAdresse;
    }

    public function __toString()
    {
        return "Demande de service [ID: " . $this->idDemande . ", Date de début: " . $this->dateDebut . ", Date de fin: " . $this->dateFin . ", Status: " . $this->status . ", Commentaire: " . $this->commentaire . ", ID Utilisateur: " . $this->idUtilisateur . ", ID Review: " . $this->idReview . ", ID Offre: " . $this->idOffre . ", ID Adresse: " . $this->idAdresse . "]";
    }
}
