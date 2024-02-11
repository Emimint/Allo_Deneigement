<?php

class Fournisseur extends Personne {
    private $nom_de_la_compagnie;
    private $note_globale;

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


    public function calculeNoteGlobale(){}

}