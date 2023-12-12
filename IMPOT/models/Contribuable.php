<?php

class Contribuable
{

    // ATTRIBUTS 

    private string $nom = "";
    private float $revenu = 0;

    public const TAUX1 = 0.09;
    public const TAUX2 = 0.14;
    public const PLAFOND = 15000;

    // CONSTRUCTEUR 
    
    public function __construct(string $_nom, float $_revenu)
    {
     $this->nom = $_nom;
     $this->revenu = $_revenu;   
    }

    // PROPRIÉTÉS 

    public function getNom() : string
    {
        return $this->nom;
    }

    public function getRevenu() : float
    {
        return $this->revenu;
    }

    public function setRevenu(float $_nouveauRevenu) : void
    {
        $this->revenu = $_nouveauRevenu;
    }

    // MÉTHODES

    public function calculImpot() : float
    {
        $impot = 0;

        if($this->revenu <= self::PLAFOND){
            $impot = $this->revenu * self::TAUX1;
        }

        else{
            $impot = (self::PLAFOND * self::TAUX1) + ($this->revenu - self::PLAFOND) * self::TAUX2;
        }

        return round($impot, 2);
    }

}
