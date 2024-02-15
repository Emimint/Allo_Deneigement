<?php
class Billet {
    private $id_billet;
    private $motif;
    private $texte;
    private $date_billet;
    private $email;

    public function __construct($id_billet, $motif, $texte, $date_billet, $email) {
        $this->id_billet = $id_billet;
        $this->motif = $motif;
        $this->texte = $texte;
        $this->date_billet = $date_billet;
        $this->email = $email;
    }

    public function getIdBillet() {
        return $this->id_billet;
    }

    public function getMotif() {
        return $this->motif;
    }

    public function getTexte() {
        return $this->texte;
    }

    public function getDateBillet() {
        return $this->date_billet;
    }

    public function getEmail() {
        return $this->email;
    }

    
    public function __toString() {
        return "ID: " . $this->id_billet . ", Motif: " . $this->motif . ", Texte: " . $this->texte . ", Date Billet: " . $this->date_billet . ", Email: " . $this->email;
    }
}

?>