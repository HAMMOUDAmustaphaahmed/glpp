<?php
include("db.php");

// Function to retrieve data
function getDataForJS($conn) {
  $columns = array("sfaldina", "teinture", "essorage", "sechoire", "rameuse", "spazzolato");
  $data = array();

  foreach ($columns as $column) {
    $sql = "SELECT COUNT(*) as count FROM $column WHERE etat = 'en cours'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[$column] = (int)$row["count"];
      }
    } else {
      $data[$column] = 0;
    }
  }

  return $data;
}

// Get data for JavaScript
$data = getDataForJS($conn);

function getRowCountToday($conn) {
  // Date d'aujourd'hui
  $today = date('Y-m-d');

  // Requête SQL pour compter les lignes dans la table "preparation" avec date_heur_pesage égale à aujourd'hui
  $sql = "SELECT COUNT(*) as count FROM preparation WHERE DATE(date_heur_pesage) = '$today' OR date_heur_pesage IS NULL";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
}

// Utilisez la fonction pour obtenir le nombre de lignes avec date_heur_pesage égale à aujourd'hui
$rowCount = getRowCountToday($conn);

function getRowCountYesterday($conn) {
  // Date d'aujourd'hui
  $yesterday = date('Y-m-d', strtotime('-1 day'));

  // Requête SQL pour compter les lignes dans la table "preparation" avec date_heur_pesage égale à aujourd'hui
  $sql = "SELECT COUNT(*) as count FROM preparation WHERE DATE(date_heur_pesage) = '$yesterday'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
}

// Utilisez la fonction pour obtenir le nombre de lignes avec date_heur_pesage égale à aujourd'hui
$rowCount2 = getRowCountYesterday($conn);
if ($rowCount2 > 0) {
    $pourcentage = round((($rowCount - $rowCount2) / $rowCount2) * 100);
} else {
    $pourcentage = 0;
}
// Function to retrieve data selon type traitement
function getDataLavage($conn) {
  // Date d'aujourd'hui
  $today = date('Y-m-d');
 

    $sql = "SELECT COUNT(*) as count FROM preparation WHERE (DATE(date_heur_pesage) = '$today' OR date_heur_pesage IS NULL)  AND type_traitement = 'Lavage'";
    $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
   return $Lavage;
}
// Get data for JavaScript
$Lavage = getDataLavage($conn);
function getDataTeinture($conn) {
  // Date d'aujourd'hui
  $today = date('Y-m-d');


    $sql = "SELECT COUNT(*) as count FROM preparation WHERE (DATE(date_heur_pesage) = '$today' OR date_heur_pesage IS NULL ) AND type_traitement = 'Teinture'";
    $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
}
// Get data for JavaScript
$Teinture = getDataTeinture($conn);
function getDataPPT($conn) {
  // Date d'aujourd'hui
  $today = date('Y-m-d');


    $sql = "SELECT COUNT(*) as count FROM preparation WHERE (DATE(date_heur_pesage) = '$today' OR date_heur_pesage IS NULL ) AND type_traitement = 'PPT'";
    $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
}
// Get data for JavaScript
$PPT = getDataPPT($conn);

