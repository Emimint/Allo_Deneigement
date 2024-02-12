<?php

class Fournisseur{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $adresse; 
    protected $telephone;
    protected $username;
    protected $password;
    protected $photo_url;
    protected $adresses;
    private $nom_de_la_compagnie;
    private $note_globale = [];

    public function __construct($id, $nom, $prenom, $adresse, $telephone, $username, $password, $photo_url, $nom_de_la_compagnie, $note_globale) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->username = $username;
        $this->password = $password;
        $this->photo_url = $photo_url;
        $this->nom_de_la_compagnie = $nom_de_la_compagnie;
        $this->note_globale = $note_globale;
    }

    public function getNomDeLaCompagnie() {
        return $this->nom_de_la_compagnie;
    }

    public function setNomDeLaCompagnie($nom_de_la_compagnie) {
        $this->nom_de_la_compagnie = $nom_de_la_compagnie;
    }

    public function getNoteGlobale() {
        return $this->note_globale;
    }

    public function setNoteGlobale($note_globale) {
        $this->note_globale = $note_globale;
    }

    // Override toString method
    public function __toString() {
        return "Fournisseur: {$this->nom} {$this->prenom}, Compagnie: {$this->nom_de_la_compagnie}, Note Globale: {$this->note_globale}";
    }

    public function ajouterNote($rating) {
        $this->note_globale[] = $rating;
    }

    public function calculeNoteGlobale() {
        if (count($this->note_globale) > 0) {
            $averageRating = array_sum($this->note_globale) / count($this->note_globale);
            return round($averageRating, 2);
        } else {
            return 0;
        }
    }
}
