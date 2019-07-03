<?php
     class NonBoursier extends Etudiant{
         private $Adresse;
         public function __construct($Matricule="",$Nom="",$Prenom="",$Tel="",$Email="",$Date_naissance="",$Adresse=""){
             parent::__construct($Matricule,$Nom,$Prenom,$Tel,$Email,$Date_naissance);
             $this->Adresse = $Adresse;
         }
         /**
          * Get the value of Adress
          */ 
         public function getAdresse()
         {
                  return $this->Adresse;
         }

         /**
          * Set the value of Adress
          *
          * @return  self
          */ 
         public function setAdresse($Adresse)
         {
                  $this->Adresse = $Adresse;

                  return $this;
         }
     }
 ?>