<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Historique</title>
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
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../src/assets/images/logos/benetton.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
     
		  		                 <div class="form-group">
    <label for="filterInput">Filtrer par Dispo :</label>
    <input type="text" id="filterInput" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un dispo...">
</div>
			<div class="form-group">
    <label for="filterInput">Filtrer par Article :</label>
    <input type="text" id="filterInput" class="form-control" onkeyup="filterTable()" placeholder="Entrez un article...">
</div>
<div class="form-group">
    <label for="filterColor">Filtrer par Couleur :</label>
    <input type="text" id="filterColor" class="form-control" onkeyup="filterTableByColor()" placeholder="Entrez une couleur...">
</div>
<div class="form-group">
    <label for="startDate">Date de D&eacute;but :</label>
    <input type="date" id="startDate" class="form-control">
</div>

<div class="form-group">
    <label for="endDate">Date de Fin :</label>
    <input type="date" id="endDate" class="form-control">
</div>
 </ul>
<div class="fmt-3 d-flex justify-content-center align-items-center">
    <button onclick="filterTableByDate()" class="btn btn-primary">Filtrer par date</button>
</div>
 

          
          
		      
   
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->

<div class="container ">

          
                    <div class="card-body">
                        <div class="col-lg-10 d-flex align-items-stretch">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Historique</h5>
                                    <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
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
                                                        <h6 class="fw-semibold mb-0">Type De Traitement</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Pesage</h6>
                                                    </th>
													 <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Pesage/Sfaldina</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">d&eacute;but Sfaldina</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Sfaldina </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Sfaldina</h6>
                                                    </th>
													</th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Sfaldina/Teinture</h6>
                                                    </th>												
														<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Teinture </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Teinture </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Teinture </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Teinture/Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Essorage </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Essorage/S&eacute;choire </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but S&eacute;choire </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e S&eacute;choire </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin S&eacute;choire</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e S&eacute;choire/Rameuse</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Rameuse</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Rameuse </h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Rameuse</h6>
                                                    </th>
				                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Totale</h6>
                                                    </th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
include("db.php");

$query1 = "SELECT
    s.dispo,
    s.sub,
    s.article,
    s.couleur,
    p.type_traitement,
    p.date_heur_pesage,
	ROUND(IF(k.date_debut_sfaldina != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(k.date_debut_sfaldina) - UNIX_TIMESTAMP(p.date_heur_pesage)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(p.date_heur_pesage)) / 3600), 0) AS temps_sfaldina,
    k.date_debut_sfaldina,
			ROUND(IF(k.date_debut_sfaldina != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(k.date_fin_sfaldina) - UNIX_TIMESTAMP(k.date_debut_sfaldina)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(k.date_debut_sfaldina)) / 3600), 0) AS duree_sfaldina,
    k.date_fin_sfaldina,
			ROUND(IF(t.date_debut_teinture != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(t.date_debut_teinture) - UNIX_TIMESTAMP(k.date_fin_sfaldina)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(k.date_fin_sfaldina)) / 3600), 0) AS temps_teinture,
    t.date_debut_teinture,
		ROUND(IF(t.date_debut_teinture != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(t.date_fin_teinture) - UNIX_TIMESTAMP(t.date_debut_teinture)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(t.date_debut_teinture)) / 3600), 0) AS duree_teinture,
    t.date_fin_teinture,
		ROUND(IF(e.date_debut_essorage != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(e.date_debut_essorage) - UNIX_TIMESTAMP(t.date_fin_teinture)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(t.date_fin_teinture)) / 3600), 0) AS temps_essorage,
    e.date_debut_essorage,
	ROUND(IF(e.date_debut_essorage != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(e.date_fin_essorage) - UNIX_TIMESTAMP(e.date_debut_essorage)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(e.date_debut_essorage)) / 3600), 0) AS duree_essorage,
    e.date_fin_essorage,
		ROUND(IF(e.date_debut_essorage != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(a.date_debut_sechoire) - UNIX_TIMESTAMP(e.date_fin_essorage)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(e.date_fin_essorage)) / 3600), 0) AS temps_sechoire,
    a.date_debut_sechoire,
	ROUND(IF(e.date_debut_essorage != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(a.date_fin_sechoire) - UNIX_TIMESTAMP(a.date_debut_sechoire)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(a.date_debut_sechoire)) / 3600), 0) AS duree_sechoire,	
    a.date_fin_sechoire,
		ROUND(IF(s.date_debut_rameuse != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(s.date_debut_rameuse) - UNIX_TIMESTAMP(a.date_fin_sechoire)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(a.date_fin_sechoire)) / 3600), 0) AS temps_rameuse,	
    s.date_debut_rameuse,
		ROUND(IF(s.date_debut_rameuse != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(s.date_fin_rameuse) - UNIX_TIMESTAMP(s.date_debut_rameuse)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(s.date_debut_rameuse)) / 3600), 0) AS duree_rameuse,
    s.date_fin_rameuse
	

