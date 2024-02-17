<?php

include_once(DOSSIER_BASE_INCLUDE . "models/personne.class.php");

class Utilisateur extends Personne
{
    private $id_utilisateur;
    private $nom;
    private $prenom;

    public function __construct($id_utilisateur, $email, $nom, $prenom, $telephone, $username, $password, $url_photo)
    {
        parent::__construct($email, $telephone, $username, $password, $url_photo);
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id = $id_utilisateur;
    }

    // Additional getters for Utilisateur
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function __toString()
    {
        return "Utilisateur [id_utilisateur=" . $this->id_utilisateur . ", " . parent::__toString() . ", nom=" . $this->nom . ", prenom=" . $this->prenom . "]";
    }
}
