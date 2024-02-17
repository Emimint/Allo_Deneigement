<?php

abstract class Controleur
{

    protected $messagesErreur = array();
    protected $acteur = "visiteur";

    public function __construct()
    {
        $this->determinerActeur();
    }

    public function getMessagesErreur()
    {
        return $this->messagesErreur;
    }
    public function getActeur()
    {
        return $this->acteur;
    }

    abstract public function executerAction();

    private function determinerActeur()
    {
        session_start();
        if (isset($_SESSION['utilisateurConnecte'])) {
            $this->acteur = $_SESSION['utilisateurConnecte'];
        }
    }
}
