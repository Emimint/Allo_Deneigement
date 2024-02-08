<?php

class Utilisateur
{
    private $id_utilisateur;
    private $email;
    private $nom;
    private $prenom;
    private $telephone;
    private $username;
    private $mot_de_passe;
    private $url_photo;
    private $nom_companie;
    private $note_globale;

    public function __construct($id_utilisateur, $email, $nom, $prenom, $telephone, $username, $mot_de_passe, $url_photo, $nom_companie, $note_globale)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->username = $username;
        $this->mot_de_passe = $mot_de_passe;
        $this->url_photo = $url_photo;
        $this->nom_companie = $nom_companie;
        $this->note_globale = $note_globale;
    }

    // Getters
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public function getUrlPhoto()
    {
        return $this->url_photo;
    }

    public function getNomCompanie()
    {
        return $this->nom_companie;
    }

    public function getNoteGlobale()
    {
        return $this->note_globale;
    }

    public function __toString()
    {
        return "Utilisateur [id_utilisateur=" . $this->id_utilisateur . ", email=" . $this->email . ", nom=" . $this->nom . ", prenom=" . $this->prenom . ", telephone=" . $this->telephone . ", username=" . $this->username . ", mot_de_passe=" . $this->mot_de_passe . ", url_photo=" . $this->url_photo . ", nom_companie=" . $this->nom_companie . ", note_globale=" . $this->note_globale . "]";
    }
}
