<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilotage Preparation</title>
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
    <label for="filterArticle">Filtrer par Article :</label>
    <input type="text" id="filterArticle" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un article...">
</div>
<div class="form-group">
    <label for="filterColor">Filtrer par Couleur :</label>
    <input type="text" id="filterColor" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez une couleur...">
</div>
<div class="form-group">
    <label for="filterFournisseur">Filtrer par Fournisseur :</label>
    <input type="text" id="filterFournisseur" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un Fournisseur...">
</div>
<div class="form-group">
    <label for="filterCabb">Filtrer par Cabb :</label>
    <input type="text" id="filterCabb" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez Cabb...">
</div>
<div class="form-group">
    <label for="filterGreggio">Filtrer par Lot de Greggio :</label>
    <input type="text" id="filterGreggio" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un Lot de Greggio...">
</div>
<div class="form-group">
    <label for="filterTraitement">Filtrer par Type de Traitement :</label>
    <input type="text" id="filterTraitement" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez un Type de Traitement...">
</div>
<div class="form-group">
    <label for="filterNote">Filtrer par Note :</label>
    <input type="text" id="filterNote" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez une Note...">
</div>
<div class="form-group">
    <label for="filterSemaine">Filtrer par Semaine :</label>
    <input type="text" id="filterSemaine" class="form-control" onkeyup="filterTableDispo()" placeholder="Entrez une semaine...">
</div>
<div class="form-group">
    <label for="Date">Date :</label>
    <input type="date" id="Date" class="form-control" >
</div>

<div class="my-3"></div>
<div class="fmt-3 d-flex justify-content-center align-items-center">
    <button onclick="filterTableDispo   ()" class="btn btn-primary">Filtrer par date</button>
</div>

<div class="form-group">
    <label for="startDate">Date de D&eacute;but :</label>
    <input type="date" id="startDate" class="form-control">
</div>

<div class="form-group">
    <label for="endDate">Date de Fin :</label>
    <input type="date" id="endDate" class="form-control">
</div>
<div class="my-2"></div>
<div class="fmt-3 d-flex justify-content-center align-items-center">
    <button onclick="filterTableDispo()" class="btn btn-primary">Filtrer par dur&eacute;e</button>
</div>
  <div class="my-3"></div>
<div class="fmt-3 d-flex justify-content-center align-items-center">
 <button id="exportButton" class="btn btn-success" >Exporter</button>
</div>        
      <div class="my-5"></div><div></div>   
   <span>	  
	 </ul>	      

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
    <div class="col-xl col-lg-12 d-flex col-md-4 mx-auto">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Pilotage Pr&eacute;paration</h5>
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
                                <h6 class="fw-semibold mb-0">Fournisseur</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Cabb</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Type De Traitement</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Num&eacute;ro Du Lot</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Poids Sur Dispo</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Poids R&eacute;el</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">M&eacute;trage Sur Dispo</h6>
                            </th>
							<th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Poids Th&eacute;orique</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date Heure Pesage</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Semaine</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Note</h6>
                            </th>
							<th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Groupe</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM `preparation` ORDER BY date_heur_pesage DESC"); // Retrieve data from the database



