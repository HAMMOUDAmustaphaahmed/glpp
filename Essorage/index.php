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
  <title>Essorage</title>
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
                <span class="hide-menu">Donn&eacute;es Essorage</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Essorage</span>
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
      <div class="form-group">
  <label for="filterInput2">Filtrer par Operateur :</label>
  <select type="text" id="filterInput3" class="form-select" onchange="filterTableOperateur()">
            <option>Abdelkrim Jerbi</option>
			<option>Ali Thabet</option>
            <option>Mohamed Hedi Mefteh</option>
			<option>Nacer Guebsi</option>
			<option>Oussema</option>
			<option>Ramzi Jouini</option>
			<option>Riadh Nourani</option>
			<option>Saif Khalfaoui</option>
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
<div class="page-wrapper">
<div class="container ">

          
                    <div class="card-body">
                        <div class=" col-lg-10 mx-auto    ">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Essorage</h5>
                                    <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
                                        
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Operateur</h6>
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
                                                        <h6 class="fw-semibold mb-0">Date Teinture</h6>
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
$query = "SELECT  DISTINCT p.id AS preparation_id, s.dispo, s.sub, s.article, s.couleur,s.operateur,s.date_debut_essorage, s.etat,s.date_fin_essorage, sf.date_fin_teinture 
          FROM `essorage` s 
          LEFT JOIN `preparation` p ON s.dispo = p.dispo AND s.dispo = p.dispo
          LEFT JOIN `teinture` sf ON s.dispo = sf.dispo AND s.sub = p.sub
          WHERE (sf.date_fin_teinture != '0000-00-00 00:00:00')
		  ORDER BY sf.date_fin_teinture DESC";

$result = mysqli_query($conn, $query);


echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
	$date_fin_teinture = $row['date_fin_teinture'];
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_essorage = $row['date_debut_essorage'];
	$duree_teinture_essorage = strtotime($date_debut_essorage) - strtotime($date_fin_teinture);
	$duree_teinture_essorage_heur =  round($duree_teinture_essorage /3600);
    $duree_teinture_essorage_empty = strtotime($date_actuelle) - strtotime($date_fin_teinture);
	$duree_teinture_essorage_empty_heur =  round($duree_teinture_essorage_empty /3600);
	$etat = $row['etat'];
	$date_fin_essorage = $row['date_fin_essorage'];
    $oneDayAgo =date('Y-m-d H:i:s', strtotime('-1 day'));
	 if (($etat == "termine" && $date_fin_essorage>=$oneDayAgo) || $date_fin_essorage =="0000-00-00 00:00:00"  ) {
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
    }elseif ($row['etat'] == 'en cours reparation') {
        echo "<td class='border-bottom-0'><span class='badge bg-warning rounded-3 fw-semibold'>en cours reparation</span></td>";
    }elseif ($row['etat'] == 'fin reparation') {
        echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>fin reparation</span></td>";
    } else {
        echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
    }

        echo "<td class='border-bottom-0'>" . $row['date_fin_teinture'] . "</td>";
		if ($date_debut_essorage != "0000-00-00 00:00:00") {
		if ($duree_teinture_essorage_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture_essorage_heur Heures</span></td>";
        } else {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture_essorage_heur Heures</span></td>";
        }
		} else {
			if ($duree_teinture_essorage_empty_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_teinture_essorage_empty_heur Heures</span></td>";
        } else {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_teinture_essorage_empty_heur Heures</span></td>";
        }
		}
        echo "<td class='border-bottom-0'>";
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo "</td>";

        echo "</tr>";
    
}
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
<script>
function filterTableOperateur() {
    // Get the user input value
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterInput3");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Replace "myTable" with the ID of your table
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows and hide those that don't match the filter criteria
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // You can change the index to filter by a different column
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
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>