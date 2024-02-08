<?php

class Administrateur {
   

    // Constructeur
    public function __construct($id, $nom, $prenom, $email, $password, $addresse, $telephone, $username, $photo_url) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->username = $username;
        $this->password = $password;
        $this->photo_ur = $photo_ur;
    }

   // fontion modier compte
    public function modifierCompte($idCompte, $nouveauUsername, $nouveauPrenom, $nouvelEmail, $nouveauPassword) {}
    
     // fontion trouver compte
    public function trouverCompte($idCompte) { }

     // fontion supprimer compte
    public function supprimerCompte($idCompte) {}

    // Méthodes pour gérer les offres de service

     // fontion ajouter offre
    public function ajouterOffre($offreService) {}


     // fontion trouver offre
    public function trouverOffre($idOffre) {  }
    
    // fontion supprimer offre
    public function supprimerOffre($idOffre) {}
    

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

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function __toString(){

        return ", Nom: " . $this->nom . ", Prénom: " . $this->prenom . ", Email: " . $this->email ",Adresse: ".$this->adresse ",Telephone: " ;
        
    }
}

?>
