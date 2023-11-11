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
    $query = "SELECT  `couleur` FROM `ref` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $editId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $couleur);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['Submit'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Extract new values from POST data
    $newcouleur = $_POST['couleur'];

    // Update query
    $updateQuery = "UPDATE `ref` SET `couleur` = ? WHERE `id` = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $updateQuery);

    // Bind parameters
    mysqli_stmt_bind_param(
        $stmt, 
        "si", 
        $newcouleur, 
        $editId
    );

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        $message = "Record updated successfully.";
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('index.php');</script>";
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




	<label class="form-label">couleur</label>
        <div class="d-flex justify-content-between align-items-center ">
            
    <input type="text" class="form-control m-3" name="couleur"  value="<?php echo $couleur ?>">
            <div class="m-3">
                <input type="submit" name="Submit" class="btn btn-primary  rounded-2" value="Modifier">
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