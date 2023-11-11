<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spazzolato</title>
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
                        
         
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Donn&eacute;es Spazzolato</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Spazzolato</span>
              </a>
            </li>
			                 <li class="sidebar-item">
              <a class="sidebar-link" href="blocage.php" aria-expanded="true">
                <span>
                  <i class="ti ti-barrier-block"></i>
                </span>
                <span class="hide-menu">Blocage Spazzolato</span>
              </a>
            </li>
          <div class="form-group">
    <label for="filterInput">Filtrer par Dispo :</label>
    <input type="text" id="filterInput" class="form-control" onkeyup="filterTable()" placeholder="Entrez un dispo...">
</div>

<div class="form-group">
  <label for="filterInput2">Filtrer par Etat :</label>
  <select type="text" id="filterInput2" class="form-select" onchange="filterTableEtat1()">
    <option >En attente</option>
    <option >En cours</option>
    <option >termin&eacute;</option>
  </select>
</div>
          </ul>
	      <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary d-block">LOG OUT</a>
  </div>
   
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
<div class="content-wrapper">
<div class="container ">

          
                    <div class="card-body">
                        <div class=" col-lg-10 mx-auto  ">
                            
                                <div class="card-body p-4 ">
                                    <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Spazzolato</h5>
                                     <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Op&eacute;rateur</h6>
                                                    </th>
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
                                                        <h6 class="fw-semibold mb-0">Date S&eacute;choire</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Temps d'Attente</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
include("db.php");

$query = "SELECT DISTINCT p.id AS preparation_id,  s.dispo, s.sub, s.article, s.couleur, s.etat, sf.date_fin_sechoire,s.date_debut_spazzolato, s.operateur,sf.etape
          FROM `spazzolato` s 
          LEFT JOIN `preparation` p ON s.dispo = p.dispo 
          LEFT JOIN `sechoire` sf ON s.dispo = sf.dispo 
          WHERE (sf.date_fin_sechoire >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
		  )
          AND sf.date_fin_sechoire != '0000-00-00 00:00:00' AND sf.etape = 'sechoire1'";

$result = mysqli_query($conn, $query);

$currentDateTime = new DateTime();
$oneDayAgo = clone $currentDateTime;
$oneDayAgo->modify('-1 day');

echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
	$etat = $row['etat'];
$date_debut_spazzolato = $row['date_debut_spazzolato'];
  $date_fin_sechoire = $row['date_fin_sechoire'];
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	
    $duree_essorage_sechoire = strtotime($date_actuelle) - strtotime($date_fin_sechoire);
	$duree_essorage_sechoire_heur =  round($duree_essorage_sechoire /3600);
	
	$duree_attente = strtotime($date_debut_spazzolato) - strtotime($date_fin_sechoire);
	$duree_attente_heur =  round($duree_attente /3600);

    
        echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['operateur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";

        if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
    } elseif ($row['etat'] == 'bloque') {
        echo "<td class='border-bottom-0'><span class='badge bg-dark rounded-3 fw-semibold'>bloqu&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }

        echo "<td class='border-bottom-0'>" . $row['date_fin_sechoire'] . "</td>";
		if ($etat == "en attente") {
			if ($duree_essorage_sechoire_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_essorage_sechoire_heur Heures</span></td>";
        } elseif ($duree_essorage_sechoire_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_essorage_sechoire_heur Heures</span></td>";
        }
		}else{
			if ($duree_attente_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_attente_heur Heures</span></td>";
        } elseif ($duree_attente_heur< "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_attente_heur Heures</span></td>";
        }	
		}
        echo "<td class='border-bottom-0'>";
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo "</td>";

        echo "</tr>";
    
}

echo "</tbody>";

mysqli_close($conn);
?>


</tbody>
 </table>
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
        td = tr[i].getElementsByTagName("td")[1]; // Vous pouvez changer l'index pour filtrer par une colonne différente
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
function filterTableEtat1() {
    // Get the user input value
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Replace "myTable" with the ID of your table
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows and hide those that don't match the filter criteria
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5]; // You can change the index to filter by a different column
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