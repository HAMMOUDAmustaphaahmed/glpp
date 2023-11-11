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
  <title>Controle Greggio</title>
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
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Liste Greggio</span>
              </a>
         </li>            
 
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="gregio.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Ajouter Greggio</span>
              </a>
            </li>
		  		                 
								 			<div class="form-group">
    <label for="filterArticle">Filtrer par Article :</label>
    <input type="text" id="filterArticle" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un article...">
</div>
<div class="form-group">
  <label for="filterEtat">Filtrer par Fournisseur :</label>
 <input type="text" id="filterEtat" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un fournisseur...">
</div>
<div class="form-group">
    <label for="filterColor">Filtrer par Lot Fournisseur :</label>
    <input type="text" id="filterColor" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un lot...">
</div>

                    <div class="form-group">
    <label for="filterInput">Filtrer par Facture :</label>
    <input type="text" id="filterInput" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez une facture...">
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

          
                  
                         <div class="col-xl col-lg-12 d-flex col-md-4 mx-auto">
                            
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Greggio</h5>
                                    <div class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover">
                                        
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Article</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Fournisseur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Lot Fournisseur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Lot Interne</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Facture</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Arrivage</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Machine</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">LFA (1 fil)</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">LFA (2 fils)</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">LFA (3 fils)</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Poids</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Largeur</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Dispo Test</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Test Teinture</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Note</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date Controle</h6>
                                                    </th>
													
                                                  <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php


$result = mysqli_query($conn, "SELECT DISTINCT * FROM `greggio`  "); // Retrieve data from the database
$row = mysqli_fetch_assoc($result);
 


while ($row = mysqli_fetch_assoc($result)) {
        
        echo "<tr>";
        
        echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['fournisseur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['lotfournisseur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['lotinterne'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['facture'] . "</td>";
        echo "<td class='border-bottom-0'>" . date('d/m/Y', strtotime($row['datearrivage'])) . "</td>";

        echo "<td class='border-bottom-0'>" . $row['machine'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['lfa1'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['lfa2'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['lfa3'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['poids'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['largeur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['dispo_test'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['testteinture'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['note'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['date_control'] . "</td>";
		echo "<td class='border-bottom-0'>";
        echo "<a href='edit.php?id=" . $row['id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
       
        echo "</td>";
        echo "</tr>";
		
}

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
    var url = `extraction-greggio.php?filterInput=${filterInput}&filterColor=${filterColor}&filterArticle=${filterArticle}&filterEtat=${filterEtat}&Date=${Date}&startDate=${startDate}&endDate=${endDate}`;
    window.location.href = url;
});
</script>


		<script>
function filterTableDispo() {
    // Récupérez les valeurs entrées par l'utilisateur
    var filterInput, filterColor, filterArticle, filterEtat, filterDate, startDate, endDate, table, tr, td1, td2, td3, td4, td5, i, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5;
    filterInput = document.getElementById("filterInput").value.toUpperCase();
    filterColor = document.getElementById("filterColor").value.toUpperCase();
    filterArticle = document.getElementById("filterArticle").value.toUpperCase();
    filterEtat = document.getElementById("filterEtat").value.toUpperCase();
    filterDate = document.getElementById("Date").value; // Date sélectionnée par l'utilisateur
    startDate = document.getElementById("startDate").value;
    endDate = document.getElementById("endDate").value;

    // Convertissez la date en timestamp si elle n'est pas vide
    var selectedDateTimestamp = filterDate ? new Date(filterDate).getTime() : null;
    var startTimestamp = startDate ? new Date(startDate).getTime() : null;
    var endTimestamp = endDate ? new Date(endDate).getTime() : null;

    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    // Parcourez toutes les lignes du tableau et masquez celles qui ne correspondent pas aux critères de filtrage
    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[4]; // Index 4 correspond à la colonne "Facture"
        td2 = tr[i].getElementsByTagName("td")[2]; // Index 2 correspond à la colonne "Lot Fournisseur"
        td3 = tr[i].getElementsByTagName("td")[0]; // Index 0 correspond à la colonne "Article"
        td4 = tr[i].getElementsByTagName("td")[1]; // Index 1 correspond à la colonne "Fournisseur"
        td5 = tr[i].getElementsByTagName("td")[5]; // Index 5 correspond à la colonne "Date Arrivage"
		
        if (td1 && td2 && td3 && td4 && td5) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            txtValue4 = td4.textContent || td4.innerText;
            txtValue5 = td5.textContent || td5.innerText;
var dateArrivage = new Date(txtValue5.split('/').reverse().join('-')); // Convertit la date au format ISO 8601

			
            // Vérifiez si les valeurs de chaque colonne correspondent aux filtres respectifs
            if (txtValue1.toUpperCase().includes(filterInput) &&
                txtValue2.toUpperCase().includes(filterColor) &&
                txtValue3.toUpperCase().includes(filterArticle) &&
                txtValue4.toUpperCase().includes(filterEtat) &&
                (filterDate === "" || dateArrivage.toDateString() === new Date(selectedDateTimestamp).toDateString()) &&
                (!startTimestamp || !endTimestamp || (new Date(txtValue5).getTime() >= startTimestamp && new Date(txtValue5).getTime() <= (endTimestamp)))) {
                tr[i].style.display = ""; // Affichez la ligne si elle correspond aux critères
            } else {
                tr[i].style.display = "none"; // Masquez la ligne sinon
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