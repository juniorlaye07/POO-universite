<?php
    class Type{
        private $Libelle;
        private $Montant;
    
    public function __construct($Libelle,$Montant){
        $this->Libelle = $Libelle;
        $this->Montant = $Montant;
    }
    public function getLibelle(){
        return $this->Libelle;
    }
    public function setLibelle(){
        $this->Libelle = $Libelle;

    }
     public function getMontant(){
        return $this->Montant;
    }
    public function setMontant(){
        $this->Montant = $Montant;

    }
}
?>