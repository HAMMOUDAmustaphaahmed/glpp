<?php
session_start();
include("db.php");

if (isset($_POST['Submit'])) {
	
    // Récupérer les données du formulaire
    $date_blocage = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    $operateur = mysqli_real_escape_string($conn, $_POST['operateur']);
    $details_blocage = mysqli_real_escape_string($conn, $_POST['details_blocage']);
    $etat = "bloque";
    
    // Assurez-vous que les variables $dispo et $sub sont initialisées
    $dispo = mysqli_real_escape_string($conn, $_POST['dispo']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub']);

    // Mettre à jour les données dans la table `blocage`
    
 


        // Mettre à jour les enregistrements dans teinture1 ou teinture2 en fonction des conditions
        $updateQuery = "";
        if ($dispo != '' && $sub != '') {
            // Vérifier si les conditions sont remplies dans teinture1
            $checkQuery1 = "SELECT * FROM teinture WHERE dispo = '$dispo' AND sub = '$sub' AND etat = 'en cours' ";
            $result1 = mysqli_query($conn, $checkQuery1);
			$row = mysqli_fetch_assoc($result1);
             $etape = $row['etape'];
			 $article = $row['article'];
			 $couleur =$row['couleur'];
          
                // Les conditions sont remplies dans teinture1, mettez à jour teinture1
				
                $updateQuery = "UPDATE `teinture` SET etat = '$etat', date_fin_teinture = '$date_blocage' WHERE dispo = '$dispo' AND etape = '$etape'";
				$insertQuery = "INSERT INTO `blocage` (dispo, sub, etape,etat, date_blocage, details_blocage, operateur) VALUES ('$dispo', '$sub', '$etape','$etat', '$date_blocage', '$details_blocage','$operateur')";
				$etape2 = "reparation-" . $etape;

                $insert2Query = "INSERT INTO `teinture` (dispo, sub, etape, article, couleur) VALUES ('$dispo', '$sub', '$etape', '$article', '$couleur')";
        }

        // Exécutez la mise à jour si une requête d'update est définie

            if (isset($updateQuery) && mysqli_query($conn, $updateQuery) && isset($insertQuery) && mysqli_query($conn, $insertQuery)&& isset($insert2Query) && mysqli_query($conn, $insert2Query)) {
                $message .= "Mise à jour de  réussie.";
            } else {
                $message .= "Erreur lors de la mise à jour ! " . mysqli_error($conn);
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
  <title>Teinture</title>
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
                <span class="hide-menu">Donnees Teinture</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Teinture</span>
              </a>
            </li>
			                 <li class="sidebar-item">
              <a class="sidebar-link" href="blocage.php" aria-expanded="true">
                <span>
                  <i class="ti ti-barrier-block"></i>
                </span>
                <span class="hide-menu">Blocage Teinture</span>
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
              <h5 class="card-title fw-semibold mb-4">Blocage Teinture</h5>
              <div class="card">
                <div class="card-body">
			
  <form method="post">
    <div class="mb-3">
          <label class="form-label">Op&eacute;rateur</label>
          <select  class="form-select" name="operateur">
            <option>Chaabene Azouzi</option>
			<option>Hamdi Khedimi</option>
			<option>Hamed Flissi</option>
			<option>Hatem Belwaer</option>
			<option>Khayri Souid</option>
			<option>Mansour Elwaer</option>
			<option>Med Ali Barhoumi</option>
			<option>Rafik Bssili</option>
			<option>Rami Skhiri</option>
			<option>Sayfeddine Ghali</option>
			<option>Wahid Khadraoui</option>
			<option>Walid Azzouzi</option>
		
          </select>
		  </div>
    <div class="mb-3">
        <label class="form-label">Dispo</label>
        <select class="form-select" name="dispo" required> <!-- Assurez-vous d'utiliser "name" pour récupérer la sélection -->
      
<?php
		         // Include the database connection
            include('db.php');
        // Construct and execute a SQL query to fetch "dispos" from sechoire1
        $sql1 = "SELECT DISTINCT dispo FROM teinture WHERE etat = 'en cours'";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        
            while ($row = $result1->fetch_assoc()) {
                $dispo = $row['dispo'];
				
                echo "<option value='$dispo'>$dispo</option>";
            }
        



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
        $sql1 = "SELECT distinct sub FROM teinture WHERE etat = 'en cours' and dispo ='$dispo' ";
        $result1 = $conn->query($sql1);

        // Check if there are results from sechoire1
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $sub = $row['sub'];
				
                echo "<option value='$sub'>$sub</option>";
            }
        }



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