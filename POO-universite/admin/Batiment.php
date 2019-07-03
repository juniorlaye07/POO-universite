<?php
     class Batiment{
         private $Id_batiment;
         public function __construct($Id_batiment){
           $this->Id_batiment = $Id_batiment;
         }

         /**
          * Get the value of Id_batiment
          */ 
         public function getId_batiment()
         {
                  return $this->Id_batiment;
         }

         /**
          * Set the value of Id_batiment
          *
          * @return  self
          */ 
         public function setId_batiment($Id_batiment)
         {
                  $this->Id_batiment = $Id_batiment;

                  return $this;
         }
        }
?>