function getDataBlanc($conn) {
  // Date d'aujourd'hui
  $today = date('Y-m-d');
  

    $sql = "SELECT COUNT(*) as count FROM preparation WHERE (DATE(date_heur_pesage) = '$today' OR date_heur_pesage IS NULL ) AND type_traitement = 'Blanc 101'";
    $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return (int)$row["count"];
    }
  } else {
    return 0;
  }
  
}
// Get data for JavaScript
$Blanc = getDataBlanc($conn);







 
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard CQMP</title>
    <style>
    .bg-royal {
      background-color: #4169E1 !important;
      
    }
	</style>
	<style>
	 .bg-blue {
      background-color: #B0E0E6 !important;
      
    }
  </style>

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
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ARCHIVES</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">R&eacute;cap</span>
              </a>
               <a class="sidebar-link" href="./preparation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Pr&eacute;paration</span>
              </a>
			                <a class="sidebar-link" href="./sfaldina.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Sfaldina</span>
              </a>
			                <a class="sidebar-link" href="./spazzolato.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Spazzolato</span>
              </a>
							<a class="sidebar-link" href="./teinture.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Teinture</span>
              </a>
			                <a class="sidebar-link" href="./essorage.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Essorage</span>
              </a>
			                <a class="sidebar-link" href="./sechoire.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage S&eacute;choire</span>
              </a>
			                <a class="sidebar-link" href="./rameuse.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Rameuse</span>
              </a>
            </li>
			 <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-hammer"></i>
                </span>
                <span class="hide-menu">R&eacute;paration</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./alertes-exco.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alertes</span>
              </a>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./alertes-exco.php" aria-expanded="false">
                <span>
                  <i class="ti ti-truck-delivery"></i>
                </span>
                <span class="hide-menu">Fournisseurs</span>
              </a>
            </li>
   <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Pannes</span>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-infographic"></i>
                </span>
                <span class="hide-menu">Visualisation</span>
              </a>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Historique</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./compte.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Comptes</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ajouter-compte.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Ajouter Un Compte</span>
              </a>
            </li>
			 <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MODIFICATION</span>
            </li>
             <li class="sidebar-item">
			  <a class="sidebar-link" href="./mod.php" aria-expanded="false">
                <span>
                  <i class="ti ti-edit"></i>
                </span>
                <span class="hide-menu">Edition Couleur & Article</span>
              </a>
              </li>
				    <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary">LOG OUT</a>
  </div>
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->

    <div class="body-wrapper">

      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Overview WIP</h5>
              </div>
            </div>
            <div id="chart"></div>
          </div>
        </div>
      </div>
<div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Overview Creation</h5>
                <div class="row align-items-center">
                  <div class="col-8">
                    <h4 class="fw-semibold mb-3"><?php echo $rowCount ?></h4>
                    <div class="d-flex align-items-center mb-3">
                      <span class="me-1 rounded-circle <?php echo $pourcentage >= 0 ? 'bg-light-success' : 'bg-light-danger'; ?> round-20 d-flex align-items-center justify-content-center">
                        <i class="ti <?php echo $pourcentage >= 0 ? 'ti-arrow-up-left text-success' : 'ti-arrow-down-left text-danger'; ?>"></i>
                      </span>
                      <p class="text-dark me-1 fs-3 mb-0"><?php echo $pourcentage ?>%</p>
                      <p class="fs-3 mb-0">d'hier</p>
                    </div>
                    <div class="row">
                      <div class="col-md-6 d-flex align-items-center">
                        <div class="me-3">
                          <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Lavage</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Teinture</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 bg-royal rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">PPT</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 bg-blue rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Blanc</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-center">
                      <div id="breakup"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     
    </div>
	<div class="card-body">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
 <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Overview WIP</h5>
                  </div>
<form method="get" action="">
  <div>
    <select class="form-select" name="phase" id="phase-select" onchange="this.form.submit()">
      <option value="totale" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'totale') echo 'selected'; ?>>Totale</option>
      <option value="sfaldina" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'sfaldina') echo 'selected'; ?>>Sfaldina</option>
      <option value="teinture" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'teinture') echo 'selected'; ?>>Teinture</option>
      <option value="essorage" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'essorage') echo 'selected'; ?>>Essorage</option>
      <option value="sechoire" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'sechoire') echo 'selected'; ?>>Sechoire</option>
      <option value="rameuse" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'rameuse') echo 'selected'; ?>>Rameuse</option>
      <option value="spazzolato" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'spazzolato') echo 'selected'; ?>>Spazzolato</option>
    </select>
  </div>
