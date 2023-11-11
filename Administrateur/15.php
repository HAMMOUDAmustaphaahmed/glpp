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
                        <div class="col-lg-12 d-flex align-items-stretch">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Pilotage Teinture</h5>
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
                                                        <h6 class="fw-semibold mb-0">Fin Sfaldina</h6>
                                                    </th>
													</th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Sfaldina/Teinture 1</h6>
                                                    </th>												
														<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Teinture 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Teinture 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Teinture 1/Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Essorage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Essorage/S&eacute;choire 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but S&eacute;choire 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin S&eacute;choire 1</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e S&eacute;choire 1/Spazzolato</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Spazzolato</h6>
                                                    </th>
															<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Spazzolato</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Spazzolato/Teinture 2</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Teinture 2</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin Teinture 2</h6>
                                                    </th>
														<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Teinture 2/S&eacute;choire 2</h6>
                                                    </th>
															<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but S&eacute;choire 2</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fin S&eacute;choire 2</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e S&eacute;choire 2/Rameuse</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">D&eacute;but Rameuse</h6>
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

$query4 = "SELECT
    s.dispo,
    s.sub,
    s.article,
    s.couleur,
    p.type_traitement,
    p.date_heur_pesage,
    k.date_debut_sfaldina,
    k.date_fin_sfaldina,
    t.date_debut_teinture,
    t.date_fin_teinture,
    e.date_debut_essorage,
    e.date_fin_essorage,
    r.date_debut_spazzolato,
    r.date_fin_spazzolato,
    a.date_debut_sechoire,
    a.date_fin_sechoire,
    s.date_debut_rameuse,
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
    (SELECT dispo, sub, date_debut_spazzolato, date_fin_spazzolato FROM `spazzolato`) r ON s.dispo = r.dispo AND s.sub = r.sub
LEFT JOIN
    (SELECT dispo, sub, date_debut_sechoire, date_fin_sechoire FROM `sechoire`) a ON s.dispo = a.dispo AND s.sub = a.sub



";




// Execute the query
$result4 = mysqli_query($conn, $query4);

echo "<tbody>";

// Parcourir les résultats de la requête
while ($row = mysqli_fetch_assoc($result4)) {
    echo "<tr>";

    // Calculer les durées pour chaque étape en secondes
	$duree_pesage_sfaldina = strtotime($row['date_debut_sfaldina']) - strtotime($row['date_heur_pesage']);
   $duree_sfaldina_teinture = strtotime($row['date_debut_teinture']) - strtotime($row['date_fin_sfaldina']);

    $duree_teinture_essorage = strtotime($row['date_debut_essorage']) - strtotime($row['date_fin_teinture']);
    $duree_essorage_sechoire = strtotime($row['date_debut_sechoire']) - strtotime($row['date_fin_essorage']);
    $duree_sechoire_spazzolato = strtotime($row['date_debut_spazzolato']) - strtotime($row['date_fin_sechoire']);
    $duree_spazzolato_teinture = strtotime($row['date_debut_teinture']) - strtotime($row['date_fin_spazzolato']);
    $duree_teinture_sechoire = strtotime($row['date_debut_sechoire']) - strtotime($row['date_fin_teinture']);
    $duree_sechoire_rameuse = strtotime($row['date_debut_rameuse']) - strtotime($row['date_fin_sechoire']);
$total_time_seconds = strtotime($row['date_fin_rameuse']) - strtotime($row['date_heur_pesage']);
    // Convertir les durées en heures
	
    $duree_pesage_sfaldina_hours = round($duree_pesage_sfaldina / 3600);
	$duree_sfaldina_teinture_hours = round($duree_sfaldina_teinture / 3600);

    $duree_teinture_essorage_hours = round($duree_teinture_essorage / 3600);
    $duree_essorage_sechoire_hours = round($duree_essorage_sechoire / 3600);
    $duree_sechoire_spazzolato_hours = round($duree_sechoire_spazzolato / 3600);
    $duree_spazzolato_teinture_hours = round($duree_spazzolato_teinture / 3600);
    $duree_teinture_sechoire_hours = round($duree_teinture_sechoire / 3600);
    $duree_sechoire_rameuse_hours = round($duree_sechoire_rameuse / 3600);
$total_time_hours = round($total_time_seconds / 3600);
    // Afficher les données pour chaque étape
    echo "<td>" . $row['dispo'] . "</td>";
    echo "<td>" . $row['sub'] . "</td>";
    echo "<td>" . $row['article'] . "</td>";
    echo "<td>" . $row['couleur'] . "</td>";
	echo "<td>" . $row['type_traitement'] . "</td>";
    echo "<td>" . $row['date_heur_pesage'] . "</td>";
	echo "<td>" . $duree_pesage_sfaldina_hours . " heures</td>";
    echo "<td>" . $row['date_debut_sfaldina'] . "</td>";
    echo "<td>" . $row['date_fin_sfaldina'] . "</td>";
    echo "<td>" . $duree_sfaldina_teinture_hours . " heures</td>";
    echo "<td>" . $row['date_debut_teinture'] . "</td>";
    echo "<td>" . $row['date_fin_teinture'] . "</td>";
    echo "<td>" . $duree_teinture_essorage_hours . " heures</td>";
    echo "<td>" . $row['date_debut_essorage'] . "</td>";
    echo "<td>" . $row['date_fin_essorage'] . "</td>";
    echo "<td>" . $duree_essorage_sechoire_hours . " heures</td>";
    echo "<td>" . $row['date_debut_sechoire'] . "</td>";
    echo "<td>" . $row['date_fin_sechoire'] . "</td>";
    echo "<td>" . $duree_sechoire_spazzolato_hours . " heures</td>";
    echo "<td>" . $row['date_debut_spazzolato'] . "</td>";
    echo "<td>" . $row['date_fin_spazzolato'] . "</td>";
    echo "<td>" . $duree_spazzolato_teinture_hours . " heures</td>";
    echo "<td>" . $row['date_debut_teinture'] . "</td>";
    echo "<td>" . $row['date_fin_teinture'] . "</td>";
    echo "<td>" . $duree_teinture_sechoire_hours . " heures</td>";
	   echo "<td>" . $row['date_debut_sechoire'] . "</td>";
    echo "<td>" . $row['date_fin_sechoire'] . "</td>";
	  echo "<td>" . $duree_sechoire_rameuse_hours . " heures</td>";
    echo "<td>" . $row['date_debut_rameuse'] . "</td>";
    echo "<td>" . $row['date_fin_rameuse'] . "</td>";
    echo "<td>" . $total_time_hours . " heures</td>";
    echo "</tr>";
}

echo "</tbody>";

mysqli_close($conn);
?>





</tbody>
 </table>
 <div class="text-center">
          <p class="mb-0 fs-4">Designed and Developed by Zoghlami Ahmed Seddik</p>
        </div>
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
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>