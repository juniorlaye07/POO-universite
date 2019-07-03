 <?php
    class EtudiantService{
        private $BaseD;
        public function __construct($BaseD){
              $this->setDb($BaseD);
        }
//Ajouter un Etudiant============================£===============================================================================================================================£
        public function add(Etudiant $apprenant) {
        $jr = $this->BaseD->prepare('INSERT INTO Etudiant(Matricule,Nom,Prenom,Tel,Email,Date_naissance) value(?,?,?,?,?,?)');
        $jr->execute(array($apprenant->getMatricule(),$apprenant->getNom(),$apprenant->getPrenom(),$apprenant->getTel(),$apprenant->getEmail(),$apprenant->getDate_naissance()));
        

        $requet=$this->BaseD->query("SELECT max(Id_Etudiant) as Id_Etudiant  FROM Etudiant;");
         while($donnes=$requet->fetch()){
        $Id=$donnes['Id_Etudiant'];
         }
        if(get_class($apprenant)=="NonBoursier")
        {
         $requet = $this->BaseD->prepare("INSERT INTO Non_boursier (Id_Etudiant,Adresse) value (?,?)");
         $requet->execute(array($Id,$apprenant->getAdresse()));
        }
        elseif(get_class($apprenant)=="Boursier" || get_class($apprenant)=="Loger")
        {
          $requet = $this->BaseD->prepare("INSERT INTO Boursiers (Id_Etudiant,Id_Type) value (?,?)");
          $requet->execute(array($Id,$apprenant->getId_Type()));
       
        if (get_class($apprenant)=="Loger") 
        {
          
          $requet = $this->BaseD->prepare("INSERT INTO Loger (Id_Etudiant,NChambre) value (?,?)");
          $requet->execute(array($Id,$apprenant->getNChambre()));
         }
       
        }
       
       
      }

        public function setDb(PDO $BaseD){
           $this->BaseD=$BaseD;
        }
       
//Lister tous les Etudiants=================================£=============================================================================================================£
        public function findAll(){
        $requet=$this->BaseD->query("SELECT * FROM Etudiant");
        $requet->execute();
        return $requet->fetchAll(PDO::FETCH_OBJ);
        }
      
//Lister tous les Etudiants Boursiers===========================£======================================================================================================£
        public function findAllBoursier(){
         $requet=$this->BaseD->query("SELECT * FROM  Etudiant,TypeB,Boursiers  where Etudiant.Id_Etudiant=Boursiers.Id_Etudiant and Boursiers.Id_Type = TypeB.Id_Type");
         $requet->execute();
        return $requet->fetchAll(PDO::FETCH_OBJ);
        }

//Lister tous les Etudiants logés==========================================£===========================================================================================================================================================================================================£
        public function findAllLoger(){
            $requet=$this->BaseD->query("SELECT Matricule,Nom,Prenom,Tel,Email,Date_naissance,Loger.NChambre,NomBat FROM Etudiant,Loger,Chambre,Batiment where Loger.Id_Etudiant=Etudiant.Id_Etudiant AND Loger.NChambre=Chambre.NChambre AND Batiment.Id_batiment=Chambre.Id_batiment");
            $requet->execute();
        return $requet->fetchAll(PDO::FETCH_OBJ);
        }
   
//Lister tous les Etudiants Non Boursiers===================================£==========================================================================================£
        public function findAllNon_boursier(){
         $requet=$this->BaseD->query("SELECT * FROM  Etudiant,Non_boursier  where Etudiant.Id_Etudiant=Non_boursier.Id_Etudiant");
         $requet->execute();
        return $requet->fetchAll(PDO::FETCH_OBJ);
        }

//==Statut d'un Etudiant================================£=========================================================================================================================================================================================================================================================================================================================================£     
        public function checkStatut(){
        $requet= $this->BaseD->query("SELECT * FROM Etudiant WHERE Matricule='".$Mat."'"); 
                        while($donnes=$requet->fetch()){
                          $idEtudiant=$donnes['Id_Etudiant'];
                        }
        $requet= $this->BaseD->query("SELECT Nom,NChambre,Libelle FROM Etudiant,Loger,Boursiers,TypeB  where  Boursiers.Id_Etudiant ='".$idEtudiant."' Or Loger.Id_Etudiant='".$idEtudiant."' AND Etudiant.Id_Etudiant='".$idEtudiant."'");
        $requet->execute();
        return $requet->fetchAll(PDO::FETCH_OBJ);
        }
   }
 ?>
