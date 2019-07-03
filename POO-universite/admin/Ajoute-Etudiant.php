<?php
      function chargerClass($classe){
            require $classe.".php";
            }
            spl_autoload_register('chargerClass');
         
         
            $BaseD = new PDO('mysql:host=127.0.0.1;dbname=Universite','root','salimata09!');
            $BaseD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $gestion = new EtudiantService($BaseD);
            $Matricule=rand(0,70000);
             
              
?>
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
    </head>
    
     <body style="background-image:url(about-lg.jpg)">
        <h1 class="text-logo"><span></span>Inscription:<span ></span></h1>
          <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter Etudiant:</strong>
                 </strong><a href="listeLogers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Logers</a>
                 </strong><a href="listeBoursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Boursiers</a>
                 </strong><a href="listeNonboursiers.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Non Boursiers</a>
                 </strong><a href="index.php/../.." class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon"></span> Etudiants</a>
                 </strong><a href="Recherche.php" class="btn btn-primary btn-lg" style="background-color: #218095"><span class="glyphicon glyphicon-plus"></span> Recherche</a></h1>
 

          
                <form class="form" action="#" role="form" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control"  name="Nom" placeholder="Nom" >
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Prenom:</label>
                        <input type="text" class="form-control"  name="Prenom" placeholder="Prenom" >
                        <span class="help-inline"></span>
                    </div><div class="form-group">
                        <label for="name">Tel:</label>
                        <input type="number" class="form-control"  name="Tel" placeholder="Tel" >
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" class="form-control"  name="Email" placeholder="Email" >
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Date_naissance:</label>
                        <input type="date" class="form-control"  name="Date_naissance" placeholder="Date_naissance">
                        <span class="help-inline"></span>
                    </div>
<!--=============Debut boutons radios=========================================£================================================================================-->
                        <p>
                          <div>
                          <input type="radio" id="B" name="Bourse"  value="Boursier" placeholder="">
                          <label for="">Boursiers</label>
                          </div>
                          <div id="nobr">
                            <input type="radio" id="nb" name="Bourse" value="NBoursier">
                            <label for="">Non-Boursiers</label>
                          </div>
                        </p>
                        <hr class="my-4">
                        <div id="idnobourse">
                          <input type="text" name="Adresse" id="titre"  class="form-control" placeholder="Adresse">
                        </div>
                        <p>
                          <div id="lnl">
                            <input type="radio" id="l" name="loger" value="Loger"  placeholder="">
                            <label for="">Loger</label>
                            <div id="nolog">
                              <input type="radio" id="nl" name="loger" value="noLoger" >
                              <label for="">Non-Loger</label>
                            </div>
                          </div>
                        </p>
                        <div id="idloger">
                         <label for="">Chambres</label>
                          <?php
                          

                  echo '<select name="chambre" id="" class="form-control">
                  <option value=""></option>';
                      $requette=$BaseD->query("SELECT *FROM Chambre");
                          while($tablecham=$requette->fetch())
                          {
                            echo'<option value="'.$tablecham['NChambre'].'">'.$tablecham['NChambre'].'</option>';
                          }
                  echo'</select><br>';    
                    ?> 
                          <div>
                            <label for="">Batiments</label>
                          <?php
                  echo '<select name="bat" id="" class="form-control">
                  <option value=""></option>';
                       $requette=$BaseD->query("SELECT *FROM Batiment");
                          while($tablecham=$requette->fetch())
                          {
                            echo'<option value="'.$tablecham['Id_batiment'].'">'.$tablecham['NomBat'].'</option>';
                          }
                  echo'</select><br>';    
                    
                     ?>
                          </div>
                        </div>

                        <div id="idbourse">
                          <label for="">Type-Bourse</label>
                          <?php
                  echo '<select name="Type" id="" class="form-control">
                  <option value=""></option>';
                    $requette=$BaseD->query("SELECT *FROM TypeB");
                          while($tabletype=$requette->fetch())
                          {
                            echo'<option value="'.$tabletype['Id_Type'].'">'.$tabletype['Libelle'].'</option>';
                          }
                  echo'</select><br>';    
                    ?> 
                        </div>
<!--==============Fin bouton radio=============================================£=======================================================================-->
                <div class="form-actions">
                      <button type="submit" class="btn btn-success" name="enregistrer"><span class="glyphicon glyphicon-pencil"></span> Enregistrer</button>
                      <a href="index.php/../.." class="btn btn-primary" style="background-color: #218095"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                </div>
            </form>
                <script src="foradio.js"></script>
            </div>
        </div> 
        <?php
            if (isset($_POST['enregistrer'])) {
              if (!empty($_POST['Adresse']))
            {
                $apprenant=new NonBoursier($Matricule,$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['Date_naissance'],$_POST['Adresse']);
            }
            else if (!empty($_POST['Type']) && empty($_POST['chambre'])) 
            {
                       $apprenant=new Boursier($Matricule,$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['Date_naissance'],$_POST['Type']);
            }
            else
              {
                $apprenant=new Loger($Matricule,$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['Date_naissance'],$_POST['Type'],$_POST['chambre']);
              }
            $gestion->add($apprenant);
           }
      ?>  
    </body>
</html>