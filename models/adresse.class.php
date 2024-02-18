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
    private $longitude;
    private $latitude;

    public function __construct($id_adresse, $code_postal, $numero_civique, $nom_rue, $ville, $pays, $province, $longitude, $latitude)
    {
        $this->id_adresse = $id_adresse;
        $this->code_postal = $code_postal;
        $this->numero_civique = $numero_civique;
        $this->nom_rue = $nom_rue;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->province = $province;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    public function getIdAdresse()
    {
        return $this->id_adresse;
    }

    public function setIdAdresse($id_adresse)
    {
        $this->id_adresse = $id_adresse;
    }

    public function getCodePostal()
    {
        return $this->code_postal;
    }

    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    public function getNumeroCivique()
    {
        return $this->numero_civique;
    }

    public function setNumeroCivique($numero_civique)
    {
        $this->numero_civique = $numero_civique;
    }

    public function getNomRue()
    {
        return $this->nom_rue;
    }

    public function setNomRue($nom_rue)
    {
        $this->nom_rue = $nom_rue;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getPays()
    {
        return $this->pays;
    }

    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function __toString()
    {
        return "Adresse [id_adresse=" . $this->id_adresse . ", code_postal=" . $this->code_postal . ", numero_civique=" . $this->numero_civique . ", nom_rue=" . $this->nom_rue . ", ville=" . $this->ville . ", pays=" . $this->pays . ", province=" . $this->province . ", longitude=" . $this->longitude . ", latitude=" . $this->latitude . "]";
    }
}
