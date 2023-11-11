<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
if (isset($_POST['Submit'])) {
    // Récupérer les données du formulaire
    $date_blocage = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $etape = "sechoire";
    $operateur = mysqli_real_escape_string($conn, $_POST['operateur']);
    $details_blocage = mysqli_real_escape_string($conn, $_POST['details_blocage']);
    $etat = "bloque";
    
    // Assurez-vous que les variables $dispo et $sub sont initialisées
    $dispo = mysqli_real_escape_string($conn, $_POST['dispo']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub']);

    // Mettre à jour les données dans la table `blocage`
    $insertQuery = "INSERT INTO `blocage` (dispo, sub, etape, date_blocage, details_blocage, operateur) VALUES ('$dispo', '$sub', '$etape', '$date_blocage', '$details_blocage','$operateur')";
 

 
    if (mysqli_query($conn, $insertQuery)) {
        $message = "Données insérées avec succès !";

        // Mettre à jour les enregistrements dans sechoire1 ou sechoire2 en fonction des conditions
        $updateQuery = "";
        if ($dispo != '' && $sub != '') {
            // Vérifier si les conditions sont remplies dans sechoire1
            $checkQuery1 = "SELECT * FROM sechoire1 WHERE dispo = '$dispo' AND sub = '$sub' AND date_fin_sechoire1 IS  NULL ";
            $result1 = mysqli_query($conn, $checkQuery1);

            if (mysqli_num_rows($result1) > 0) {
                // Les conditions sont remplies dans sechoire1, mettez à jour sechoire1
                $updateQuery = "UPDATE sechoire1 SET etat = '$etat', date_fin_sechoire1 = '$date_blocage' WHERE dispo = '$dispo' AND sub = '$sub'";
            } else {
                // Si les conditions ne sont pas remplies dans sechoire1, vérifiez sechoire2
                $checkQuery2 = "SELECT * FROM sechoire2 WHERE dispo = '$dispo' AND sub = '$sub' AND  date_fin_sechoire2 IS NULL";
                $result2 = mysqli_query($conn, $checkQuery2);

                if (mysqli_num_rows($result2) > 0) {
                    // Les conditions sont remplies dans sechoire2, mettez à jour sechoire2
                    $updateQuery = "UPDATE sechoire2 SET etat = '$etat', date_fin_sechoire2 = '$date_blocage' WHERE dispo = '$dispo' AND sub = '$sub'";
                }
            }
        }

        // Exécutez la mise à jour si une requête d'update est définie
        if (!empty($updateQuery)) {
            if (mysqli_query($conn, $updateQuery)) {
                $message .= "<br>Mise à jour de  réussie.";
            } else {
                $message .= "<br>Erreur lors de la mise à jour ! " . mysqli_error($conn);
            }
        
    } else {
        $message = "Erreur lors de l'insertion des données ! " . mysqli_error($conn);
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
              <h5 class="card-title fw-semibold mb-4">Blocage S&eacute;choire</h5>
              <div class="card">
                <div class="card-body">
			
  <form method="post">
    <div class="mb-3">
          <label class="form-label">Op&eacute;rateur</label>
          <select  class="form-select" name="operateur">
            <option>Abdelkarim</option>
			<option>Ali</option>
			<option>Fehmi</option>
			<option>Foued</option>
			<option>Med Ali</option>
			<option>Naceur</option>
			<option>Raouf</option>
			<option>Saif</option>
			<option>Sami</option>
			<option>Tarek</option>
		
          </select>
		  </div>
    <div class="mb-3">
        <label class="form-label">Dispo</label>
        <select class="form-select" name="dispo" required> <!-- Assurez-vous d'utiliser "name" pour récupérer la sélection -->
      
<?php
		         // Include the database connection
            include('db.php');
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT DISTINCT dispo FROM sechoire1 WHERE etat = 'en cours'";
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
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT distinct sub FROM sechoire1 WHERE etat = 'en cours' and dispo ='$dispo' ";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $sub = $row['sub'];
                echo "<option value='$sub'>$sub</option>";
            }
        }

        // Construct and execute a SQL query to fetch "dispos" from sechoire2
        $sql2 = "SELECT distinct sub FROM sechoire2 WHERE etat = 'en cours' and dispo ='$dispo'" ;
        $result2 = $conn->query($sql2);

        // Check if there are results from sechoire2
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