</form>

                </div>
                                    <div class="table-responsive">
                                        <table id="myTable"  class="table text-nowrap mb-0 align-middle table-lg">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                              
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dispo</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Sub</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Article</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Couleur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Etat</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Debut</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">WIP</h6>
                                                    </th>
                                                 
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php

$phase = $_GET['phase'];
$querySfaldina = "SELECT DISTINCT * FROM `sfaldina` WHERE etat ='en cours'";
$resultSfaldina = mysqli_query($conn, $querySfaldina);
$queryteinture = "SELECT DISTINCT * FROM `teinture` WHERE etat ='en cours'";
$resultteinture = mysqli_query($conn, $queryteinture);

$queryEssorage = "SELECT DISTINCT * FROM `essorage` WHERE etat ='en cours'";
$resultEssorage = mysqli_query($conn, $queryEssorage);
$querySechoire = "SELECT DISTINCT * FROM `sechoire` WHERE etat ='en cours'";
$resultSechoire = mysqli_query($conn, $querySechoire);

$queryRameuse = "SELECT DISTINCT * FROM `rameuse` WHERE etat ='en cours'";
$resultRameuse = mysqli_query($conn, $queryRameuse);

$querySpazzolato = "SELECT DISTINCT * FROM `spazzolato` WHERE etat ='en cours'";
$resultSpazzolato = mysqli_query($conn, $querySpazzolato);
if ($phase == "sfaldina"){
while ($row = mysqli_fetch_assoc($resultSfaldina)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_sfaldina = $row['date_debut_sfaldina'];
    $duree_sfaldina = strtotime($date_actuelle) - strtotime($date_debut_sfaldina);
	$duree_sfaldina_heur =  round($duree_sfaldina /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_sfaldina'] . "</td>";
	    if ($duree_sfaldina_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        } elseif ($duree_debut_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}

} elseif ($phase == "teinture") {
while ($row = mysqli_fetch_assoc($resultteinture)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_teinture = $row['date_debut_teinture'];
    $duree_teinture = strtotime($date_actuelle) - strtotime($date_debut_teinture);
	$duree_teinture_heur =  round($duree_teinture /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_teinture'] . "</td>";
	    if ($duree_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture_heur Heures</span></td>";
        } elseif ($duree_teinture_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}


} elseif ($phase =="sechoire"){
	while ($row = mysqli_fetch_assoc($resultSechoire)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Sechoire = $row['date_debut_sechoire'];
    $duree_Sechoire = strtotime($date_actuelle) - strtotime($date_debut_Sechoire);
	$duree_Sechoire_heur =  round($duree_Sechoire /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_sechoire'] . "</td>";
	    if ($duree_Sechoire_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Sechoire_heur Heures</span></td>";
        } elseif ($duree_Sechoire_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Sechoire_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}


} elseif ($phase == "essorage") {
		while ($row = mysqli_fetch_assoc($resultEssorage)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Essorage = $row['date_debut_essorage'];
    $duree_Essorage = strtotime($date_actuelle) - strtotime($date_debut_Essorage);
	$duree_Essorage_heur =  round($duree_Sechoire /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_essorage'] . "</td>";
	    if ($duree_Essorage_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Essorage_heur Heures</span></td>";
        } elseif ($duree_Essorage_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Essorage_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
	
} elseif ($phase =="rameuse"){
	while ($row = mysqli_fetch_assoc($resultRameuse)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Rameuse = $row['date_debut_rameuse'];
    $duree_Rameuse = strtotime($date_actuelle) - strtotime($date_debut_Rameuse);
	$duree_Rameuse_heur =  round($duree_Rameuse /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_rameuse'] . "</td>";
	    if ($duree_Rameuse_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Rameuse_heur Heures</span></td>";
        } elseif ($duree_Rameuse_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Rameuse_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
	
	
	
} elseif ($etat =="spazzolato"){
	while ($row = mysqli_fetch_assoc($resultSpazzolato)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Spazzolato = $row['date_debut_spazzolato'];
    $duree_Spazzolato = strtotime($date_actuelle) - strtotime($date_debut_Spazzolato);
	$duree_Spazzolato_heur =  round($duree_Spazzolato /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_spazzolato'] . "</td>";
	    if ($duree_Spazzolato_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Spazzolato_heur Heures</span></td>";
        } elseif ($duree_Spazzolato_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Spazzolato_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}	
	
} elseif ($phase =="totale"){
	while ($row = mysqli_fetch_assoc($resultSfaldina)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_sfaldina = $row['date_debut_sfaldina'];
    $duree_sfaldina = strtotime($date_actuelle) - strtotime($date_debut_sfaldina);
	$duree_sfaldina_heur =  round($duree_sfaldina /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_sfaldina'] . "</td>";
	    if ($duree_sfaldina_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        } elseif ($duree_debut_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
while ($row = mysqli_fetch_assoc($resultSpazzolato)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Spazzolato = $row['date_debut_spazzolato'];
    $duree_Spazzolato = strtotime($date_actuelle) - strtotime($date_debut_Spazzolato);
	$duree_Spazzolato_heur =  round($duree_Spazzolato /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_spazzolato'] . "</td>";
	    if ($duree_Spazzolato_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Spazzolato_heur Heures</span></td>";
        } elseif ($duree_Spazzolato_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Spazzolato_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}	
while ($row = mysqli_fetch_assoc($resultteinture)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_teinture = $row['date_debut_teinture'];
    $duree_teinture = strtotime($date_actuelle) - strtotime($date_debut_teinture);
	$duree_teinture_heur =  round($duree_teinture /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_teinture'] . "</td>";
	    if ($duree_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture_heur Heures</span></td>";
        } elseif ($duree_teinture_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
while ($row = mysqli_fetch_assoc($resultTeinture2)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_teinture2 = $row['date_debut_teinture2'];
    $duree_teinture2 = strtotime($date_actuelle) - strtotime($date_debut_teinture2);
	$duree_teinture2_heur =  round($duree_teinture2 /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_teinture2'] . "</td>";
	    if ($duree_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture2_heur Heures</span></td>";
        } elseif ($duree_teinture_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture2_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}	
while ($row = mysqli_fetch_assoc($resultEssorage)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Essorage = $row['date_debut_essorage'];
    $duree_Essorage = strtotime($date_actuelle) - strtotime($date_debut_Essorage);
	$duree_Essorage_heur =  round($duree_Sechoire /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_essorage'] . "</td>";
	    if ($duree_Essorage_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Essorage_heur Heures</span></td>";
        } elseif ($duree_Essorage_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Essorage_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
while ($row = mysqli_fetch_assoc($resultSechoire)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Sechoire = $row['date_debut_Sechoire'];
    $duree_Sechoire = strtotime($date_actuelle) - strtotime($date_debut_Sechoire);
	$duree_Sechoire_heur =  round($duree_Sechoire /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_Sechoire'] . "</td>";
	    if ($duree_Sechoire_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Sechoire_heur Heures</span></td>";
        } elseif ($duree_Sechoire_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Sechoire_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
	while ($row = mysqli_fetch_assoc($resultSechoire2)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Sechoire2 = $row['date_debut_sechoire2'];
    $duree_Sechoire2 = strtotime($date_actuelle) - strtotime($date_debut_Sechoire2);
	$duree_Sechoire2_heur =  round($duree_Sechoire2 /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_sechoire2'] . "</td>";
	    if ($duree_Sechoire2_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Sechoire2_heur Heures</span></td>";
        } elseif ($duree_Sechoire2_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Sechoire2_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
while ($row = mysqli_fetch_assoc($resultRameuse)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Rameuse = $row['date_debut_Rameuse'];
    $duree_Rameuse = strtotime($date_actuelle) - strtotime($date_debut_Rameuse);
	$duree_Rameuse_heur =  round($duree_Rameuse /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_Rameuse'] . "</td>";
	    if ($duree_Rameuse_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Rameuse_heur Heures</span></td>";
        } elseif ($duree_Rameuse_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Rameuse_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}
	while ($row = mysqli_fetch_assoc($resultRameuse2)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_Rameuse2 = $row['date_debut_rameuse2'];
    $duree_Rameuse2 = strtotime($date_actuelle) - strtotime($date_debut_Rameuse2);
	$duree_Rameuse2_heur =  round($duree_Rameuse2 /3600);
echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
        echo "<td class='border-bottom-0'>" . $row['date_debut_rameuse2'] . "</td>";
	    if ($duree_Rameuse2_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_Rameuse2_heur Heures</span></td>";
        } elseif ($duree_Rameuse2_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_Rameuse2_heur Heures</span></td>";
        }
        

        echo "</tr>";
    

}	
	
}
mysqli_close($conn);
?>

</tbody>
 </table>
      </div>
    </div>
</div>			
		

			  
</form>
  <!-- Le script JavaScript -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
         var chart = {
    series: [
      
      { name: "Work In Progess", data:<?php echo json_encode(array_values($data)); ?> },
    ],

    chart: {
      type: "bar",
      height: 345,
      offsetX: -15,
      toolbar: { show: true },
      foreColor: "#adb0bb",
      fontFamily: 'inherit',
      sparkline: { enabled: false },
    },


    colors: [ "#49BEFF" ,"#5D87FF","#5D87FF","#5D87FF"],


    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "35%",
        borderRadius: [6],
        borderRadiusApplication: 'end',
        borderRadiusWhenStacked: 'all'
      },
    },
    markers: { size: 0 },

    dataLabels: {
      enabled: false,
    },


    legend: {
      show: false,
    },


    grid: {
      borderColor: "rgba(0,0,0,0.1)",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },

    xaxis: {
      type: "",
      categories: ["Sfaldina", "Teinture", "Essorage", "Sechoire", "Rameuse", "Spazzolato"],
      labels: {
        style: { cssClass: "grey--text lighten-2--text fill-color" },
      },
    },


    yaxis: {
      show: true,
      min: 0,
      max: 50,
      tickAmount: 4,
      labels: {
        style: {
          cssClass: "grey--text lighten-2--text fill-color",
        },
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: "butt",
      colors: ["transparent"],
    },


    tooltip: { theme: "light" },

    responsive: [
      {
        breakpoint: 600,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 3,
            }
          },
        }
      }
    ]


  };

  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();
    });
  </script>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Utilisez les données PHP dans votre script JavaScript
      var Lavage = <?php echo json_encode($Lavage); ?>;
      var Teinture = <?php echo json_encode($Teinture); ?>;
      var PPT = <?php echo json_encode($PPT); ?>;
      var Blanc = <?php echo json_encode($Blanc); ?>;

      var breakup = {
        color: "#adb5bd",
        series: [Lavage, Teinture, PPT, Blanc],
        labels: ["Lavage", "Teinture", "PPT", "Blanc 101"],
        chart: {
          width: 180,
          type: "donut",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb"
        },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%'
        }
      }
    },
    stroke: {
      show: false
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    colors: ["#5D87FF" , "#ecf2ff", "#B0E0E6","#4169E1"],
    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150
          }
        }
      }
    ],
    tooltip: {
      theme: "dark",
      fillSeriesColor: false
    }
  };

  var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
  chart.render();
});
</script>

  <script> 
  document.addEventListener("DOMContentLoaded", function() {
	var earning = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      group: "sparklines",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Production",
        color: "#49BEFF",
        data: <?php echo json_encode(array_values($sum)); ?>,
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      colors: ["#f3feff"],
      type: "solid",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#earning"), earning).render();
  });
  </script>


  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../src/assets/js/dashboard.js"></script>
 
</body>

</html>