<?php
// Include the database connection information
include('db.php');

// Function to get the total count of articles in progress in all stages (Daily Breakup)
function getDailyBreakupTotalCount($conn) {
    // Names of the stages
    $stages = array(
        "sfaldina",
        "teinture1", "teinture2",
        "essorage",
        "sechoire1", "sechoire2",
        "rameuse1", "rameuse2",
        "spazzolato"
    );

    // Variable to store the total
    $total = 0;

    // Loop through each stage
    foreach ($stages as $stage) {
        // Query to count articles in progress in this stage
        $query = "SELECT COUNT(*) AS count FROM $stage WHERE etat = 'termine'";

        // Execute the query
        $result = $conn->query($query);

        // Check for query execution errors
        if ($result === false) {
            die("Query failed for $stage: " . $conn->error);
        }

        // Fetch the result
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Add the result to the total
        $total += $row['count'];
    }

    return $total;
}

// Function to get grouped counts from the database
function getGroupedCounts($conn) {
    // Associative array to store grouped counts for each stage
    $groupedCounts = array();

    // Names of the stages
    $stages = array(
        "sfaldina",
        "teinture1", "teinture2",
        "essorage",
        "sechoire1", "sechoire2",
        "rameuse1", "rameuse2",
        "spazzolato"
    );

    // Loop through each stage
    foreach ($stages as $stage) {
        // Query to count articles in progress in this stage
        $query = "SELECT COUNT(*) AS count FROM $stage WHERE etat = 'termine'";

        // Execute the query
        $result = $conn->query($query);

        // Check for query execution errors
        if ($result === false) {
            die("Query failed for $stage: " . $conn->error);
        }

        // Fetch the result
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // If the stage is a grouped stage, use the appropriate group name
        if ($stage == "teinture1" || $stage == "teinture2") {
            $groupedCounts["teinture"] += $row['count'];
        } elseif ($stage == "sechoire1" || $stage == "sechoire2") {
            $groupedCounts["sechoire"] += $row['count'];
        } elseif ($stage == "rameuse1" || $stage == "rameuse2") {
            $groupedCounts["rameuse"] += $row['count'];
        } else {
            // Otherwise, use the stage name as is
            $groupedCounts[$stage] = $row['count'];
        }
    }

    return $groupedCounts;
}

// Use the function to get the total count of articles in progress in all stages
$totalCount = getDailyBreakupTotalCount($conn);

// Use the function to get grouped counts for each stage
$groupedCounts = getGroupedCounts($conn);

// Function to calculate the percentage
function calculatePercentage($count, $total) {
     $percentage = ($count / $total) * 100;
     return round($percentage, 0);
}

// Convert the counts to proportions
$proportions = array_map('calculatePercentage', $groupedCounts, array_fill(0, count($groupedCounts), $totalCount));



// Convert the proportions and counts to JSON for JavaScript
$proportionsJSON = json_encode($proportions);
$countsJSON = json_encode($groupedCounts);

// Close the database connection (if necessary)
$conn = null;
?>









<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard CQMP</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
          <a href="./administrateur.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/benetton.png" width="180" alt="" />
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
              <a class="sidebar-link" href="./administrateur.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">

      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Sales Overview</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">March 2023</option>
                      <option value="2">April 2023</option>
                      <option value="3">May 2023</option>
                      <option value="4">June 2023</option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Etat de Production Actuelle</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">Totale :<?php echo $totalCount; ?></h4>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Spazzolato : <?php echo $groupedCounts['spazzolato']; ?></p></span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Sfaldina : <?php echo $groupedCounts['sfaldina']; ?></p></span>
                          </div>
						  
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Spazzolato : <?php echo $groupedCounts['spazzolato']; ?></p></span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Sfaldina : <?php echo $groupedCounts['sfaldina']; ?></p></span>
                          </div>
						  
                        </div>
						                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Spazzolato : <?php echo $groupedCounts['spazzolato']; ?></p></span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><p>Sfaldina : <?php echo $groupedCounts['sfaldina']; ?></p></span>
                          </div>
						  
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakupp"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
   
                
        
              
          
          
         
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by Zoghlami Ahmed Seddik</p>

        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
   <script>$(function () {
        // JavaScript code for your donut chart
        var proportions = <?php echo $proportionsJSON; ?>;
        var counts = <?php echo $countsJSON; ?>;
  var breakupp = {
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    colors: ["#1E90FF", "#ecf2ff", "#ADD8E6", "#00BFFF", "#99BDFF","#C0D9FF"],
    labels: ["sfaldina","teinture","essorage","sechoire","rameuse","spazzolato"],
    series: proportions,
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
tooltip: {
  theme: "dark",
  fillSeriesColor: false,
  enabled: true, // Activez le tooltip
  y: {
    formatter: function (val) {
      return val + "%"; // Formattez la valeur du tooltip avec le pourcentage
    }
  }
},
  };

  var chart = new ApexCharts(document.querySelector("#breakupp"), breakupp);
  chart.render();
});
 </script>
</body>

</html>