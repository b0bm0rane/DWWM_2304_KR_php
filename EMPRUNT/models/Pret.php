<?php

class Pret 
{

    // ATTRIBUTS 

    public float $capital;
    private float $tauxMensuel;
    private int $nbMois;

    // CONSTRUCTEUR 
    
    public function __construct(float $_capital, float $_tauxAnnuel, $_nbannees)
    {
        $this->capital=$_capital;
        $this->tauxMensuel=$_tauxAnnuel/12/100;
        $this->nbMois=$_nbannees*12;
    }

    // PROPRIÉTÉS

    public function getTauxMensuel()
    {
        return $this->tauxMensuel*100;
    }

    public function getnbMois()
    {
    return $this->nbMois;
    }

    public function calculMensualite():float
    {
        $quotient=( 1- POW((1+$this->tauxMensuel),-$this->nbMois));
        $mensualite= ($this->capital*$this->tauxMensuel)/$quotient;
        return round($mensualite,2);
    }

    public function tableauAmortissement():string
    {
        $chaine = "<table><thead><tr><th>nombre de mois</th><th>part intérêt</th><th>part amortissement</th><th>capital restant dû</th><th>mensualité</th></tr></thead><tbody>";
        $numMois = 1;
        $capitalRestant = 0;
        $partInteret = 0;
        $partAmortissment = 0;
        $mensualite =  $this->calculMensualite();
        
        do
        {
            if ($numMois == 1)
            {
                $capitalRestant = $this->capital;
            }

            else 
            {
                $capitalRestant -= $partAmortissment;
            }

            $partInteret = $capitalRestant * $this->tauxMensuel;
            $partAmortissment = $mensualite - $partInteret;
            $chaine .= "<tr><td>" . $numMois . "</td><td>" . round($partInteret, 2) . "€ </td><td>" .  round($partAmortissment, 2) . "</td><td>" . round($capitalRestant, 2) . "€ </td><td>" . round($mensualite, 2) . "</td></tr>";
            $numMois ++;
        } 
        
        while ($numMois <= $this->nbMois); 
        $chaine .= "</tbody></table>";
        return $chaine;
    }

    public function getTableauAmortissement():array
    {
        $data=array();
        $partInteret = 0;
        $partAmortissement = 0;
        $mensualite =  $this->calculMensualite();
        $capitalRestant=$this->capital;
    
        for ($i=0; $i < $this->nbMois ; $i++) { 

        if($i>0){
            $capitalRestant-=$partAmortissement;
        }

        $partInteret=$capitalRestant*$this->tauxMensuel;
        $partAmortissement=$mensualite-$partInteret;
        array_push($data, ["num_mois"=>$i+1,"partInteret"=>round($partInteret,2),"partAmortissement"=>round($partAmortissement),"capital_restant"=>round($capitalRestant,2),"mensualite"=>round($mensualite) ]);
    }

    return $data;

    }

}