FROM
    `rameuse` s
LEFT JOIN
    (SELECT dispo, sub, type_traitement, date_heur_pesage FROM `preparation`) p ON s.dispo = p.dispo AND s.sub = p.sub
LEFT JOIN
    (SELECT dispo, sub, date_debut_sfaldina, date_fin_sfaldina FROM `sfaldina`) k ON s.dispo = k.dispo AND s.sub = k.sub
LEFT JOIN
    (SELECT dispo, sub, date_debut_teinture, date_fin_teinture FROM `teinture`) t ON s.dispo = t.dispo AND s.sub = t.sub
LEFT JOIN
    (SELECT dispo, sub, date_debut_essorage, date_fin_essorage FROM `essorage`) e ON s.dispo = e.dispo AND s.sub = e.sub

LEFT JOIN
    (SELECT dispo, sub, date_debut_sechoire, date_fin_sechoire FROM `sechoire`) a ON s.dispo = a.dispo AND s.sub = a.sub
WHERE (s.article != 'ATN' OR s.article != 'AOU' OR s.article != 'VR5' OR s.article != 'YN4' OR s.article != 'MT1' OR s.article != 'WG9'OR s.article != 'F9H') 
ORDER BY s.date_fin_rameuse DESC

";




// Execute the query
$result1 = mysqli_query($conn, $query1);

echo "<tbody>";

// Parcourir les résultats de la requête
while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr>";

    // Calculer les durées pour chaque étape en secondes
$temps_essorage = $row['temps_essorage'];
	$temps_teinture = $row['temps_teinture'];
	$temps_sfaldina = $row['temps_sfaldina'];
	$temps_sechoire = $row['temps_sechoire'];
	$temps_rameuse = $row['temps_rameuse'];
    
    $duree_essorage = $row['duree_essorage'];
	$duree_teinture = $row['duree_teinture'];
	$duree_sfaldina = $row['duree_sfaldina'];
	$duree_sechoire = $row['duree_sechoire'];
	$duree_rameuse = $row['duree_rameuse'];
$total_time_seconds = strtotime($row['date_fin_rameuse']) - strtotime($row['date_heur_pesage']);



$total_time_hours = round($total_time_seconds / 3600);
    // Afficher les données pour chaque étape
    echo "<td>" . $row['dispo'] . "</td>";
    echo "<td>" . $row['sub'] . "</td>";
    echo "<td>" . $row['article'] . "</td>";
    echo "<td>" . $row['couleur'] . "</td>";
	echo "<td>" . $row['type_traitement'] . "</td>";
    echo "<td>" . $row['date_heur_pesage'] . "</td>";
