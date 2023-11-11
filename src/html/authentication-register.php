<?php
session_start();
include("../db.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter un compte</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
               
      <form>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" aria-describedby="textHelp">
  </div>
  <div class="col-md-6 mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenom" aria-describedby="textHelp">
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="matricule" class="form-label">Matricule</label>
    <input type="number" class="form-control" id="matricule" aria-describedby="numberHelp">
  </div>

    <div class="col-md-6 mb-3">
    <label for="mdp" class="form-label">Mot de Passe</label>
    <input type="password" class="form-control" id="mdp">
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="departement" class="form-label">Département</label>
    <select id="departement" class="form-select" >
	
	<option value="Qualité">Qualité</option>
	<option value="Production">Production</option>
     
    </select>
  </div>
  <div class="col-md-6 mb-3">
    <label for="fonction" class="form-label">Fonction</label>
    <select id="fonction" class="form-select">
	<option value="operateur-preparation">Pr&eacute;paration</option>
	<option value="operateur-sfaldina">Sfaldina</option>
    <option value="	operateur-teinture">Teinture</option>
	<option value="operateur-essorage">Essorage</option>
	<option value="operateur-sechoire">S&eacute;choire</option>
	<option value="	operateur-rameuse">Rameuse</option>
	<option value="operateur-labo">Labo</option>
    </select>
  </div>
</div>




  <a type="submit" name="Submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Ajouter</a>
  

	  <?php
						
                        if (isset($_POST['Submit'])) {
							$qer = mysql_query("SELECT matricule FROM `compte` where matricule='$_POST[matricule]'");
                            if (mysql_num_rows($qer) >= 1) {
                                echo "<script>alert(\"Utilisateur Existe deja\");window.location.replace('compte.php');</script>";
                            } else {
                                $req2 = "INSERT INTO `compte` VALUES ('','$_POST[nom]','$_POST[prenom]','$_POST[matricule]','$_POST[pwd]','$_POST[departement]','$_POST[prev]')";
                                $req22 = mysql_query($req2);
								echo "<script>alert(\"Utilisateur ajouter avec succes\");window.location.replace('compte.php');</script>";
                            }
                        }
       ?>



  </div>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>