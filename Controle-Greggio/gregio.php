<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
$message = ""; // Initialize a variable to store messages

if (isset($_POST['Submit'])) {
   
    $article = mysqli_real_escape_string($conn, $_POST['article']);
    $fournisseur = mysqli_real_escape_string($conn, $_POST['fournisseur']);
    $lotfournisseur =mysqli_real_escape_string($conn, $_POST['lotfournisseur']);
    $lotinterne  = mysqli_real_escape_string($conn, $_POST['lotinterne']);
    $datearrivage = mysqli_real_escape_string($conn, $_POST['datearrivage']);
    $machine = mysqli_real_escape_string($conn, $_POST['machine']);
    $lfa1 = mysqli_real_escape_string($conn, $_POST['lfa1']);
    $lfa2 = mysqli_real_escape_string($conn, $_POST['lfa2']);
    $lfa3 = mysqli_real_escape_string($conn, $_POST['lfa3']);
    $poids = mysqli_real_escape_string($conn, $_POST['poids']);
    $largeur = mysqli_real_escape_string($conn, $_POST['largeur']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $testteinture = mysqli_real_escape_string($conn, $_POST['testteinture']);
    $date_control = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $facture = mysqli_real_escape_string($conn, $_POST['facture']);


        $queryInsert = "INSERT INTO `greggio` (article, fournisseur, lotfournisseur, lotinterne, datearrivage, machine, lfa1, lfa2, lfa3, poids, largeur, note, testteinture, date_control,facture) VALUES
		('$article', '$fournisseur', '$lotfournisseur', '$lotinterne', '$datearrivage', '$machine', '$lfa1', '$lfa2', '$poids', '$lfa3', '$largeur', '$note', '$testteinture','$date_control','$facture')";
    
    if (mysqli_query($conn, $queryInsert)) {
		    $alertClass = 'alert-success';
    $message = "Dispo cr&eacute;e avec succ&egrave;s";
        $success = true;
    } else {
		   $alertClass = 'alert-danger';
    $message = "Erreur lors de l'insertion " . mysqli_error($conn);
        $success = false; // L'insertion a échoué, mettre la variable de drapeau à false
        break; // Sortir de la boucle en cas d'erreur
    }


}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


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


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle Greggio</title>
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
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <img src="../src/assets/images/logos/benetton.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
                   <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Liste Greggio</span>
              </a>
         </li>            
        
        
   
     
        
          </ul>
    <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary">LOG OUT</a>
  </div>
  
        </nav>
				
        <!-- End Sidebar navigation -->

      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <div class="container-fluid">
              <div class="card">
                <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajouter Greggio </h5>
			
  <form method="post">
  <div class="my-3"></div>
  <h5 style="color: #4682B4;">Identification Du Lot</h5>

  <div class="my-3"></div>
  <div class="row mb-3">
      
          <div class="col">
    <label  class="form-label">Article</label>
    <select  class="form-select" name ="article"required>
<?php

// Construct and execute a SQL query to fetch "dispos" where "date_heure_pesage" is within the next 24 hours
$sql = "SELECT DISTINCT article FROM  `REF` where article <>'' ";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
echo "<option value='$article'>&nbsp;</option>";
    while ($row = $result->fetch_assoc()) {
        $article = $row['article'];
        echo "<option value='$article'>$article</option>";
    }
} else {
    echo "<option value=''>No Article found</option>";
}

// Close the database connection

?>
    </select>
  </div>
	  <div class="col">
  <label class="form-label">Fournisseur</label>
  <select  class="form-select" name = "fournisseur"  >

    <option></option>
    <option>GULLE</option>
	<option>KARA</option>
	<option>KASAR</option>
	<option>SANKO</option>
	<option>TOPEKA</option>
  </select>
</div>


<div class="col">

  <label  class="form-label">Lot Fournisseur</label>
  <input type="text" class="form-control"   name = "lotfournisseur"  >
</div>

	  <div class="col">
  <label class="form-label">Lot Interne</label>
  <select  class="form-select" name = "lotinterne"  >

    <option>&nbsp;</option>
    <option>A</option>
	<option>B</option>
	<option>C</option>
	<option>D</option>
	
  </select>
</div>
<div class="col">
  <label  class="form-label">Facture</label>
  <input type="text" class="form-control"   name = "facture" >
</div>
<div class="col">
<label  class="form-label">Date Arrivage</label>
            <input type="date" id="Date" class="form-control" name="datearrivage">
        </div>
		</div>
		<div class="my-3"></div>
 <h5 style="color: #4682B4 ;">Information Technique </h5>	
 <div class="my-3"></div>

<div class="row mb-3">
<div class="col">
  <label  class="form-label">Machine</label>
  <input type="text" class="form-control"   name = "machine" >
</div>
  <div class="col">
  <label  class="form-label">LFA (1 fibre)</label>
  <input type="text" class="form-control"   name = "lfa1" >
</div>
  <div class="col">
  <label  class="form-label">LFA (2 fibres)</label>
  <input type="text" class="form-control"   name = "lfa2" >
</div>
  <div class="col">
  <label  class="form-label">LFA (3 fibres)</label>
  <input type="text" class="form-control"   name = "lfa3" >
</div>
  <div class="col">
  <label  class="form-label">Poids (g / m²)</label>
  <input type="text" class="form-control"   name = "poids" >
</div>
  <div class="col">
  <label  class="form-label">Largeur (cm)</label>
  <input type="text" class="form-control"   name = "largeur" >
</div>
</div>
<div class="my-2"></div>
 <h5 style="color: #4682B4;">Test</h5>
 <div class="my-2"></div>
<div class="row mb-3">
<div class="col">
  <label  class="form-label">Dispo Test</label>
  <input type="text" class="form-control"   name = "dispo_test" >
</div>
	  <div class="col">
  <label class="form-label">Test Teinture</label>
  <select  class="form-select" name = "testteinture"  >

    <option>Encours</option>
    <option>Ok</option>
	<option>Non Ok</option>

	
  </select>
</div>

      <div class="col">
                        <label  class="form-label">Note</label>
                        <textarea class="form-control" type="text" rows="1" name ="note"></textarea>
                      </div>
   
  
    <div class="card-body d-flex justify-content-between">

	  <input type="submit"name="Submit" class="btn btn-primary m-1" value ="Ajouter">
	 </div>

		
  </form>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>