// Temps d'attente entre sfaldina et pesage
	if ($row['temps_sfaldina'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_sfaldina Heures</span></td>";
        } elseif ($row['temps_sfaldina'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_sfaldina Heures</span></td>";
        } 
    echo "<td>" . $row['date_debut_sfaldina'] . "</td>";
	// durée sfaldina
		if ($row['duree_sfaldina'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina Heures</span></td>";
        } elseif ($row['duree_sfaldina'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina Heures</span></td>";
        } 
    echo "<td>" . $row['date_fin_sfaldina'] . "</td>";
	// temps d'attente entre sfaldina et teinture
if ($row['temps_teinture'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_teinture Heures</span></td>";
        } elseif ($row['temps_teinture'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_teinture Heures</span></td>";
        }

    echo "<td>" . $row['date_debut_teinture'] . "</td>";
	// durée teinture
		if ($row['duree_teinture'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture Heures</span></td>";
        } elseif ($row['duree_teinture'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture Heures</span></td>";
        } 
    echo "<td>" . $row['date_fin_teinture'] . "</td>";
	//temps d'attente entre essorage et teinture
	if ($row['temps_essorage'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_essorage Heures</span></td>";
        } elseif ($row['temps_essorage'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_essorage Heures</span></td>";
        } 
    echo "<td>" . $row['date_debut_essorage'] . "</td>";
	// durée essorage
	if ($row['duree_essorage'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_essorage Heures</span></td>";
        } elseif ($row['duree_essorage'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_essorage Heures</span></td>";
        } 
    echo "<td>" . $row['date_fin_essorage'] . "</td>";
	//temps d'attente entre sechoire et essorage
		if ($row['temps_sechoire'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_sechoire Heures</span></td>";
        } elseif ($row['temps_sechoire'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_sechoire Heures</span></td>";
        }
    echo "<td>" . $row['date_debut_sechoire'] . "</td>";
	// durée sechoire
		if ($row['duree_sechoire'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sechoire Heures</span></td>";
        } elseif ($row['duree_sechoire'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sechoire Heures</span></td>";
        } 
    echo "<td>" . $row['date_fin_sechoire'] . "</td>";
	// temps d'attente entre sechoire et rame
				if ($row['temps_rameuse'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_rameuse Heures</span></td>";
        } elseif ($row['temps_rameuse'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_rameuse Heures</span></td>";
        } 
    echo "<td>" . $row['date_debut_rameuse'] . "</td>";
	// durée rame
			if ($row['duree_rameuse'] >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_rameuse Heures</span></td>";
        } elseif ($row['duree_rameuse'] < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_rameuse Heures</span></td>";
        } 
    echo "<td>" . $row['date_fin_rameuse'] . "</td>";
	// lead time total
    echo "<td>" . $total_time_hours . " heures</td>";
    echo "</tr>";
}

echo "</tbody>";

mysqli_close($conn);
?>





</tbody>
 </table>

		<script>
function filterTableByDate() {
    var startDateInput = document.getElementById("startDate");
    var endDateInput = document.getElementById("endDate");
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);
    
    var table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    var tr = table.getElementsByTagName("tr");

    for (var i = 0; i < tr.length; i++) {
        var dateCell = tr[i].getElementsByTagName("td")[4]; // Index 4 correspond à la colonne "Date Pesage"
        if (dateCell) {
            var dateValue = new Date(dateCell.textContent);
            
            if (dateValue >= startDate && dateValue <= endDate) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

		<script>
function filterTableByColor() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterColor");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3]; // Index 3 correspond à la colonne "Couleur"
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

		<script>
function filterTable() {
    // Récupérez la valeur entrée par l'utilisateur
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    // Parcourez toutes les lignes du tableau et masquez celles qui ne correspondent pas au critère de filtrage
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Vous pouvez changer l'index pour filtrer par une colonne différente
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
		<script>
function filterTableDispo() {
    // Récupérez la valeur entrée par l'utilisateur
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    // Parcourez toutes les lignes du tableau et masquez celles qui ne correspondent pas au critère de filtrage
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Vous pouvez changer l'index pour filtrer par une colonne différente
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>