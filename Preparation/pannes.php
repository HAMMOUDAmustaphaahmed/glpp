<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}

?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pr&eacute;paration</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
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
                <span class="hide-menu">Liste Pr&eacute;paration</span>
              </a>
         </li>            
  
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Pr&eacute;paration</span>
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
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pannes Pr&eacute;paration </h5>
              <div class="card">
                <div class="card-body">
			
  <form>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label">Dispo</label>
          <select  class="form-select">
            <?php


// Calcul de la date limite (24 heures à partir de maintenant)
$dateLimite = date("Y-m-d", strtotime("-2 day"));

// Construct and execute a SQL query to fetch "dispos" where "date_heure_pesage" is within the next 24 hours
$sql = "SELECT * FROM `preparation` WHERE date_heur_pesage > '$dateLimite'  OR date_heur_pesage IS NULL";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dispo = $row['dispo'];
        echo "<option value='$dispo'>$dispo</option>";
    }
} else {
    echo "<option value=''>No dispo found</option>";
}

// Close the database connection
$conn->close();
?>
          </select>
    </div>
	 <div class="mb-3">
          <label  class="form-label">Machine</label>
          <select  class="form-select">
            <option>Balance 1</option>
			<option>Balance 2</option>
          </select>
    </div>
    <div class="mb-3">
      <label  class="form-label">Panne</label>
      <input type="text" class="form-control"  placeholder="Saisie Panne">
    </div>
  <div class="card-body d-flex justify-content-between">
     <button type="submit" class="btn btn-danger m-1">Detection</button>
	  <button type="submit" class="btn btn-success m-1">Reparation</button>
  </form>
   </div>



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>