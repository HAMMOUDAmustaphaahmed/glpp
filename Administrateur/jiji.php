<?php
include("db.php");


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
  	<style>
	 .poste1 {
      background-color: #B0E0E6 !important;
      
    }
  </style>
   	<style>
	 .poste2 {
      background-color: #4682B4 !important;
      
    }
  </style>
   	<style>
	 .poste3 {
      background-color: #49BEFF !important;
      
    }
  </style>
   	<style>
	 .totale {
      background-color: #4169E1 !important;
      
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
        
          <div class=" d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Aper&ccedil;u Production pour la date = <?php echo date('d-m-y'); ?></h5>
                  </div>


                </div>
            <div id="chart"></div>
			     <div class="row">
                      <div class="col-md-6 d-flex align-items-center">
                        <div class="me-3">
                          <span class="round-8 poste1 rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Poste 1</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 poste2 rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Poste 2</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 poste3 rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Poste 3</span>
                        </div>
                        <div class="me-3">
                          <span class="round-8 totale rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">Totale</span>
                        </div>
                      </div>
                    </div>
          </div>
        </div>
      </div>

                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
 <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Historique Production</h5>

                  </div>
<form method="get" action="">
<div class="row">

    <div class="col-md-6"> <!-- Utilisez la classe col-md-4 (ou une autre classe de grille Bootstrap) pour définir la largeur du conteneur -->
        <select class="form-select" name="phase" id="phase-select" onchange="this.form.submit()">
            
            <option value="sfaldina" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'sfaldina') echo 'selected'; ?>>Sfaldina</option>
            <option value="teinture" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'teinture') echo 'selected'; ?>>Teinture</option>
            <option value="essorage" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'essorage') echo 'selected'; ?>>Essorage</option>
            <option value="sechoire" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'sechoire') echo 'selected'; ?>>Sechoire</option>
            <option value="rameuse" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'rameuse') echo 'selected'; ?>>Rameuse</option>
            <option value="spazzolato" <?php if (isset($_GET['phase']) && $_GET['phase'] == 'spazzolato') echo 'selected'; ?>>Spazzolato</option>
        </select>
    </div>
	</form>
    <div class="col-md-6"> <!-- Utilisez la classe col-md-4 (ou une autre classe de grille Bootstrap) pour définir la largeur du conteneur -->
        <div class="form-group">
            <input type="date" id="Date" class="form-control" name="selectedDate">
        </div>
    </div>
	
</div>
</form>




                </div>
                                    <div class="table-responsive">
                                        <table id="myTable"  class="table text-nowrap mb-0 align-middle table-lg">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                              
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Jour</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Poste 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Poste 2</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Poste 3</h6>
                                                    </th>
													
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Totale</h6>
                                                    </th>
													
                                                 
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php