while ($row = mysqli_fetch_assoc($result)) {
   

    // Compare if the row's date_heur_pesage is within the last 24 hours
    
        echo "<tr>";
        echo "<td class='border-bottom-0'>" . $row['operateur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['sub'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['fournisseur'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['cabb'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['type_traitement'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['numero_lot'] . "</td>";

        echo "<td class='border-bottom-0'>" . $row['poids_dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['poids_reel'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['metrage_dispo'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['poids_theorique'] . "</td>";
        echo "<td class='border-bottom-0'>" . $row['date_heur_pesage'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['semaine'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['note'] . "</td>";
		echo "<td class='border-bottom-0'>" . $row['groupe'] . "</td>";
		echo "<td class='border-bottom-0'>";
        echo "<a href='edit.php?id=" . $row['id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo "<a href='supprimer.php?id=" . $row['id'] . "'><i class='ti ti-trash'></i></a>"; // Icône de suppression
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
	var filterFournisseur = document.getElementById("filterFournisseur").value;
	var filterCabb = document.getElementById("filterCabb").value;
	var filterTraitement = document.getElementById("filterTraitement").value;
	var filterGreggio = document.getElementById("filterGreggio").value;
	var filterNote = document.getElementById("filterNote").value;
	var filterSemaine = document.getElementById("filterSemaine").value;
	var Date = document.getElementById("Date").value;
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    // Redirigez l'utilisateur vers le script 152.php avec les valeurs des filtres en tant que paramètres GET
    var url = `extraction-preparation.php?filterInput=${filterInput}&filterColor=${filterColor}&filterArticle=${filterArticle}&filterNote=${filterNote}&filterSemaine=${filterSemaine}&filterFournisseur=${filterFournisseur}&filterGreggio=${filterGreggio}&filterCabb=${filterCabb}&filterTraitement=${filterTraitement}&Date=${Date}&startDate=${startDate}&endDate=${endDate}`;
    window.location.href = url;
});
</script>


<script>
function filterTableDispo() {
    // Récupérez les valeurs entrées par l'utilisateur
    var input1, input2, input3, input4, input5, input6, input7, input8, input9, filter1, filter2, filter3, filter4, filter5, filter6, filter7, filter8, filter9, table, tr, td1, td2, td3, td4, td5, td6, td7, td8, td9, i, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5, txtValue6, txtValue7, txtValue8, txtValue9;
    input1 = document.getElementById("filterInput");
    input2 = document.getElementById("filterColor");
    input3 = document.getElementById("filterArticle");
    input4 = document.getElementById("filterFournisseur"); // Ajout du filtre pour la colonne 5
    input5 = document.getElementById("filterCabb"); // Ajout du filtre pour la colonne 6
    input6 = document.getElementById("filterTraitement"); // Ajout du filtre pour la colonne 7
    input7 = document.getElementById("filterGreggio"); // Ajout du filtre pour la colonne 8
    input8 = document.getElementById("filterNote"); // Ajout du filtre pour la colonne 14
    input9 = document.getElementById("filterSemaine"); // Ajout du filtre pour la colonne 13
	
    filter1 = input1.value.toUpperCase();
    filter2 = input2.value.toUpperCase();
    filter3 = input3.value.toUpperCase();
    filter4 = input4.value.toUpperCase(); // Filtre pour la colonne 5
    filter5 = input5.value.toUpperCase(); // Filtre pour la colonne 6
    filter6 = input6.value.toUpperCase(); // Filtre pour la colonne 7
    filter7 = input7.value.toUpperCase(); // Filtre pour la colonne 8
    filter8 = input8.value.toUpperCase(); // Filtre pour la colonne 14
    filter9 = input9.value.toUpperCase(); // Filtre pour la colonne 13
    var startDateInput = document.getElementById("Date");
    var selectedDate = startDateInput.value.trim();
    var startDateInput = document.getElementById("startDate");
    var endDateInput = document.getElementById("endDate");
    var startTimestamp = new Date(startDateInput.value).getTime();

    var endDateValue = new Date(endDateInput.value);
    endDateValue.setDate(endDateValue.getDate() + 1);
    var endTimestamp = endDateValue.getTime();

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[4];
        td3 = tr[i].getElementsByTagName("td")[3];
        td4 = tr[i].getElementsByTagName("td")[5]; // Colonne 5
        td5 = tr[i].getElementsByTagName("td")[6]; // Colonne 6
        td6 = tr[i].getElementsByTagName("td")[7]; // Colonne 7
        td7 = tr[i].getElementsByTagName("td")[8]; // Colonne 8
        td8 = tr[i].getElementsByTagName("td")[15]; // Colonne 14
        td9 = tr[i].getElementsByTagName("td")[14]; // Colonne 13
		
        if (td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8 && td9) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            txtValue4 = td4.textContent || td4.innerText; // Valeur pour la colonne 5
            txtValue5 = td5.textContent || td5.innerText; // Valeur pour la colonne 6
            txtValue6 = td6.textContent || td6.innerText; // Valeur pour la colonne 7
            txtValue7 = td7.textContent || td7.innerText; // Valeur pour la colonne 8
            txtValue8 = td8.textContent || td8.innerText; // Valeur pour la colonne 14
			txtValue9 = td9.textContent || td9.innerText; // Valeur pour la colonne 13

            var dateValue = new Date(tr[i].getElementsByTagName("td")[13].textContent);
            if (
                txtValue1.toUpperCase().includes(filter1) &&
                txtValue2.toUpperCase().includes(filter2) &&
                txtValue3.toUpperCase().includes(filter3) &&
                txtValue4.toUpperCase().includes(filter4) && // Vérification pour la colonne 5
                txtValue5.toUpperCase().includes(filter5) && // Vérification pour la colonne 6
                txtValue6.toUpperCase().includes(filter6) && // Vérification pour la colonne 7
                txtValue7.toUpperCase().includes(filter7) && // Vérification pour la colonne 8
                txtValue8.toUpperCase().includes(filter8) && // Vérification pour la colonne 14
                txtValue9.toUpperCase().includes(filter9) && // Vérification pour la colonne 13
                (selectedDate === "" || dateValue.toDateString() === new Date(selectedDate).toDateString()) &&
                (!startTimestamp || !endTimestamp || (dateValue >= startTimestamp && dateValue <= endTimestamp))
            ) {
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