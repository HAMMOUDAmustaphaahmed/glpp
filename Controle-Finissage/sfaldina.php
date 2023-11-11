<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilotage Sfaldina</title>
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
  <label for="filterEtat">Filtrer par Etat :</label>
  <select type="text" id="filterEtat" class="form-select" onchange="filterTableDispo()">
  <option ></option>
    <option >En attente</option>
    <option >En cours</option>
    <option >termin&eacute;</option>

  </select>
</div>
                    <div class="form-group">
    <label for="filterInput">Filtrer par Dispo :</label>
    <input type="text" id="filterInput" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un dispo...">
</div>

			<div class="form-group">
    <label for="filterArticle">Filtrer par Article :</label>
    <input type="text" id="filterArticle" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un article...">
</div>
<div class="form-group">
    <label for="filterColor">Filtrer par Couleur :</label>
    <input type="text" id="filterColor" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez une couleur...">
</div>
<div class="form-group">
    <label for="Date">Date :</label>
    <input type="date" id="Date" class="form-control" >
</div>

 </ul>
<div class="fmt-3 d-flex justify-content-center align-items-center">
    <button onclick="filterTableDispo()" class="btn btn-primary">Filtrer par date</button>
</div>
<div class="my-3"></div>
<div class="form-group">
    <label for="startDate">Date de D&eacute;but :</label>
    <input type="date" id="startDate" class="form-control">
</div>

<div class="form-group">
    <label for="endDate">Date de Fin :</label>
    <input type="date" id="endDate" class="form-control">
</div>
<div class="my-3"></div>
<div class="fmt-3 d-flex justify-content-center align-items-center">
    <button onclick="filterTableDispo()" class="btn btn-primary">Filtrer par dur&eacute;e</button>
</div>
<div class="my-3"></div>
<div class="fmt-3 d-flex justify-content-center align-items-center">
 <button id="exportButton" class="btn btn-success" >Exporter</button>
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
                        <div class="col-xl-12  d-flex ">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Pilotage Sfaldina</h5>
                                    <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                            	<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Operateur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Etat</h6>
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
                                                        <h6 class="fw-semibold mb-0">Poids Sur Dispo</h6>
                                                    </th>
													</th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Poids R&eacute;el</h6>
                                                    </th>
														<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">M&eacute;trage Sur Dispo</h6>
                                                    </th>
													
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Heure Pesage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Temps d'Attente</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Debut Sfaldina</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Fin Sfaldina</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dur&eacute;e Sfaldina</h6>
                                                    </th>
                                                  
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Nombre Chariots</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Num&eacute;ro Chariot</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
include("db.php");

$query = "SELECT DISTINCT 
 s.dispo,
 s.sub,
 s.article,
 s.couleur,
 p.poids_dispo,
 p.poids_reel,
 p.metrage_dispo,
 p.date_heur_pesage,
 s.date_debut_sfaldina,
 s.date_fin_sfaldina,
 s.operateur,
 s.num_chariot,
 s.etat,
 s.nb_chariots 
FROM `sfaldina` s 
LEFT JOIN `preparation` p ON s.dispo = p.dispo AND s.sub = p.sub
ORDER BY s.date_debut_sfaldina DESC";
$result = mysqli_query($conn, $query);



