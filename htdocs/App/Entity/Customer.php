<?php


namespace App\Entity;

class Customer implements EntityInterface
{

    private $prenom;
    private $nom;
    private $adresse;


    public function __construct($prenom, $nom, $adresse)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $price
     */
    public function setprenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed
     */
    public function setnom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->adresse;
    }

    /**
     * @param mixed
     */
    public function setAddress($adresse): void
    {
        $this->adresse = $adresse;
    }
}