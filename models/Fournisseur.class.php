<?php

class Fournisseur {
    private $id_fournisseur;
    private $email;
    private $nom_de_la_compagnie;
    private $nom_contact;
    private $prenom_contact;
    private $telephone;
    private $username;
    private $password;
    private $photo_url;
    private $note_globale;

    // Constructor
    public function __construct() {}

    // Getter and Setter for id_fournisseur
    public function getIdFournisseur() {
        return $this->id_fournisseur;
    }

    public function setIdFournisseur($id_fournisseur) {
        $this->id_fournisseur = $id_fournisseur;
    }

    // Getter and Setter for email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter and Setter for nom_de_la_compagnie
    public function getNomDeLaCompagnie() {
        return $this->nom_de_la_compagnie;
    }

    public function setNomDeLaCompagnie($nom_de_la_compagnie) {
        $this->nom_de_la_compagnie = $nom_de_la_compagnie;
    }

    // Getter and Setter for nom_contact
    public function getNomContact() {
        return $this->nom_contact;
    }

    public function setNomContact($nom_contact) {
        $this->nom_contact = $nom_contact;
    }

    // Getter and Setter for prenom_contact
    public function getPrenomContact() {
        return $this->prenom_contact;
    }

    public function setPrenomContact($prenom_contact) {
        $this->prenom_contact = $prenom_contact;
    }

    // Getter and Setter for telephone
    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    // Getter and Setter for username
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    // Getter and Setter for password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter and Setter for photo_url
    public function getPhotoUrl() {
        return $this->photo_url;
    }

    public function setPhotoUrl($photo_url) {
        $this->photo_url = $photo_url;
    }

    // Getter and Setter for note_globale
    public function getNoteGlobale() {
        return $this->note_globale;
    }

    public function setNoteGlobale($note_globale) {
        $this->note_globale = $note_globale;
    }
}

