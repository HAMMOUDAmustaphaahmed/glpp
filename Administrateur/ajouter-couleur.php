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
    

    $query = "SELECT * FROM `ref` WHERE couleur='$couleur'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        $message = "couleur D\u00e9ja existe !!!";
    } else {
        $insertQuery = "INSERT INTO `ref` (couleur) VALUES ('$couleur')";
        if (mysqli_query($conn, $insertQuery)) {
            $message = "couleur ajout\u00e9 avec succ\u00e8s";
        } else {
            $message = "Erreur lors de l'ajout d'couleur : " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('ajouter-couleur.php');</script>";
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter un couleur</title>
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
                <a href="./mod.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../src/assets/images/logos/benetton.png" width="180" alt="">
                </a>
       
     <form  name=calform method="post" action="" class="StyleForm" enctype="multipart/form-data">
	  <div id="messageDiv" class="info_div">
 
    </div>




	<label class="form-label">Couleur</label>
        <div class="d-flex justify-content-between align-items-center ">
            
    <input type="text" class="form-control m-3" name="couleur" placeholder="Saisie Code couleur" >
            <div class="m-3">
                <input type="submit" name="Submit" class="btn btn-primary  rounded-2" value="Ajouter">
            </div>
        </div>
		



<?php echo $jsCode; ?>






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