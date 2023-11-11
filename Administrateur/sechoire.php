<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilotage S&eacute;choire</title>
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
                        <div class="col-xl-12  d-flex  ">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Pilotage S&eacute;choire</h5>
                                    <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                            	<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Operateur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Machine</h6>
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
                                                        <h6 class="fw-semibold mb-0">Dur&eacute; S&eacute;choire</h6>
                                                    </th>

													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Debut S&eacute;choire</h6>
                                                    </th>
													
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Fin S&eacute;choire</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">DeltaE</h6>
                                                    </th>
                                                   	
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
include("db.php");

// Première requête
$query1 = "SELECT 
 p.dispo,
 p.sub,
 p.article,
 p.couleur,
 p.poids_dispo,
 p.poids_reel,
 p.metrage_dispo,
 s.operateur,
 s.machine,
 s.date_debut_sechoire,
 s.date_fin_sechoire,
 s.deltaE ,
 s.etat
 FROM `sechoire` s 
 LEFT JOIN `preparation` p ON s.dispo = p.dispo AND s.sub = p.sub
ORDER BY s.date_debut_sechoire DESC " ;

// Exécuter les deux requêtes
$result1 = mysqli_query($conn, $query1);




echo "<tbody>";

// Parcourir les résultats de la première requête
while ($row = mysqli_fetch_assoc($result1)) {
	$date_actuelle = date('Y-m-d H:i:s', strtotime('+1 hour'));
	$date_debut_sechoire = $row['date_debut_sechoire'];
	$date_fin_sechoire = $row['date_fin_sechoire'];
	
    $duree_sechoire = strtotime($date_debut_sechoire) - strtotime($date_fin_sechoire);
	$duree_sechoire_heur =  round($duree_sfaldina /3600);
    echo "<tr>";

        echo "<td class='border-bottom-0'>" . $row['operateur'] . "</td>";
		
		echo "<td class='border-bottom-0'>" . $row['machine'] . "</td>";
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
        echo "<td class='border-bottom-0'>" . $row['poids_dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['poids_reel'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['metrage_dispo'] . "</td>";
        if ($date_fin_schoire1 != "0000-00-00 00:00:00"){
		if ($duree_sechoire_heur >= "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-danger rounded-3 fw-semibold'>$duree_sechoire_heur Heures</span></td>";
        } elseif ($duree_sechoire_heur < "2") {
            echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>$duree_sechoire_heur Heures</span></td>";
        }
		} else{
			echo "<td class='border-bottom-0'><span class='badge bg-success rounded-3 fw-semibold'>0 Heures</span></td>";
		}
		echo "<td class='border-bottom-0'>" . $row['date_debut_sechoire'] . "</td>";
		
        echo "<td class='border-bottom-0'>" . $row['date_fin_sechoire'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['deltaE'] . "</td>";
    

    echo "</tr>";
}



echo "</tbody>";

mysqli_close($conn);
?>





</tbody>
 </table>
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
    var url = `extraction-sechoire.php?filterInput=${filterInput}&filterColor=${filterColor}&filterArticle=${filterArticle}&filterEtat=${filterEtat}&Date=${Date}&startDate=${startDate}&endDate=${endDate}`;
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
		td4 = tr[i].getElementsByTagName("td")[6]; // Index 1 correspond à la colonne "Etat"
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
  <script src="../assets/libs/simplebar/dist/simplebar.j