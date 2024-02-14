<?php

class Personne
{
    protected $id;
    protected $email;
    protected $telephone;
    protected $username;
    protected $password;
    protected $url_photo;

    public function __construct($email, $telephone, $username, $password, $url_photo)
    {
        $this->email = $email;
        $this->telephone = $telephone;
        $this->username = $username;
        $this->password = $password;
        $this->url_photo = $url_photo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUrlPhoto()
    {
        return $this->url_photo;
    }

    public function setUrlPhoto($url_photo)
    {
        $this->url_photo = $url_photo;
    }

    public function __toString()
    {
        return "Personne [email=" . $this->email . ", telephone=" . $this->telephone . ", username=" . $this->username . ", password=" . $this->password . ", url_photo=" . $this->url_photo . "]";
    }
}
