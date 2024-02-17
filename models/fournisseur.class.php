<?php

class Fournisseur extends Personne
{
    private $id_fournisseur;
    private $nom_de_la_compagnie;
    private $nom_contact;
    private $prenom_contact;
    private $description;
    private $note_globale;

    // Constructor
    public function __construct($id_fournisseur, $email, $nom_de_la_compagnie, $nom_contact, $prenom_contact, $telephone, $username, $password, $url_photo, $note_globale)
    {
        parent::__construct($email, $telephone, $username, $password, $url_photo);
        $this->id_fournisseur = $id_fournisseur;
        $this->nom_de_la_compagnie = $nom_de_la_compagnie;
        $this->nom_contact = $nom_contact;
        $this->description = $description;
        $this->prenom_contact = $prenom_contact;
        $this->note_globale = $note_globale;
        $this->id = $id_fournisseur;
    }

    public function getIdFournisseur()
    {
        return $this->id_fournisseur;
    }

    public function setIdFournisseur($id_fournisseur)
    {
        $this->id_fournisseur = $id_fournisseur;
    }


    public function getNomDeLaCompagnie()
    {
        return $this->nom_de_la_compagnie;
    }

    public function setNomDeLaCompagnie($nom_de_la_compagnie)
    {
        $this->nom_de_la_compagnie = $nom_de_la_compagnie;
    }

    public function getNomContact()
    {
        return $this->nom_contact;
    }

    public function setNomContact($nom_contact)
    {
        $this->nom_contact = $nom_contact;
    }

    public function getPrenomContact()
    {
        return $this->prenom_contact;
    }

    public function setPrenomContact($prenom_contact)
    {
        $this->prenom_contact = $prenom_contact;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getNoteGlobale()
    {
        return $this->note_globale;
    }

    public function setNoteGlobale($note_globale)
    {
        $this->note_globale = $note_globale;
    }

    public function __toString()
    {
        return "ID Fournisseur: " . $this->id_fournisseur . ", " . parent::__toString() . ", Nom de la compagnie: " . $this->nom_de_la_compagnie . ", Nom du contact: " . $this->nom_contact . ", Prenom du contact: " . $this->prenom_contact . ", Description: " . $this->description . ", Note Globale: " . $this->note_globale;
    }
}