$phase = $_GET['phase'];
$querySfaldina = "SELECT 
    CONCAT(DATE_SUB(DATE(s.date_fin_sfaldina), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(s.date_fin_sfaldina), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(s.date_fin_sfaldina), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(s.date_fin_sfaldina), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN s.date_fin_sfaldina BETWEEN CONCAT(DATE_SUB(DATE(s.date_fin_sfaldina), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(s.date_fin_sfaldina), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN s.date_fin_sfaldina BETWEEN CONCAT(DATE(s.date_fin_sfaldina), ' 06:00:00') AND CONCAT(DATE(s.date_fin_sfaldina), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN s.date_fin_sfaldina BETWEEN CONCAT(DATE(s.date_fin_sfaldina), ' 14:00:00') AND CONCAT(DATE(s.date_fin_sfaldina), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
   ) as poste_3,
    DATE(s.date_fin_sfaldina) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    sfaldina s
LEFT JOIN 
    preparation p ON s.dispo = p.dispo AND s.sub =p.sub
WHERE 
    s.etat IN ('en cours', 'termine') AND s.date_fin_sfaldina != '0000-00-00 00:00:00'
GROUP BY 
    DATE(s.date_fin_sfaldina) 
";


$resultSfaldina = mysqli_query($conn, $querySfaldina);
$queryEssorage = "SELECT 
    CONCAT(DATE_SUB(DATE(e.date_fin_essorage), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(e.date_fin_essorage), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(e.date_fin_essorage), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(e.date_fin_essorage), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN e.date_fin_essorage BETWEEN CONCAT(DATE_SUB(DATE(e.date_fin_essorage), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(e.date_fin_essorage), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN e.date_fin_essorage BETWEEN CONCAT(DATE(e.date_fin_essorage), ' 06:00:00') AND CONCAT(DATE(e.date_fin_essorage), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN e.date_fin_essorage BETWEEN CONCAT(DATE(e.date_fin_essorage), ' 14:00:00') AND CONCAT(DATE(e.date_fin_essorage), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(e.date_fin_essorage) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    essorage e
LEFT JOIN 
    preparation p ON e.dispo = p.dispo AND e.sub =p.sub
WHERE 
    e.etat IN ('en cours', 'termine') AND e.date_fin_essorage != '0000-00-00 00:00:00'
GROUP BY 
    DATE(e.date_fin_essorage)";

$resultEssorage = mysqli_query($conn, $queryEssorage);
$querySechoire1 = "SELECT 
    CONCAT(DATE_SUB(DATE(s.date_fin_sechoire1), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(s.date_fin_sechoire1), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(s.date_fin_sechoire1), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(s.date_fin_sechoire1), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire1 BETWEEN CONCAT(DATE_SUB(DATE(s.date_fin_sechoire1), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(s.date_fin_sechoire1), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire1 BETWEEN CONCAT(DATE(s.date_fin_sechoire1), ' 06:00:00') AND CONCAT(DATE(s.date_fin_sechoire1), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire1 BETWEEN CONCAT(DATE(s.date_fin_sechoire1), ' 14:00:00') AND CONCAT(DATE(s.date_fin_sechoire1), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(s.date_fin_sechoire1) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    sechoire1 s
LEFT JOIN 
    preparation p ON s.dispo = p.dispo AND s.sub =p.sub
WHERE 
    s.etat IN ('en cours', 'termine')  AND s.date_fin_sechoire1 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(s.date_fin_sechoire1)";
	

$resultSechoire1 = mysqli_query($conn, $querySechoire1);
$querySechoire2 = "SELECT 
    CONCAT(DATE_SUB(DATE(s.date_fin_sechoire2), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(s.date_fin_sechoire2), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(s.date_fin_sechoire2), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(s.date_fin_sechoire2), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire2 BETWEEN CONCAT(DATE_SUB(DATE(s.date_fin_sechoire2), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(s.date_fin_sechoire2), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire2 BETWEEN CONCAT(DATE(s.date_fin_sechoire2), ' 06:00:00') AND CONCAT(DATE(s.date_fin_sechoire2), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN s.date_fin_sechoire2 BETWEEN CONCAT(DATE(s.date_fin_sechoire2), ' 14:00:00') AND CONCAT(DATE(s.date_fin_sechoire2), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(s.date_fin_sechoire2) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    sechoire2 s
LEFT JOIN 
    preparation p ON s.dispo = p.dispo AND s.sub =p.sub
WHERE 
    s.etat  IN ('en cours', 'termine') AND s.date_fin_sechoire2 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(s.date_fin_sechoire2)";

$resultSechoire2 = mysqli_query($conn, $querySechoire2);


$querySechoire = "SELECT * FROM (($querySechoire1) UNION ALL ($querySechoire2)) as tempTable GROUP BY jour";

$resultSechoire = mysqli_query($conn, $querySechoire);

$queryRameuse1 = "SELECT 
    CONCAT(DATE_SUB(DATE(r.date_fin_rameuse1), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(r.date_fin_rameuse1), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(r.date_fin_rameuse1), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(r.date_fin_rameuse1), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse1 BETWEEN CONCAT(DATE_SUB(DATE(r.date_fin_rameuse1), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(r.date_fin_rameuse1), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse1 BETWEEN CONCAT(DATE(r.date_fin_rameuse1), ' 06:00:00') AND CONCAT(DATE(r.date_fin_rameuse1), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse1 BETWEEN CONCAT(DATE(r.date_fin_rameuse1), ' 14:00:00') AND CONCAT(DATE(r.date_fin_rameuse1), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(r.date_fin_rameuse1) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    rameuse1 r
LEFT JOIN 
    preparation p ON r.dispo = p.dispo AND r.sub = p.sub
WHERE 
    r.etat IN ('en cours', 'termine') AND r.date_fin_rameuse1 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(r.date_fin_rameuse1)";

$queryRameuse2 = "SELECT 
    CONCAT(DATE_SUB(DATE(r.date_fin_rameuse2), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(r.date_fin_rameuse2), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(r.date_fin_rameuse2), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(r.date_fin_rameuse2), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse2 BETWEEN CONCAT(DATE_SUB(DATE(r.date_fin_rameuse2), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(r.date_fin_rameuse2), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse2 BETWEEN CONCAT(DATE(r.date_fin_rameuse2), ' 06:00:00') AND CONCAT(DATE(r.date_fin_rameuse2), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN r.date_fin_rameuse2 BETWEEN CONCAT(DATE(r.date_fin_rameuse2), ' 14:00:00') AND CONCAT(DATE(r.date_fin_rameuse2), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(r.date_fin_rameuse2) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    rameuse2 r
LEFT JOIN 
    preparation p ON r.dispo = p.dispo AND r.sub = p.sub
WHERE 
    r.etat IN ('en cours', 'termine') AND r.date_fin_rameuse2 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(r.date_fin_rameuse2)";

// Combinez les résultats des deux requêtes avec UNION ALL
$queryRameuse = "SELECT * FROM (($queryRameuse1) UNION ALL ($queryRameuse2)) as tempTable GROUP BY jour";

$resultRameuse = mysqli_query($conn, $queryRameuse);


$queryTeinture1 = "SELECT 
    CONCAT(DATE_SUB(DATE(t.date_fin_teinture1), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(t.date_fin_teinture1), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(t.date_fin_teinture1), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(t.date_fin_teinture1), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN t.date_fin_teinture1 BETWEEN CONCAT(DATE_SUB(DATE(t.date_fin_teinture1), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(t.date_fin_teinture1), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN t.date_fin_teinture1 BETWEEN CONCAT(DATE(t.date_fin_teinture1), ' 06:00:00') AND CONCAT(DATE(t.date_fin_teinture1), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN t.date_fin_teinture1 BETWEEN CONCAT(DATE(t.date_fin_teinture1), ' 14:00:00') AND CONCAT(DATE(t.date_fin_teinture1), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(t.date_fin_teinture1) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    teinture1 t
LEFT JOIN 
    preparation p ON t.dispo = p.dispo AND t.sub = p.sub
WHERE 
    t.etat IN ('en cours', 'termine') AND t.date_fin_teinture1 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(t.date_fin_teinture1)";

$queryTeinture2 = "SELECT 
    CONCAT(DATE_SUB(DATE(t.date_fin_teinture2), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(t.date_fin_teinture2), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(t.date_fin_teinture2), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(t.date_fin_teinture2), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN t.date_fin_teinture2 BETWEEN CONCAT(DATE_SUB(DATE(t.date_fin_teinture2), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(t.date_fin_teinture2), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN t.date_fin_teinture2 BETWEEN CONCAT(DATE(t.date_fin_teinture2), ' 06:00:00') AND CONCAT(DATE(t.date_fin_teinture2), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN t.date_fin_teinture2 BETWEEN CONCAT(DATE(t.date_fin_teinture2), ' 14:00:00') AND CONCAT(DATE(t.date_fin_teinture2), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(t.date_fin_teinture2) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    teinture2 t
LEFT JOIN 
    preparation p ON t.dispo = p.dispo AND t.sub = p.sub
WHERE 
    t.etat IN ('en cours', 'termine') AND t.date_fin_teinture2 != '0000-00-00 00:00:00'
GROUP BY 
    DATE(t.date_fin_teinture2)";

// Combinez les résultats des deux requêtes avec UNION ALL
$queryTeinture = "SELECT * FROM (($queryTeinture1) UNION ALL ($queryTeinture2)) as tempTable GROUP BY jour";

$resultTeinture = mysqli_query($conn, $queryTeinture);

$querySpazzolato = "SELECT 
    CONCAT(DATE_SUB(DATE(s.date_fin_spazzolato), INTERVAL 1 DAY), ' 22:00:00') as debut_poste1,
    CONCAT(DATE(s.date_fin_spazzolato), ' 06:00:00') as fin_poste1,
    CONCAT(DATE(s.date_fin_spazzolato), ' 14:00:00') as fin_poste2,
    CONCAT(DATE(s.date_fin_spazzolato), ' 22:00:00') as fin_poste3,
    SUM(
        CASE 
            WHEN s.date_fin_spazzolato BETWEEN CONCAT(DATE_SUB(DATE(s.date_fin_spazzolato), INTERVAL 1 DAY), ' 22:00:00') AND CONCAT(DATE(s.date_fin_spazzolato), ' 06:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 22h à 6h du matin
            ELSE 0
        END
    ) as poste_1,
    SUM(
        CASE 
            WHEN s.date_fin_spazzolato BETWEEN CONCAT(DATE(s.date_fin_spazzolato), ' 06:00:00') AND CONCAT(DATE(s.date_fin_spazzolato), ' 14:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 6h à 14h
            ELSE 0
        END
    ) as poste_2,
    SUM(
        CASE 
            WHEN s.date_fin_spazzolato BETWEEN CONCAT(DATE(s.date_fin_spazzolato), ' 14:00:00') AND CONCAT(DATE(s.date_fin_spazzolato), ' 22:00:00') THEN 
                p.metrage_dispo  -- Poste de travail de 14h à 22h
            ELSE 0
        END
    ) as poste_3,
    DATE(s.date_fin_spazzolato) as jour,
    SUM(p.metrage_dispo) as total_metrage
FROM 
    spazzolato s
LEFT JOIN 
    preparation p ON s.dispo = p.dispo AND s.sub = p.sub
WHERE 
    s.etat IN ('en cours', 'termine') AND s.date_fin_spazzolato != '0000-00-00 00:00:00'
GROUP BY 
    DATE(s.date_fin_spazzolato)";
	$resultSpazzolato = mysqli_query($conn, $querySpazzolato);
if ($phase === "sfaldina") {
    while ($row = mysqli_fetch_assoc($resultSfaldina)) {
          echo "<tr>";
    echo "<td class='border-bottom-0 font-weight-bold text-dark'>" . $row['jour'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
    echo "</tr>";
    }
} elseif ($phase == "teinture") {
while ($row = mysqli_fetch_assoc($resultTeinture)) {
echo "<tr>";
    echo "<td class='border-bottom-0'>" . $row['jour'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
    echo "</tr>";
    

}


} elseif ($phase =="sechoire"){
	while ($row = mysqli_fetch_assoc($resultSechoire)) {
       echo "<tr>";
    echo "<td class='border-bottom-0'>" . $row['jour'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
    echo "</tr>";
    }

	

} elseif ($phase == "essorage") {
 while ($row = mysqli_fetch_assoc($resultEssorage)) {
        echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['jour'] . "</td>";  
        echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
        echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
        echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
        echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
        echo "</tr>";
    }
}


	
 elseif ($phase =="rameuse"){
	while ($row = mysqli_fetch_assoc($resultRameuse)) {
     echo "<tr>";
    echo "<td class='border-bottom-0'>" . $row['jour'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
    echo "</tr>";
    

}
	


	
	
} elseif ($etat =="spazzolato"){
	while ($row = mysqli_fetch_assoc($resultSpazzolato)) {
echo "<tr>";
    echo "<td class='border-bottom-0'>" . $row['jour'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_1'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_2'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['poste_3'] . "</td>";  
    echo "<td class='border-bottom-0'>" . $row['total_metrage'] . "</td>";  
    echo "</tr>";
    

}	
	
} 



function getTotalMetrageByDate($conn) {
    $data = array();
    $date = date("y-m-d"); // Obtient la date actuelle au format "Y-m-d"
    $etapes = array("sfaldina", "teinture1", "essorage", "sechoire1", "rameuse1", "spazzolato");
    
    // Définition des plages horaires pour poste_1, poste_2 et poste_3
   $poste_1_start = date('Y-m-d H:i:s', strtotime("$date -1 day 22:00:00")); // De 22h00 à 23h59 de la date précédente
    $poste_1_end = date('Y-m-d H:i:s', strtotime("$date 05:59:59"));
    $poste_2_start = date('Y-m-d H:i:s', strtotime("$date 06:00:00")); // De 06h00 à 13h59 de la date actuelle
    $poste_2_end = date('Y-m-d H:i:s', strtotime("$date 13:59:59"));
    $poste_3_start = date('Y-m-d H:i:s', strtotime("$date 14:00:00")); // De 14h00 à 21h59 de la date actuelle
    $poste_3_end = date('Y-m-d H:i:s', strtotime("$date 21:59:59"));

    foreach ($etapes as $etape) {
        // Requête pour poste_1
        $query_poste1 = "SELECT SUM(p.metrage_dispo) as total_metrage FROM $etape e
                         LEFT JOIN preparation p ON e.dispo = p.dispo AND e.sub = p.sub
                         WHERE e.etat IN ('en cours', 'termine') AND e.date_fin_$etape BETWEEN '$poste_1_start' AND '$poste_1_end'";
        
        // Exécution de la requête pour poste_1
        $result_poste1 = mysqli_query($conn, $query_poste1);
        $row_poste1 = mysqli_fetch_assoc($result_poste1);
        $total_metrage_poste1 = intval($row_poste1['total_metrage']);

        // Requête pour poste_2
        $query_poste2 = "SELECT SUM(p.metrage_dispo) as total_metrage FROM $etape e
                         LEFT JOIN preparation p ON e.dispo = p.dispo AND e.sub = p.sub
                         WHERE e.etat IN ('en cours', 'termine') AND e.date_fin_$etape BETWEEN '$poste_2_start' AND '$poste_2_end'";
        
        // Exécution de la requête pour poste_2
        $result_poste2 = mysqli_query($conn, $query_poste2);
        $row_poste2 = mysqli_fetch_assoc($result_poste2);
        $total_metrage_poste2 = intval($row_poste2['total_metrage']);

        // Requête pour poste_3
        $query_poste3 = "SELECT SUM(p.metrage_dispo) as total_metrage FROM $etape e
                         LEFT JOIN preparation p ON e.dispo = p.dispo AND e.sub = p.sub
                         WHERE e.etat IN ('en cours', 'termine') AND e.date_fin_$etape BETWEEN '$poste_3_start' AND '$poste_3_end'";
        
        // Exécution de la requête pour poste_3
        $result_poste3 = mysqli_query($conn, $query_poste3);
        $row_poste3 = mysqli_fetch_assoc($result_poste3);
        $total_metrage_poste3 = intval($row_poste3['total_metrage']);

$total_general = $total_metrage_poste1 + $total_metrage_poste2 + $total_metrage_poste3;
        // Stockage des résultats dans le tableau de données
 $data[$etape] = array(
            "poste_1" => $total_metrage_poste1,
            "poste_2" => $total_metrage_poste2,
            "poste_3" => $total_metrage_poste3,
            "total_metrage" => $total_general
        );
    }
    return $data;
}

// Utilisation de la fonction
$data = getTotalMetrageByDate($conn);


mysqli_close($conn);
?>

</tbody>
 </table>
      </div>
    </div>
</div>			
		

			  
</form>
   <script>
    document.addEventListener("DOMContentLoaded", function() {
 var data = <?php echo json_encode($data); ?>;

    // Créez des tableaux pour les séries de données
    var poste1Data = [];
    var poste2Data = [];
    var poste3Data = [];
    var totalData = [];

    // Remplissez les tableaux avec les données
    Object.keys(data).forEach(function(etape) {
        poste1Data.push(data[etape]["poste_1"]);
        poste2Data.push(data[etape]["poste_2"]);
        poste3Data.push(data[etape]["poste_3"]);
        totalData.push(data[etape]["total_metrage"]);
    });

    var chart = {
        series: [
            { name: "Poste 1", data: poste1Data },
            { name: "Poste 2", data: poste2Data },
            { name: "Poste 3", data: poste3Data },
            { name: "Total", data: totalData },
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


    colors: [ "#B0E0E6" ,"#4682B4","#49BEFF","#4169E1"],


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
      max: 25000,
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
console.log(data);
  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();
    });
  </script>
   
   <script>
    // Sélectionnez l'élément d'entrée de type date
    var inputDate = document.getElementById('Date');
    
    // Sélectionnez l'élément tbody du tableau
    var tableBody = document.getElementById('myTable');

    // Ajoutez un écouteur d'événement 'change' à l'élément d'entrée
    inputDate.addEventListener('change', function() {
        // Récupérez la date sélectionnée
        var selectedDate = inputDate.value;

        // Parcourez toutes les lignes du tableau et masquez celles qui ne correspondent pas à la date sélectionnée
        for (var i = 0; i < tableBody.rows.length; i++) {
            var row = tableBody.rows[i];
            var cellValue = row.cells[0].textContent; // Supposons que la date soit dans la première cellule de chaque ligne
            
            // Comparez la date de la cellule avec la date sélectionnée
            if (cellValue === selectedDate) {
                row.style.display = ''; // Affichez la ligne si la date correspond
            } else {
                row.style.display = 'none'; // Masquez la ligne si la date ne correspond pas
            }
        }
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