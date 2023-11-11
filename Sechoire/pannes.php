<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
if (isset($_POST['Submit'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire

    $date_detection = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $etape = "sechoire";
  
    $panne = mysqli_real_escape_string($conn, $_POST['panne']);
    $machine = mysqli_real_escape_string($conn, $_POST['machine']);
    // Assurez-vous que les variables $dispo et $sub sont initialis\u00e9es
    $dispo = mysqli_real_escape_string($conn, $_POST['dispo']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub']);

    // Mettre \u00e0 jour les donn\u00e9es dans la table `panne`
    $insertQuery = "INSERT INTO `panne` (dispo, sub, machine, etape, date_detection, panne) VALUES ('$dispo', '$sub', '$machine', '$etape', '$date_detection', '$panne')";

    if (mysqli_query($conn, $insertQuery)) {
        $message = "Donn\u00e9es ins\u00e9r\u00e9es avec succ\u00e8s !";
    } else {
        $message = "Erreur lors de l'insertion des donn\u00e9es : " . mysqli_error($conn);
    }
}



if (isset($_POST['Su'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire

   

  

    // Assurez-vous que les variables $dispo et $sub sont initialis\u00e9es
    $dispo = mysqli_real_escape_string($conn, $_POST['dispo']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub']);
 $date_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
    // Mettre \u00e0 jour les donn\u00e9es dans la table `panne`
     $updateQuery = "UPDATE panne SET date_reparation = '$date_reparation' WHERE dispo = '$dispo' AND sub = '$sub'";

    if (mysqli_query($conn, $updateQuery)) {
        $message = "Donn\u00e9es ins\u00e9r\u00e9es avec succ\u00e8s !";
    } else {
        $message = "Erreur lors de l'insertion des donn\u00e9es : " . mysqli_error($conn);
    }
}


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
  <title>S&eacute;choire</title>
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
                <span class="hide-menu">Donnees S&eacute;choire</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes S&eacute;choire</span>
              </a>
            </li>
     			                 <li class="sidebar-item">
              <a class="sidebar-link" href="blocage.php" aria-expanded="true">
                <span>
                  <i class="ti ti-barrier-block"></i>
                </span>
                <span class="hide-menu">Blocage S&eacute;choire</span>
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
              <h5 class="card-title fw-semibold mb-4">Pannes S&eacute;choire </h5>
              <div class="card">
                <div class="card-body">
			
  <form method="post">
<div class="mb-3">
    <label class="form-label">Dispo</label>
    <select class="form-select" name="dispo" required>
        <?php
		     
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT distinct dispo FROM sechoire1 WHERE etat = 'en cours'";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $dispo = $row['dispo'];
                echo "<option value='$dispo'>$dispo</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from sechoire2
        $sql2 = "SELECT  distinct dispo FROM sechoire2 WHERE etat = 'en cours'";
        $result2 = $conn->query($sql2);

        // Check if there are results from sechoire2
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $dispo = $row['dispo'];
                echo "<option value='$dispo'>$dispo</option>";
            }
        } 

       
        ?>
    </select>


			          <div class="mb-3">
          <label for="disabledSelect" class="form-label">Sub</label>
          <select  class="form-select" name ="sub"  required>
                    <?php
		         
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT distinct sub FROM sechoire1 where dispo= '$dispo' AND etat = 'en cours'";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $sub = $row['sub'];
                echo "<option value='$sub'>$sub</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from sechoire2
        $sql2 = "SELECT distinct sub FROM sechoire2 where dispo= '$dispo' AND etat = 'en cours'";
        $result2 = $conn->query($sql2);

        // Check if there are results from sechoire2
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $sub = $row['sub'];
                echo "<option value='$sub'>$sub</option>";
            }
        } 

        
        ?>
          </select>

		   <label  class="form-label">Machine</label>
          <select  class="form-select" required name="machine" type="text">
             <?php
		         
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT distinct machine FROM sechoire1 where dispo= '$dispo' AND  sub = '$sub' AND etat = 'en cours'";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $machine = $row['machine'];
                echo "<option value='$machine'>$machine</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from sechoire2
        $sql2 = "SELECT distinct machine FROM sechoire2 where dispo= '$dispo' AND  sub = '$sub' AND etat = 'en cours'";
        $result2 = $conn->query($sql2);

        // Check if there are results from sechoire2
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $machine = $row['machine'];
                echo "<option value='$machine'>$machine</option>";
            }
        } 

        
        ?>
			
          </select>
  
   
		   <label  class="form-label">Panne</label>
          <select  class="form-select" required name="panne" type="text">
            <option>Manque Chariots</option>
			<option>Manque Tissu</option>
			<option>Nettoyage Machine</option>
			<option>Panne Machine</option>

          </select>
  <div class="card-body d-flex justify-content-between">
     <input type="submit" name ="Submit"class="btn btn-danger m-1" value="Detection">
	  <input type="submit" name ="Su" class="btn btn-success m-1" value ="Reparation">
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