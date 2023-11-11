<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
        // Mettre à jour les enregistrements dans rameuse1 ou rameuse2 en fonction des conditions
        $updateQuery = "";
        if ($dispo != '' && $sub != '') {
            // Vérifier si les conditions sont remplies dans rameuse1
            $checkQuery1 = "SELECT * FROM rameuse1 WHERE dispo = '$dispo' AND sub = '$sub' AND date_fin_rameuse1 IS  NULL ";
            $result1 = mysqli_query($conn, $checkQuery1);

            if (mysqli_num_rows($result1) > 0) {
                // Les conditions sont remplies dans rameuse1, mettez à jour rameuse1
                $updateQuery = "UPDATE rameuse1 SET etat = '$etat', date_fin_rameuse1 = '$date_blocage' WHERE dispo = '$dispo' AND sub = '$sub'";
            } else {
                // Si les conditions ne sont pas remplies dans rameuse1, vérifiez rameuse2
                $checkQuery2 = "SELECT * FROM rameuse2 WHERE dispo = '$dispo' AND sub = '$sub' AND  date_fin_rameuse2 IS NULL";
                $result2 = mysqli_query($conn, $checkQuery2);

                if (mysqli_num_rows($result2) > 0) {
                    // Les conditions sont remplies dans rameuse2, mettez à jour rameuse2
                    $updateQuery = "UPDATE rameuse2 SET etat = '$etat', date_fin_rameuse2 = '$date_blocage' WHERE dispo = '$dispo' AND sub = '$sub'";
                }
            }
        }



mysqli_close($conn);

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('index.php');</script>";
}

?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rameuse</title>
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
          <a href="index.php" class="text-nowrap logo-img">
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
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Donnees Rameuse</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Rameuse</span>
              </a>
            </li>
			                 <li class="sidebar-item">
              <a class="sidebar-link" href="blocage.php" aria-expanded="true">
                <span>
                  <i class="ti ti-barrier-block"></i>
                </span>
                <span class="hide-menu">Blocage Rameuse</span>
              </a>
            </li>
     
        
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
    <div class="body-wrapper">

      
       
          <div class="container-fluid">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Blocage Rameuse</h5>
              <div class="card">
                <div class="card-body">
			
  <form method="post">
    <div class="mb-3">
          <label class="form-label">Op&eacute;rateur</label>
          <select  class="form-select" name="operateur">
			<option>Foued</option>
			<option>Haythem</option>
			<option>Khalil</option>
			<option>Med Ali</option>
			<option>Noomen</option>
			<option>Saif</option>
			<option>Sami</option>
			<option>Skander</option>
		
          </select>
		  </div>
    <div class="mb-3">
        <label class="form-label">Dispo</label>
        <select class="form-select" name="dispo" required> <!-- Assurez-vous d'utiliser "name" pour récupérer la sélection -->
      
<?php
		         // Include the database connection
            include('db.php');
        // Construct and execute a SQL query to fetch "dispos" from rameuse1
        $sql1 = "SELECT DISTINCT dispo FROM rameuse1 WHERE etat = 'en cours'";
        $result1 = $conn->query($sql1);

        // Check if there are results from rameuse1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $dispo = $row['dispo'];
                echo "<option value='$dispo'>$dispo</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from rameuse2
        $sql2 = "SELECT  distinct dispo FROM rameuse2 WHERE etat = 'en cours'";
        $result2 = $conn->query($sql2);

        // Check if there are results from rameuse2
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $dispo = $row['dispo'];
                echo "<option value='$dispo'>$dispo</option>";
            }
        } 

        // Close the database connection
        $conn->close();
        ?>
        </select>
    </div>

		          <div class="mb-3">
          <label for="disabledSelect" class="form-label">Sub</label>
          <select  class="form-select" name ="sub"  required>
            <?php
		         // Include the database connection
            include('db.php');
        // Construct and execute a SQL query to fetch "dispos" from rameuse1
        $sql1 = "SELECT distinct sub FROM rameuse1 WHERE etat = 'en cours' and dispo ='$dispo' ";
        $result1 = $conn->query($sql1);

        // Check if there are results from rameuse1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $sub = $row['sub'];
                echo "<option value='$sub'>$sub</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from rameuse2
        $sql2 = "SELECT distinct sub FROM rameuse2 WHERE etat = 'en cours' and dispo ='$dispo'" ;
        $result2 = $conn->query($sql2);

        // Check if there are results from rameuse2
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $sub = $row['sub'];
                echo "<option value='$sub'>$sub</option>";
            }
        } 

        // Close the database connection
        $conn->close();
        ?>
          </select>
		   </div>

		    <div class="col">
    <label  class="form-label">Details Blocage</label>
    <input type="text" class="form-control" name= "details_blocage" placeholder="Saisie Raison De Blocage" >
  </div>
  
      

  <div class="card-body d-flex justify-content-between">
     <input type="submit" name ="Submit"class="btn btn-danger m-1" value="Blocage">

  </form>
   </div>

<?php echo $jsCode; ?>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>