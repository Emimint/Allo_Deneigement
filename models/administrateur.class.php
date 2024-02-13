<?php

class Administrateur {
    private $id_administrateur;
    private $nom;
    private $prenom;
    private $telephone;
    private $email;
    private $username;
    private $password;
    private $photo_url;

    // Constructeur
    public function __construct($id_administrateur, $nom, $prenom, $telephone, $email, $username, $password, $photo_url) {
        $this->id_administrateur = $id_administrateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->photo_url = $photo_url;
    }


    // Méthodes getter pour les  attributs
    public function getIdAdministrateur() {
        return $this->id_administrateur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPhotoUrl() {
        return $this->photo_url;
    }

    // Méthodes setter pour les  attributs
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPhotoUrl($photo_url) {
        $this->photo_url = $photo_url;
    }

    // Méthode toString
    public function __toString() {
        return "ID: " . $this->id_administrateur . ", Nom: " . $this->nom . ", Prénom: " . $this->prenom . ", Téléphone: " . $this->telephone . ", Email: " . $this->email . ", Username: " . $this->username . ", Photo URL: " . $this->photo_url;
    }
}

?>