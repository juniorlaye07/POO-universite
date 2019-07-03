<?php
    class Boursier extends Etudiant{
        private $Id_Type;
        public function __construct($Matricule="",$Nom="",$Prenom="",$Tel="",$Email="",$Date_naissance="",$Id_Type=""){
            parent::__construct($Matricule,$Nom,$Prenom,$Tel,$Email,$Date_naissance);
            $this->Id_Type = $Id_Type;
            
        }
        /**
         * Get the value of Id_Type
         */ 
        public function getId_Type()
        {
                return $this->Id_Type;
        }

        /**
         * Set the value of Id_Type
         *
         * @return  self
         */ 
        public function setId_Type($Id_Type)
        {
                $this->Id_Type = $Id_Type;

                return $this;
        }
    }
?>