<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
$message = ""; // Initialize the message variable

if (isset($_GET['id'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Fetch the existing data
    $query = "SELECT `couleur`, `groupe_couleur` FROM `ref` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $editId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $couleur, $groupe_couleur);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['Submit'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Extract new values from POST data
    $newcouleur = $_POST['couleur'];
    $groupe_couleur = $_POST['groupe_couleur'];

    // Update query
    $updateQuery = "UPDATE `ref` SET `couleur` = ?, `groupe_couleur` = ? WHERE `id` = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $updateQuery);

    // Bind parameters
    mysqli_stmt_bind_param(
        $stmt, 
        "ssi", 
        $newcouleur, 
        $groupe_couleur,
        $editId
    );

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        $alertClass = 'alert-success';
            $message = "couleur modifi&eacute; avec succ&eagrave;s";
    } else {
       $alertClass = 'alert-danger';
            $message = "Erreur lors de modification du couleur : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
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





	<label class="form-label" style="color: #4682B4;">Modifier couleur</label>
        <div class="d-flex justify-content-between align-items-center ">
              <div class="row mb-3">

        <div class="col">
          <label  class="form-label">couleur</label>
          <input type="text" class="form-control"   name = "couleur" value="<?php echo $couleur ?>">
          </div>
		  <div class="col">
          <label  class="form-label">Groupe couleur</label>
          <input type="text" class="form-control"   name = "groupe_couleur" value="<?php echo $groupe_couleur ?>">
          </div>
	  
	</div>
            <div class="m-3">
                <input type="submit" name="Submit" class="btn btn-primary  rounded-2" value="Modifier">
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