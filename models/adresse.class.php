<?php

class Adresse
{
    private $id_adresse;
    private $code_postal;
    private $numero_civique;
    private $nom_rue;
    private $ville;
    private $pays;
    private $province;
    private $coordonnees;
    private $id_utilisateur;

    public function __construct($id_adresse, $code_postal, $numero_civique, $nom_rue, $ville, $pays, $province, $coordonnees, $id_utilisateur)
    {
        $this->id_adresse = $id_adresse;
        $this->code_postal = $code_postal;
        $this->numero_civique = $numero_civique;
        $this->nom_rue = $nom_rue;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->province = $province;
        $this->coordonnees = $coordonnees;
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getIdAdresse()
    {
        return $this->id_adresse;
    }

    public function getCodePostal()
    {
        return $this->code_postal;
    }

    public function getNumeroCivique()
    {
        return $this->numero_civique;
    }

    public function getNomRue()
    {
        return $this->nom_rue;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getPays()
    {
        return $this->pays;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    public function __toString()
    {
        return "Adresse [id_adresse=" . $this->id_adresse . ", code_postal=" . $this->code_postal . ", numero_civique=" . $this->numero_civique . ", nom_rue=" . $this->nom_rue . ", ville=" . $this->ville . ", pays=" . $this->pays . ", province=" . $this->province . ", coordonnees=" . $this->coordonnees . ", id_utilisateur=" . $this->id_utilisateur . "]";
    }
}
