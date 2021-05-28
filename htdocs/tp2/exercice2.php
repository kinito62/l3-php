<?php
class voiture{

    const roue = 4;

    private $propriete;
    private $couleur;
    private $puissance;
    private $vitesse;

    public function getPropriete()
    {
        return $this->propriete;
    }

    public function setPropriete($propriete)
    {
        $this->propriete = $propriete;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getPuissance()
    {
        return $this->puissance;
    }

    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
    }

    public function getVitesse()
    {
        return $this->vitesse;
    }

    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;
    }

    public function accelerer($vitesse){
        $this->vitesse = $vitesse++;
    }

    public function ralentir($vitesse){
        $this->vitesse = $vitesse--;
    }

}

abstract class Parole{
    abstract protected function direBonjour();
}

class ParoleFrancais extends Parole{

    protected function direBonjour()
    {
        echo 'Bonjour';
    }

}