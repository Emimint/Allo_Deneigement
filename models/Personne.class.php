<?php


class Personne {
    private $id;
    private $nom;
    private $prenom;
    private $adresse; 
    private $telephone;
    private $username;
    private $password;
    private $photo_url;
    private $adresses;

    public function __construct($id, $nom, $prenom, $adresse, $telephone, $username, $password, $photo_url, $adresses) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse; 
        $this->telephone = $telephone;
        $this->username = $username;
        $this->password = $password;
        $this->photo_url = $photo_url;
        $this->adresses = $adresses; 
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
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

    public function getAdresses() {
        return $this->adresses;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
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

    public function setAdresses($adresses) {
        $this->adresses = $adresses;
    }

    // toString method
    public function __toString() {
        return "Personne [id={$this->id}, nom={$this->nom}, prenom={$this->prenom}, adresse={$this->adresse}, telephone={$this->telephone}, username={$this->username}, password={$this->password}, photo_url={$this->photo_url}, adresses={$this->adresses}]";
    }
}
