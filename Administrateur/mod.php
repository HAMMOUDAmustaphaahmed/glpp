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
  <title>Dashboard CQMP</title>
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
			   <a class="sidebar-link" href="./teinture.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Teinture</span>
              </a>
			  
			  <div class="form-group">
    <label for="filterColor">Filtrer par Article :</label>
    <input type="text" id="filterArticle" class="form-control" onkeyup="filterTableByArticle()" placeholder="Entrez une couleur...">
</div>
			  <div class="form-group">
    <label for="filterColor">Filtrer par Couleur :</label>
    <input type="text" id="filterColor" class="form-control" onkeyup="filterTableByColor()" placeholder="Entrez une couleur...">
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary d-block">LOG OUT</a>
  </div>
							
           
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->

      <!--  Header Start -->

      <!--  Header End -->
  <div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Première colonne avec le premier tableau -->
            <div class="col-md-6">
              <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between ">
            <h5 class="card-title fw-semibold mb-0">Article</h5>
            <div class="ml-3">
                <a href="ajouter-article.php" class="btn btn-primary">Ajouter</a>
            </div>
        </div>


                        <div class="table-responsive">
                            <table id="myTable" class="table text-nowrap mb-0 align-middle table-lg">
                                             <thead class="text-dark fs-4">
                                                <tr>
                                              
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Code</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
												
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php
include("db.php");

// Première requête
$query1 = "SELECT * FROM  `REF` WHERE article <> '' ";

// Exécuter les deux requêtes
$result1 = mysqli_query($conn, $query1);



echo "<tbody>";

// Parcourir les résultats de la première requête
while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr>";

    echo "<td class='border-bottom-0'>" . $row['article'] . "</td>";
echo "<td class='border-bottom-0'>";
        echo "<a href='edit-article.php?id=" . $row['id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo " | ";
        echo "<a href='delete.php?id=" . $row['id'] . "'><i class='ti ti-trash'></i></a>"; // Icône de suppression
        echo "</td>";

    
    echo "</td>";

    echo "</tr>";
}



mysqli_close($conn);
?>


</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Deuxième colonne avec le deuxième tableau -->
            <div class="col-md-6">
                    <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between ">
            <h5 class="card-title fw-semibold mb-0">Couleur</h5>
            <div class="ml-3">
                <a href="ajouter-couleur.php" class="btn btn-primary">Ajouter</a>
            </div>
        </div>
                            <table id="myOtherTable" class="table text-nowrap mb-0 align-middle table-lg">
                                <thead class="text-dark fs-4">
                                                <tr>
                                              
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Code</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
												
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php
include("db.php");

// Première requête
$query1 = "SELECT * FROM  `ref` WHERE couleur <> '' ";

// Exécuter les deux requêtes
$result1 = mysqli_query($conn, $query1);



echo "<tbody>";

// Parcourir les résultats de la première requête
while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr>";

    echo "<td class='border-bottom-0'>" . $row['couleur'] . "</td>";
echo "<td class='border-bottom-0'>";
        echo "<a href='edit-couleur.php?id=" . $row['id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo " | ";
        echo "<a href='delete.php?id=" . $row['id'] . "'><i class='ti ti-trash'></i></a>"; // Icône de suppression
        echo "</td>";

    
    echo "</td>";

    echo "</tr>";
}



mysqli_close($conn);
?>


</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<script>
function filterTableByColor() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterColor");
    filter = input.value.toUpperCase();
    table = document.getElementById("myOtherTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Index 3 correspond à la colonne "Couleur"
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
function filterTableByArticle() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterArticle");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable"); // Remplacez "myTable" par l'ID de votre tableau
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Index 3 correspond à la colonne "Couleur"
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