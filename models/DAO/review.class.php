<?php

class Review
{
    private $id_review;
    private $score;
    private $commentaire;
    private $id_utilisateur;
    private $id_service;
    private $date_commentaire;

    // Constructeur
    public function __construct($id_review, $score, $commentaire, $id_utilisateur, $id_service, $date_commentaire)
    {
        $this->id_review = $id_review;
        $this->score = $score;
        $this->commentaire = $commentaire;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_service = $id_service;
        $this->date_commentaire = $date_commentaire;
    }

    // Méthodes getter
    public function getIdReview()
    {
        return $this->id_review;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    public function getIdService()
    {
        return $this->id_service;
    }

    public function getDateCommentaire()
    {
        return $this->date_commentaire;
    }

    // Méthodes setter
    public function setScore($score)
    {
        $this->score = $score;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function setIdService($id_service)
    {
        $this->id_service = $id_service;
    }

    public function setDateCommentaire($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;
    }
    public function __toString()
    {
        return "ID Review: " . $this->id_review . ", Score: " . $this->score . ", Commentaire: " . $this->commentaire . ", ID Utilisateur: " . $this->id_utilisateur . ", ID Service: " . $this->id_service . ", Date Commentaire: " . $this->date_commentaire;
    }
}
