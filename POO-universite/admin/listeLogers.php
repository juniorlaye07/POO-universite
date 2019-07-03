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
        <h1 class="text-logo"><span ></span> Liste des Logers <span ></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Logers:   </strong><a href="Ajoute-Etudiant.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon-plus"></span> Ajouter Etudiants</a>
                </strong><a href="listeBoursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Boursiers</a>
                 </strong><a href="listeNonboursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Non Boursiers</a>
                 </strong><a href="index.php/../.." class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Etudiants</a>
                  </strong><a href="Recherche.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon-plus"></span> Recherche</a></a></h1>

               <table id="listlog" class="table table-striped table-bordered" >
                  <thead >  
                    <tr>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Tel</th>
                      <th>Email</th>
                      <th>Date_naissance</th>
                      <th>Logements</th>
                      <th>Batiments</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     function chargerClass($classe){
                       require $classe.".php";
                         }
                       spl_autoload_register('chargerClass');
                          
                        $BaseD = new PDO('mysql:host=127.0.0.1;dbname=Universite','root','salimata09!');
                        $BaseD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $gestion= new EtudiantService($BaseD);

                      
                      foreach($gestion->findAllLoger() as $apprenant) 
                      {
                         echo'<tr>
                         <td> AL'. $apprenant->Matricule.'</td>
                         <td>'. $apprenant->Nom.'</td>
                         <td>'. $apprenant->Prenom.'</td>
                         <td>'. $apprenant->Tel.'</td>
                         <td>'. $apprenant->Email.'</td>
                         <td>'. $apprenant->Date_naissance.'</td> 
                         <td>'. $apprenant->NChambre.'</td> 
                         <td>'. $apprenant->NomBat.'</td> 
                        </tr>';
                    }   
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#listlog').DataTable();
    } );
</script>