while ($row = mysqli_fetch_assoc($result)) {
  $date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_sfaldina = $row['date_debut_sfaldina'];
	$date_fin_sfaldina = $row['date_fin_sfaldina'];
	$date_heur_pesage = $row['date_heur_pesage'];
    $duree_sfaldina = strtotime($date_fin_sfaldina) - strtotime($date_debut_sfaldina);
	$duree_sfaldina_heur =  round($duree_sfaldina /3600);
    $temps_attente = strtotime($date_debut_sfaldina) - strtotime($date_heur_pesage);
	$temps_attente_heur =round($temps_attente/3600);
	$temps_attente_empty = strtotime($date_actuelle) - strtotime($date_heur_pesage);
	$temps_attente_empty_heur = round($temps_attente_empty/3600);
        echo "<tr>";

        
        echo "<td class='border-bottom-0'>" . $row['operateur'] . "</td>";
		if ($row['etat'] == 'en attente') {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>en attente</span></td>";
        } elseif ($row['etat'] == 'en cours') {
            echo "<td class='border-bottom-0'><span  class='badge bg-warning rounded-3 fw-semibold'>en cours</span></td>";
        } elseif ($row['etat'] == 'termine') {
            echo "<td class='border-bottom-0'><span  class='badge bg-success rounded-3 fw-semibold'>termin&eacute;</span></td>";
        } else {
            echo "<td class='border-bottom-0'>" . $row['etat'] . "</td>";
        }
		
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";

        echo "<td class='border-bottom-0'>" . $row['poids_dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['poids_reel'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['metrage_dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['date_heur_pesage'] . "</td>";
		if ($date_debut_sfaldina != "0000-00-00 00:00:00"){
		if ($temps_attente_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_attente_heur Heures</span></td>";
        } elseif ($temps_attente_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_attente_heur Heures</span></td>";
        }
		} else{
			if ($temps_attente_empty_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$temps_attente_empty_heur Heures</span></td>";
        } elseif ($temps_attente_empty_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$temps_attente_empty_heur Heures</span></td>";
        }
		}
		echo "<td class='border-bottom-0'>" . $row['date_debut_sfaldina'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['date_fin_sfaldina'] . "</td>";
		if ($date_fin_sfaldina != "0000-00-00 00:00:00"){
		if ($duree_sfaldina_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        } elseif ($duree_sfaldina_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sfaldina_heur Heures</span></td>";
        }
		} else{
			echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>0 Heures</span></td>";
		}
		echo "<td class='border-bottom-0'>" . $row['nb_chariots'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['num_chariot'] . "</td>";
		

        echo "</tr>";
    }


mysqli_close($conn);
?>





</tbody>
 </table>
</div>
</div>
</div>
<script>

document.getElementById("exportButton").addEventListener("click", function() {
    var filterInput = document.getElementById("filterInput").value;
    var filterColor = document.getElementById("filterColor").value;
    var filterArticle = document.getElementById("filterArticle").value;
	var filterEtat = document.getElementById("filterEtat").value;
	var Date = document.getElementById("Date").value;
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    // Redirigez l'utilisateur vers le script 152.php avec les valeurs des filtres en tant que paramètres GET
    var url = `extraction-sfaldina.php?filterInput=${filterInput}&filterColor=${filterColor}&filterArticle=${filterArticle}&filterEtat=${filterEtat}&Date=${Date}&startDate=${startDate}&endDate=${endDate}`;
    window.location.href = url;
});
</script>
<script>
function filterTableDispo() {
    // Récupérez les valeurs entrées par l'utilisateur
    var input1, input2, input3, input4, filter1, filter2, filter3,filter4, table, tr, td1, td2, td3,td4,i, txtValue1, txtValue2, txtValue3, txtValue4;
    input1 = document.getElementById("filterInput");
    input2 = document.getElementById("filterColor");
    input3 = document.getElementById("filterArticle");
	input4 = document.getElementById("filterEtat");
    filter1 = input1.value.toUpperCase();
    filter2 = input2.value.toUpperCase();
    filter3 = input3.value.toUpperCase();
	filter4 = input4.value.toUpperCase();
    var startDateInput = document.getElementById("Date");
    var selectedDate = startDateInput.value.trim(); // Trim pour enlever les espaces
    var startDateInput = document.getElementById("startDate");
    var endDateInput = document.getElementById("endDate");
    var startTimestamp = new Date(startDateInput.value).getTime();

	// Obtenez la date de endDateInput
    var endDateValue = new Date(endDateInput.value);
    // Ajoutez un jour à la date
    endDateValue.setDate(endDateValue.getDate() );
    // Obtenez le timestamp de la nouvelle date (endDateValue + 1 jour)
    var endTimestamp = endDateValue.getTime();
	
    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    // Parcourez toutes les lignes du tableau et masquez celles qui ne correspondent pas aux critères de filtrage
    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[2]; // Index 2 correspond à la colonne "Nom"
        td2 = tr[i].getElementsByTagName("td")[5]; // Index 5 correspond à la colonne "Couleur"
        td3 = tr[i].getElementsByTagName("td")[4]; // Index 4 correspond à la colonne "Article"
		td4 = tr[i].getElementsByTagName("td")[1]; // Index 1 correspond à la colonne "Etat"
        var dateCell = tr[i].getElementsByTagName("td")[11]; // Index 12 correspond à la colonne "Date Pesage"
        if (td1 && td2 && td3 && td4 && dateCell) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
			txtValue4 = td4.textContent || td4.innerText;
            var dateValue = new Date(dateCell.textContent);
            // Vérifiez si la valeur de la colonne "Nom" correspond au filtre 1, si la valeur de la colonne "Couleur" correspond au filtre 2,
            // et si la valeur de la colonne "Article" correspond au filtre 3, et si la date correspond à la date sélectionnée (si elle n'est pas vide)
        if (txtValue1.toUpperCase().includes(filter1) && 
            txtValue2.toUpperCase().includes(filter2) && 
            txtValue3.toUpperCase().includes(filter3) && 
			txtValue4.toUpperCase().includes(filter4) && 
            (selectedDate === "" || dateValue.toDateString() === new Date(selectedDate).toDateString()) &&
            (!startTimestamp || !endTimestamp || (dateValue >= startTimestamp && dateValue <= (endTimestamp)))) {
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
  <script src="../assets/libs/simplebar/dist/simplebar.js