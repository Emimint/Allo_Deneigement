<?php

class OffreDeService
{
    private $idOffre;
    private $titre;
    private $description;
    private $prix;
    private $idUtilisateur;
    private $dateCreation;

    public function __construct($idOffre, $titre, $description, $prix, $idUtilisateur, $dateCreation)
    {
        $this->idOffre = $idOffre;
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->idUtilisateur = $idUtilisateur;
        $this->dateCreation = $dateCreation;
    }

    public function getIdOffre()
    {
        return $this->idOffre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }
}
