<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle Externe</title>
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
                <span class="hide-menu">Liste Tissue</span>
              </a>
         </li>
        


          
          </ul>
		      <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="../index.php"  class="btn btn-primary">LOG OUT</a>
  </div>
   
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">

     
       <div class="container-fluid center">
          
                    <div class="card-body">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Controle Externe</h5>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle table-lg">
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
                                                        <h6 class="fw-semibold mb-0">Etat</h6>
                                                    </th>
													<th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date E4B</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                             <?php
include("db.php");

$query = "SELECT p.id AS preparation_id, s.dispo, s.sub, s.article, s.couleur, s.etat, p.date_heur_pesage FROM `sfaldina` s LEFT JOIN `preparation` p ON s.dispo = p.dispo";
$result = mysqli_query($conn, $query);

$currentDateTime = new DateTime();
$oneDayAgo = clone $currentDateTime;
$oneDayAgo->modify('-1 day');

while ($row = mysqli_fetch_assoc($result)) {
    $rowDateTime = new DateTime($row['date_heur_pesage']);

    if ($rowDateTime >= $oneDayAgo && $rowDateTime <= $currentDateTime) {
        echo "<tr>";

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

        echo "<td class='border-bottom-0'>" . $row['date_heur_pesage'] . "</td>";
        echo "<td class='border-bottom-0'>";
        echo "<a href='edit.php?id=" . $row['preparation_id'] . "'><i class='ti ti-pencil'></i></a>"; // Icône d'édition
        echo "</td>";

        echo "</tr>";
    }
}

mysqli_close($conn);
?>

</tbody>
 </table>
 <div class="text-center">
          <p class="mb-0 fs-4">Designed and Developed by Zoghlami Ahmed Seddik</p>
        </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>