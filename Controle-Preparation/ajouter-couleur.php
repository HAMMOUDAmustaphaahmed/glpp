<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
$message = ""; // Initialize the message variable

if (isset($_POST['Submit'])) {
    $couleur = strtoupper($_POST['couleur']);
	$groupe_couleur = strtoupper($_POST['groupe_couleur']);
    

    $query = "SELECT * FROM `ref` WHERE couleur='$couleur'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        $message = "couleur D&eacute;ja existe !!!";
    } else {
        $insertQuery = "INSERT INTO `ref` (couleur, groupe_couleur) VALUES ('$couleur', '$groupe_couleur')";
        if (mysqli_query($conn, $insertQuery)) {
            $message = "couleur ajout\u00e9 avec succ\u00e8s";
        } else {
            $message = "Erreur lors de l'ajout d'couleur : " . mysqli_error($conn);
        }
    }
}

// Afficher l'alerte
echo '<div class="alert ' . $alertClass . ' fixed-top-right" role="alert" style="display: none;">';
echo $message;
echo '</div>';

// Afficher l'alerte avec un d\u00e9lai de 2 secondes (2000 millisecondes)
echo '<script>';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "block"; }, 200);';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "none"; }, 20000);'; // Masquer apr\u00e8s 10 secondes
echo '</script>';
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter un couleur</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
     <style>
        /* Style pour les alertes empil\u00e9es en haut à droite */
        .fixed-top-right {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
        }
    </style>
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
                <a href="./mod.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../src/assets/images/logos/benetton.png" width="180" alt="">
                </a>
       
     <form  name=calform method="post" action="" class="StyleForm" enctype="multipart/form-data">
	  <div id="messageDiv" class="info_div">
 
    </div>




	<label class="form-label" style="color: #4682B4;">Couleur</label>
        <div class="d-flex justify-content-between align-items-center ">
		              <div class="row mb-3">

        <div class="col">
          <label  class="form-label">Couleur</label>
          <input type="text" class="form-control"  placeholder="Saisie Code Couleur" name = "couleur" required>
          </div>
		  <div class="col">
          <label  class="form-label">Groupe Couleur</label>
          <input type="text" class="form-control"  placeholder="Saisie Groupe Couleur" name = "groupe_couleur" required>
          </div>
	  
	</div>
            
 
            <div class="m-3">
                <input type="submit" name="Submit" class="btn btn-primary  rounded-2" value="Ajouter">
            </div>
        </div>
		








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