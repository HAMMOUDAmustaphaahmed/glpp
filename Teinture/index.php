<?php
session_start();
include("db.php");


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teinture</title>
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
                <span class="hide-menu">Donn&eacute;es Teinture</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Teinture</span>
              </a>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="blocage.php" aria-expanded="true">
                <span>
                  <i class="ti ti-barrier-block"></i>
                </span>
                <span class="hide-menu">Blocage Teinture</span>
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

            <option>Hatem Belwaer</option>
            <option>Khayri Souid</option>
            <option>Mansour Elwaer</option>
            <option>Rafik Bssili</option>
            <option>Rami lahouel</option>
            <option>Sayfeddine Ghali</option>
			<option>Saber Derbali</option>
            <option>Wahid Khadraoui</option>
            <option>Zied Missaoui</option>
            <option>Chaabene Azouzi</option>
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
                        <div class="col-lg-10 mx-auto  ">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Teinture</h5>
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
                                                        <h6 class="fw-semibold mb-0">Etape Pr&eacute;c&eacute;dente</h6>
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


// Première requête
$query1 = "SELECT  DISTINCT p.id AS preparation_id, s.dispo, s.sub, s.article, s.couleur,s.operateur, s.etat,s.date_debut_teinture,s.date_fin_teinture,s.etape, sf.date_fin_sfaldina 
          FROM `teinture` s 
           LEFT JOIN  `preparation` p on s.dispo = p.dispo AND s.sub = p.sub 
          LEFT JOIN `sfaldina` sf ON s.dispo = sf.dispo AND s.sub = sf.sub 
          WHERE sf.date_fin_sfaldina != '0000-00-00 00:00:00' AND s.etape = 'teinture1'
		  AND (s.article != 'WG9' AND s.article != 'F9H' AND s.article != 'MT1'   )
ORDER BY sf.date_fin_sfaldina DESC		  ";

// Deuxième requête
$query2 = "SELECT  DISTINCT p.id AS preparation_id,s.dispo, s.sub, s.article, s.couleur,s.operateur, s.etat,s.date_debut_teinture,s.date_fin_teinture, sf.date_fin_spazzolato,s.etape
          FROM `teinture` s 
          LEFT JOIN  `preparation` p on s.dispo = p.dispo AND s.sub = p.sub AND s.etape = 'teinture2'
          LEFT JOIN `spazzolato` sf ON s.dispo = sf.dispo AND s.sub = sf.sub AND s.etape = 'teinture2'
          WHERE  sf.date_fin_spazzolato != '0000-00-00 00:00:00' AND s.etape = 'teinture2'
		  ORDER BY sf.date_fin_spazzolato DESC	";
		  // troisieme requête
$query3 = "SELECT  DISTINCT p.id AS preparation_id,p.dispo, p.sub, s.article, p.couleur,p.operateur,   p.date_heur_pesage, s.date_debut_teinture,s.etape,s.etat,s.date_fin_teinture
          FROM `teinture` s 
          LEFT JOIN  `preparation` p on s.dispo = p.dispo AND s.sub = p.sub AND s.etape='teinture1'
		  WHERE  p.date_heur_pesage != '0000-00-00 00:00:00' AND (p.article = 'WG9' OR p.article = 'F9H' OR s.article = 'MT1'  )
ORDER BY p.date_heur_pesage DESC	";

// Exécuter les deux requêtes
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);


echo "<tbody>";

