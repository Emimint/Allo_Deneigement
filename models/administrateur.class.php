<?php

include_once(DOSSIER_BASE_INCLUDE . "models/personne.class.php");

class Administrateur extends Personne
{
    private $id_administrateur;
    private $nom;
    private $prenom;

    public function __construct($id_administrateur, $nom, $prenom, $telephone, $email, $username, $password, $url_photo)
    {
        parent::__construct($email, $telephone, $username, $password, $url_photo);
        $this->id_administrateur = $id_administrateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id = $id_administrateur;
    }


    // Méthodes getter pour les  attributs
    public function getIdAdministrateur()
    {
        return $this->id_administrateur;
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
        return "Administrateur [id_administrateur=" . $this->id_administrateur . ", " . parent::__toString() . ", nom=" . $this->nom . ", prenom=" . $this->prenom . "]";
    }
}
