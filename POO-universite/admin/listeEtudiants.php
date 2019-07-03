<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="css/styl.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" id="bootstrap-css" />
  <link rel="stylesheet" href="Datatable/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="buttons.bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="buttons.bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
  
  <title>Liste Etudiants</title>
</head>



    <body>
          <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Listes des Etudiants <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des items   </strong><a href="Ajoute-Etudiant.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
           <table id="etudiant" class="table table-striped table-bordered" >
                  <thead >  
                    <tr>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Tel</th>
                      <th>Email</th>
                      <th>Date_naissance</th>
                    </tr>
                  </thead>
                
                    <?php
                     function chargerClass($classe){
                       require $classe.".php";
                         }
                       spl_autoload_register('chargerClass');
                          
                        $BaseD = new PDO('mysql:host=127.0.0.1;dbname=Universite','root','salimata09!');
                        $BaseD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $gestion= new EtudiantService($BaseD);

                      
                      foreach($gestion->findAll() as $apprenant) 
                      {
                         echo'<tr>
                         <td> AE'. $apprenant->Matricule.'</td>
                         <td>'. $apprenant->Nom.'</td>
                         <td>'. $apprenant->Prenom.'</td>
                         <td>'. $apprenant->Tel.'</td>
                         <td>'. $apprenant->Email.'</td>
                         <td>'. $apprenant->Date_naissance.'</td> 
                        </tr>';
                    }   
                    ?>
                 
                </table>
            </div>
        </div>
    </body>
</html>
<script>
   
   
$(document).ready(function () {
    $('#etudiant').DataTable();
});
  

</script>