<?php

class OffreDeService
{
    private $idOffre;
    private $idFournisseur;
    private $prixUnitaire;
    private $description;
    private $typeClientele;
    private $categorie;

    public function __construct($idOffre, $idFournisseur, $prixUnitaire, $description, $typeClientele, $categorie)
    {
        $this->idOffre = $idOffre;
        $this->idFournisseur = $idFournisseur;
        $this->prixUnitaire = $prixUnitaire;
        $this->description = $description;
        $this->typeClientele = $typeClientele;
        $this->categorie = $categorie;
    }

    public function getIdOffre()
    {
        return $this->idOffre;
    }

    public function getIdFournisseur()
    {
        return $this->idFournisseur;
    }

    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTypeClientele()
    {
        return $this->typeClientele;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    public function setIdFournisseur($idFournisseur)
    {
        $this->idFournisseur = $idFournisseur;
    }

    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setTypeClientele($typeClientele)
    {
        $this->typeClientele = $typeClientele;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function __toString()
    {
        return "OffreDeService [idOffre=" . $this->idOffre . ", idFournisseur=" . $this->idFournisseur . ", prixUnitaire=" . $this->prixUnitaire . ", description=" . $this->description . ", typeClientele=" . $this->typeClientele . ", categorie=" . $this->categorie . "]";
    }
}
