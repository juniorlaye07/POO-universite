<?php
     class Loger extends Boursier{
          private $NChambre;
          public function __construct($Matricule="",$Nom="",$Prenom="",$Tel="",$Email="",$Date_naissance="",$Id_Type,$NChambre){
              parent::__construct($Matricule,$Nom,$Prenom,$Tel,$Email,$Date_naissance,$Id_Type);
              
              $this->NChambre = $NChambre;
             
          }
          /**
           * Get the value of NChambre
           */ 
          public function getNChambre()
          {
                    return $this->NChambre;
          }
          /**
           * Set the value of NChambre
           *
           * @return  self
           */ 
          public function setNChambre($NChambre)
          {
                    $this->NChambre = $NChambre;

                    return $this;
          }
     }
?>