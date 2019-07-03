<!DOCTYPE html>
<html>
    <head>
        <title>Coding'School</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles.css">
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="buttons.bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
    </head>
    
    <body style="background-image:url(about-lg.jpg)">
        <h1 class="text-logo"><span ></span> Recherche Etudiant: <span ></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Recherche:   </strong><a href="Ajoute-Etudiant.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon-plus"></span> Ajouter Etudiants</a>
                </strong><a href="listeLogers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Logers</a>
                 </strong><a href="listeBoursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Boursiers</a>
                 </strong><a href="listeNonboursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Non Boursiers</a>
                 </strong><a href="index.php/../.." class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon-plus"></span> Etudiants</a></h1>
          
                  <form class="form" action="Recherche.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Matricule:</label>
                        <input type="text" class="form-control" id="name" name="Matricule"  placeholder="Matricule">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-actions">
                        <button type="submit"  name="recherche" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Chercher</button>
                        <a class="btn btn-primary" href="index.php/../.."><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                  </form>
                  <?php
                     function chargerClass($classe){
                       require $classe.".php";
                         }
                       spl_autoload_register('chargerClass');

                        $BaseD = new PDO('mysql:host=127.0.0.1;dbname=Universite','root','salimata09!');
                        $BaseD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $gestion= new EtudiantService($BaseD);
                        if(isset($_POST["recherche"])){
                          $Mat=$_POST["Matricule"];
//=================verification par matricule============================£============================================================================================================================================================================================================================================================================================================================//£
                        $reque= $BaseD->query("SELECT * FROM Etudiant WHERE Matricule='".$Mat."'"); 
                        while($donnes=$reque->fetch()){
                          $idEtudiant=$donnes['Id_Etudiant'];
                        }
                         
//=====Cherche un loger===================================================£============================================================================================================================================================================================================================================================================================================================//£
                        $requetlog=$BaseD->query("SELECT Matricule,Nom,Prenom,Tel,Email,Date_naissance,Libelle ,Loger.NChambre,NomBat FROM Etudiant,Loger,Chambre,Batiment,Boursiers,TypeB WHERE Loger.Id_Etudiant='".$idEtudiant."' AND Etudiant.Id_Etudiant='".$idEtudiant."'  AND Batiment.Id_batiment=Chambre.Id_batiment AND Loger.NChambre=Chambre.NChambre AND Boursiers.Id_Type=TypeB.Id_Type");
                        $requetlog->execute();
                        $requetb= $BaseD->query("SELECT Matricule,Nom,Prenom,Tel,Email,Date_naissance,Libelle FROM Etudiant,Boursiers,TypeB,Loger  where Boursiers.Id_Type=TypeB.Id_Type  AND Boursiers.Id_Etudiant ='".$idEtudiant."' AND Etudiant.Id_Etudiant='".$idEtudiant."' AND Loger.Id_Etudiant<>'".$idEtudiant."'  ");
                        $requetb->execute();
                          
                        if ( $requetb->execute()==true ||  $requetlog->execute()==false ) {

                           while($apprenant=$requetb->fetch()){
                             ?>
                         </tbody>
                         </table>
                         <table class="table table-striped table-bordered" >
                         
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                          </thead>
                           <tbody>
                           <?php
                            
                           echo'<tr>
                        
                         <td>'. $apprenant['Matricule'].'</td>
                         <td>'. $apprenant['Nom'].'</td>
                         <td>'. $apprenant['Prenom'].'</td>
                         <td>'. $apprenant['Tel'].'</td>
                         <td>'. $apprenant['Email'].'</td>
                         <td>'. $apprenant['Date_naissance'].'</td>
                         <td>'. $apprenant['Libelle'].'</td>';
                          break;
                          } 
                        
                       if($requetlog->execute()==true){
                          while($apprenant=$requetlog->fetch()){
                              ?>
                              </tbody>
                                 
                        <table border=1 class="table table-striped table-bordered" >
                      
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                            <th>NºChambres</th>
                            <th>Batiments</th>
                          </thead>
                           <tbody>
                          <?php
                        echo'<tr>
                        
                         <td>'. $apprenant['Matricule'].'</td>
                         <td>'. $apprenant['Nom'].'</td>
                         <td>'. $apprenant['Prenom'].'</td>
                         <td>'. $apprenant['Tel'].'</td>
                         <td>'. $apprenant['Email'].'</td>
                         <td>'. $apprenant['Date_naissance'].'</td>
                         <td>'. $apprenant['Libelle'].'</td>
                         <td>'. $apprenant['NChambre'].'</td> 
                         <td>'. $apprenant['NomBat'].'</td> ';
                             
                          break;
                          }
                        }
                      }
//=====Cherche un boursier================================================£==================================================================================================//£
                           
//====Cherche un non boursier========================================================£===================================================================================================================================================//£
                      
                        $requetnob=$BaseD->query("SELECT Matricule,Nom,Prenom,Tel,Email,Date_naissance,Adresse FROM Etudiant,Non_boursier WHERE  Non_boursier.Id_Etudiant='".$idEtudiant."' AND Etudiant.Id_Etudiant='".$idEtudiant."'");
                          while($apprenant=$requetnob->fetch()){
                              ?>
                        </tbody>
                        </table> 
                             <table  class="table table-striped table-bordered" >
                               
                              <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Adresse</th>
                             </tr>
                          </thead>
                          <tbody>
                             <?php
                          
                        echo'<tr>
                        
                         <td>'. $apprenant['Matricule'].'</td>
                         <td>'. $apprenant['Nom'].'</td>
                         <td>'. $apprenant['Prenom'].'</td>
                         <td>'. $apprenant['Tel'].'</td>
                         <td>'. $apprenant['Email'].'</td>
                         <td>'. $apprenant['Date_naissance'].'</td>
                         <td>'. $apprenant['Adresse'].'</td> 
                         </tr>';

                          break;
                          }
//===Fin Recherche===========================================£==============================================================================================================================//£
                        }
                     
                    ?>
                          </tbody>
                          </table>
                          
            </div>
        </div>
    </body>
</html>