// Parcourir les résultats de la première requête
while ($row = mysqli_fetch_assoc($result1)) {
	$date_fin_sfaldina = $row['date_fin_sfaldina'];
	$date_debut_teinture = $row['date_debut_teinture'];
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $duree_sfaldina_teinture = strtotime($date_actuelle) - strtotime($date_fin_sfaldina);
	$duree_sfaldina_teinture_heur =  round($duree_sfaldina_teinture /3600);
	$date_fin_teinture = $row['date_fin_teinture'];
	$duree_debut =strtotime($date_debut_teinture) - strtotime($date_fin_sfaldina);
    $duree_debut_heur =  round($duree_debut /3600);
	

	$etat = $row['etat'];
	
	$oneDayAgo =date('Y-m-d H:i:s', strtotime('-2 day'));
	 if (($etat == "termine" && $date_fin_teinture>=$oneDayAgo) || $etat != "termine"  ) {
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

    echo "<td class='border-bottom-0'>" . $row['date_fin_sfaldina'] . "</td>";
	
	
	if ($etat == 'en attente') {
	if ($duree_sfaldina_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina_teinture_heur Heures</span></td>";
        } elseif ($duree_sfaldina_teinture_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina_teinture_heur Heures</span></td>";
        } 
	} else {
	    if ($duree_debut_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_debut_heur Heures</span></td>";
        } elseif ($duree_debut_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_debut_heur Heures</span></td>";
        }
		
	}	
		
    echo "<td class='border-bottom-0'>";
	 if ($row['etat'] == 'bloque') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] ."&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    } elseif ($row['etat'] == 'en cours reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'fin reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en attente') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en cours') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'termine') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition

    }
    
    echo "</td>";

    echo "</tr>";

}
}
// Parcourir les résultats de la deuxième requête
while ($row = mysqli_fetch_assoc($result2)) {
	$date_fin_spazzolato = $row['date_fin_spazzolato'];
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));	
    $duree_sfaldina_teinture = strtotime($date_actuelle) - strtotime($date_fin_spazzolato);
	$duree_sfaldina_teinture_heur =  round($duree_sfaldina_teinture /3600);
		$date_fin_teinture = $row['date_fin_teinture'];
		$date_debut_teinture = $row['date_debut_teinture'];
		$duree_debut =strtotime($date_debut_teinture) - strtotime($date_fin_spazzolato);
    $duree_debut_heur =  round($duree_debut /3600);
	$etat = $row['etat'];
	$oneDayAgo =date('Y-m-d H:i:s', strtotime('-1 day'));
	 if (($etat == "termine" && $date_fin_teinture>=$oneDayAgo) || $etat != "termine" ) {
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

    echo "<td class='border-bottom-0'>" . $row['date_fin_spazzolato'] . "</td>";
	if ($etat == 'en attente') {
	if ($duree_sfaldina_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina_teinture_heur Heures</span></td>";
        } elseif ($duree_sfaldina_teinture_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina_teinture_heur Heures</span></td>";
        } 
	} else {
	    if ($duree_debut_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_debut_heur Heures</span></td>";
        } elseif ($duree_debut_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_debut_heur Heures</span></td>";
        }
		
	}
     echo "<td class='border-bottom-0'>";
	 if ($row['etat'] == 'bloque') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] ."&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    } elseif ($row['etat'] == 'en cours reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'fin reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en attente') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en cours') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'termine') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition

    }
    echo "</td>";

    echo "</tr>";
}
}
// Parcourir les résultats de la troisieme requête
while ($row = mysqli_fetch_assoc($result3)) {
	$date_heur_pesage = $row['date_heur_pesage'];
	$date_debut_teinture = $row['date_debut_teinture'];
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $duree_preparation_teinture = strtotime($date_debut_teinture) - strtotime($date_heur_pesage);
	$duree_preparation_teinture_heur =  round($duree_preparation_teinture /3600);
	 $duree_preparation_teinture_empty = strtotime($date_actuelle) - strtotime($date_heur_pesage);
	$duree_preparation_teinture_empty_heur =  round($duree_preparation_teinture_empty /3600);
	$date_fin_teinture = $row['date_fin_teinture'];
	$etat = $row['etat'];
	$oneDayAgo =date('Y-m-d H:i:s', strtotime('-2 day'));
	 if (($etat == "termine" && $date_fin_teinture>=$oneDayAgo) || $etat != "termine"  ) {
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
    } else {
        echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
    }

    echo "<td class='border-bottom-0'>" . $row['date_heur_pesage'] . "</td>";
	if ($etat != 'en attente') {
		if ($duree_preparation_teinture_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_preparation_teinture_heur Heures</span></td>";
        } else {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_preparation_teinture_heur Heures</span></td>";
        }
	} else {
		if ($duree_preparation_teinture_empty_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_preparation_teinture_empty_heur Heures</span></td>";
        } else {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_preparation_teinture_empty_heur Heures</span></td>";
        }
	}		
        echo "<td class='border-bottom-0'>";
	 if ($row['etat'] == 'bloque') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] ."&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    } elseif ($row['etat'] == 'en cours reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'fin reparation') {
        echo "<a href='edit-reparation.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en attente') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'en cours') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
    }elseif ($row['etat'] == 'termine') {
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "&etape=" . $row['etape'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition

    }
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
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>