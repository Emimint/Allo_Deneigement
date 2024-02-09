<?php

class Review {
    private $id_review;
    private $score;
    private $commentaire;
    private $liste_photos;
    private $id_utilisateur;
    private $date_commentaire;

    public function __construct($id_review, $score, $commentaire, $liste_photos, $id_utilisateur, $date_commentaire) {
        $this->id_review = $id_review;
        $this->score = $score;
        $this->commentaire = $commentaire;
        $this->liste_photos = $liste_photos;
        $this->id_utilisateur = $id_utilisateur;
        $this->date_commentaire = $date_commentaire;
    }

    // Getters et Setters
    public function getIdReview() {
        return $this->id_review;
    }

    public function setIdReview($id_review) {
        $this->id_review = $id_review;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function getListePhotos() {
        return $this->liste_photos;
    }

    public function setListePhotos($liste_photos) {
        $this->liste_photos = $liste_photos;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getDateCommentaire() {
        return $this->date_commentaire;
    }

    public function setDateCommentaire($date_commentaire) {
        $this->date_commentaire = $date_commentaire;
    }
}
