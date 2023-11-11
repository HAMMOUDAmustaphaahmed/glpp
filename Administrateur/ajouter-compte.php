<?php
session_start();
include("db.php");

$message = ""; // Initialize the message variable

if (isset($_POST['Submit'])) {
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']); // Corrected attribute name
    $department = mysqli_real_escape_string($conn, $_POST['departement']);
    $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $prev = mysqli_real_escape_string($conn, $_POST['prev']);

    $query = "SELECT * FROM `compte` WHERE matricule='$matricule'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        $message = "Utilisateur Déjà existe !!!";
    } else {
        $insertQuery = "INSERT INTO `compte` (nom, prenom, departement, matricule, pwd, prev) VALUES ('$nom', '$prenom', '$department', '$matricule', '$pwd', '$prev')";
        if (mysqli_query($conn, $insertQuery)) {
            $message = "Utilisateur ajouté avec succès";
        } else {
            $message = "Erreur lors de l'ajout d'utilisateur : " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('ajouter-compte.php');</script>";
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter un compte</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
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
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../src/assets/images/logos/benetton.png" width="180" alt="">
                </a>
       
     <form  name=calform method="post" action="" class="StyleForm" enctype="multipart/form-data">
	  <div id="messageDiv" class="info_div">
        <?php echo $message; ?>
    </div>

<?php echo $jsCode; ?>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" id="nom" aria-describedby="textHelp">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="textHelp">
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Matricule</label>
    <input type="number" class="form-control"  name="matricule"  id="matricule" aria-describedby="numberHelp">
  </div>

    <div class="col-md-6 mb-3">
    <label  class="form-label">Mot de Passe</label>
    <input type="password"  name="pwd" class="form-control" id="mdp">
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label  class="form-label">D&eacute;partement</label>
    <select id="departement" name="departement" class="form-select" >
	<option value="Qualite">Qualit&eacute;</option>
	<option value="Production">Production</option>
     
    </select>
  </div>
  <div class="col-md-6 mb-3">
    <label  class="form-label">Fonction</label>
    <select id="fonction" name="prev" class="form-select">
	<option value="operateur-preparation">Pr&eacute;paration</option>
	<option value="operateur-sfaldina">Sfaldina</option>
    <option value="operateur-teinture">Teinture</option>
	<option value="operateur-essorage">Essorage</option>
	<option value="operateur-spazzolato">Spazzolato</option>
	<option value="operateur-sechoire">S&eacute;choire</option>
	<option value="operateur-rameuse">Rameuse</option>
	<option value="operateur-labo">Labo</option>
    </select>
  </div>
</div>




  <input type="submit" name="Submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Ajouter">






  </div>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>