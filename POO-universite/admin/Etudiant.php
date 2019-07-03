<?php
    class Etudiant{
        private $Matricule;
        private $Nom;
        private $Prenom;
        private $Tel;
        private $Email;
        private $Date_naissance;
        public function __construct($Matricule,$Nom,$Prenom,$Tel,$Email,$Date_naissance){
            
            $this->Matricule = $Matricule;
            $this->Nom = $Nom;
            $this->Prenom = $Prenom;
            $this->Tel = $Tel;
            $this->Email = $Email;
            $this->Date_naissance = $Date_naissance;
            
        }
    
        public function getMatricule(){
            return $this->Matricule;
        }
        public function setMatricule(){
            $this->Matricule = $Matricule;
        }
        public function getNom(){
            return $this->Nom;
        }
        public function setNom(){
            $this->Nom = $Nom;
        }
        public function getPrenom(){
            return $this->Prenom;
        }
        public function setPrenom(){
            $this->Prenom = $Prenom;
        }public function getTel(){
            return $this->Tel;
        }
        public function setTel(){
            $this->Tel = $Tel; 
        }
        public function getEmail(){
            return $this->Email;
        }
        public function setEmail(){
            $this->Email = $Email;
        }
        public function getDate_naissance(){
            return $this->Date_naissance;
        }
        public function setDate_naissance(){
            $this->Date_naissance = $Date_naissance;
        }
    }
?>