<?php
date_default_timezone_set('Africa/Tunis');
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}

$message = ""; // Initialize the message variable

if (isset($_POST['Submit'])) {
    $operateur = "Noureddine";
    $dispo = mysqli_real_escape_string($conn, $_POST['dispo']);
$sub = substr($dispo, -1); // Récupère le dernier caractère de dispo
$dispo = substr($dispo, 0, -1); // Retire le dernier caractère de dispo
    $fournisseur = mysqli_real_escape_string($conn, $_POST['fournisseur']);
    $type_traitement = mysqli_real_escape_string($conn, $_POST['type_traitement']);
    $numero_lot = mysqli_real_escape_string($conn, $_POST['numero_lot']);
    $cabb = mysqli_real_escape_string($conn, $_POST['cabb']);
    $article = mysqli_real_escape_string($conn, $_POST['article']);
    $couleur = mysqli_real_escape_string($conn, $_POST['couleur']);
    $poids_dispo = mysqli_real_escape_string($conn, $_POST['poids_dispo']);
    
    $metrage_dispo = mysqli_real_escape_string($conn, $_POST['metrage_dispo']);
   
    
    $etat = "en attente";

    $query = "SELECT dispo,sub FROM `preparation` WHERE dispo='$dispo' AND sub='$sub'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        $message = "Dispo D\u00e9ja existe !!!";
    } else {
        $insertQuery = "INSERT INTO `preparation` (operateur, dispo, sub, fournisseur, type_traitement, numero_lot, cabb, article, couleur, poids_dispo,  metrage_dispo) VALUES ('$operateur', '$dispo', '$sub', '$fournisseur', '$type_traitement', '$numero_lot', '$cabb', '$article', '$couleur', '$poids_dispo',  '$metrage_dispo')";

        if (mysqli_query($conn, $insertQuery)) {
            // Op\u00e9rations d'insertion pour les tables sp\u00e9cifiques
            if ($article === 'AOU' || $article === 'ATN' || $article === 'VR5' || $article === 'YN4')  {
                if ($couleur !== '074' && $couleur !== '101' && $couleur !== '501' && $couleur !== '506' && $couleur !== '507') {
                    // Ins\u00e9rer dans les tables teinture1, essorage, sechoire1, spazzola, teinture2, sechoire2, rameuse1
                    $insertSfaldinaQuery = "INSERT INTO `sfaldina` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertTeinture1Query = "INSERT INTO `teinture1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertEssorageQuery = "INSERT INTO `essorage` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertSechoire1Query = "INSERT INTO `sechoire1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertSpazzolaQuery = "INSERT INTO `spazzolato` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertTeinture2Query = "INSERT INTO `teinture2` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertSechoire2Query = "INSERT INTO `sechoire2` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertRameuse1Query = "INSERT INTO `rameuse1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertControleQuery = "INSERT INTO `controle` (dispo, sub, article, couleur,cabb, etat) VALUES ('$dispo', '$sub', '$article', '$couleur','$cabb', '$etat')";
                    if (
                        mysqli_query($conn, $insertSfaldinaQuery) &&
                        mysqli_query($conn, $insertTeinture1Query) &&
                        mysqli_query($conn, $insertEssorageQuery) &&
                        mysqli_query($conn, $insertSechoire1Query) &&
                        mysqli_query($conn, $insertSpazzolaQuery) &&
                        mysqli_query($conn, $insertTeinture2Query) &&
                        mysqli_query($conn, $insertSechoire2Query) &&
                        mysqli_query($conn, $insertRameuse1Query) &&
                        mysqli_query($conn, $insertControleQuery)                    ) {
                        $message .= " Insertion r\u00e9ussie.";
                    } else {
                        $message .= " Erreur lors de l'insertion dans les tables appropri\u00e9es : " . mysqli_error($conn);
                    }
                } else {
                    // Ins\u00e9rer dans la table teinture1, essorage, sechoire1, spazzalo, rameuse
                    $insertSfaldinaQuery = "INSERT INTO `sfaldina` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertTeinture1Query = "INSERT INTO `teinture1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertEssorageQuery = "INSERT INTO `essorage` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertSechoire1Query = "INSERT INTO `sechoire1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertSpazzolaQuery = "INSERT INTO `spazzolato` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertRameuse1Query = "INSERT INTO `rameuse1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                    $insertControleQuery = "INSERT INTO `controle` (dispo, sub, article, couleur,cabb, etat) VALUES ('$dispo', '$sub', '$article', '$couleur','$cabb', '$etat')";
                    if (
                        mysqli_query($conn, $insertSfaldinaQuery) &&
                        mysqli_query($conn, $insertTeinture1Query) &&
                        mysqli_query($conn, $insertEssorageQuery) &&
                        mysqli_query($conn, $insertSechoire1Query) &&
                        mysqli_query($conn, $insertSpazzolaQuery) &&
                        mysqli_query($conn, $insertRameuse1Query)&&
						mysqli_query($conn, $insertControleQuery) 
                    ) {
                        $message .= " Insertion r\u00e9ussie.";
                    } else {
                        $message .= " Erreur lors de l'insertion : " . mysqli_error($conn);
                    }
                }
            } elseif ($article === 'WG9' || $article === 'MT1' || $article === 'F9H') {
                // Ins\u00e9rer dans les tables rameuse1, teinture1, essorage, sechoire1, rameuse2
                $insertSfaldinaQuery = "INSERT INTO `sfaldina` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertRameuse1Query = "INSERT INTO `rameuse1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertTeinture1Query = "INSERT INTO `teinture1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertEssorageQuery = "INSERT INTO `essorage` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertSechoire1Query = "INSERT INTO `sechoire1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertRameuse2Query = "INSERT INTO `rameuse2` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
				$insertControleQuery = "INSERT INTO `controle` (dispo, sub, article, couleur,cabb, etat) VALUES ('$dispo', '$sub', '$article', '$couleur','$cabb', '$etat')";
                if (
                    mysqli_query($conn, $insertSfaldinaQuery) &&
                    mysqli_query($conn, $insertRameuse1Query) &&
                    mysqli_query($conn, $insertTeinture1Query) &&
                    mysqli_query($conn, $insertEssorageQuery) &&
                    mysqli_query($conn, $insertSechoire1Query) &&
                    mysqli_query($conn, $insertRameuse2Query) &&
					mysqli_query($conn, $insertControleQuery) 
                ) {
                    $message .= " Insertion r\u00e9ussie.";
                } else {
                    $message .= " Erreur lors de l'insertion : " . mysqli_error($conn);
                }
            } else {
                // Aucune des conditions pr\u00e9c\u00e9dentes n'est satisfaite, ins\u00e9rer dans teinture1, essorage, sechoire1, rameuse1
                $insertSfaldinaQuery = "INSERT INTO `sfaldina` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertTeinture1Query = "INSERT INTO `teinture1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertEssorageQuery = "INSERT INTO `essorage` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertSechoire1Query = "INSERT INTO `sechoire1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertRameuse1Query = "INSERT INTO `rameuse1` (dispo, sub, article, couleur, etat) VALUES ('$dispo', '$sub', '$article', '$couleur', '$etat')";
                $insertControleQuery = "INSERT INTO `controle` (dispo, sub, article, couleur,cabb, etat) VALUES ('$dispo', '$sub', '$article', '$couleur','$cabb', '$etat')";
                if (
                    mysqli_query($conn, $insertSfaldinaQuery) &&
                    mysqli_query($conn, $insertTeinture1Query) &&
                    mysqli_query($conn, $insertEssorageQuery) &&
                    mysqli_query($conn, $insertSechoire1Query) &&
                    mysqli_query($conn, $insertRameuse1Query) &&
					mysqli_query($conn, $insertControleQuery) 
                ) {
                    $message .= " Insertion r\u00e9ussie.";
                } else {
                    $message .= " Erreur lors de l'insertion : " . mysqli_error($conn);
                }
            }
        } else {
            $message .= "Erreur lors de l'insertion : " . mysqli_error($conn);
        }
    }
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); </script>";
}

echo $jsCode; // Ajoutez cette ligne pour afficher le code JavaScript
?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programmtion</title>
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
              <span class="hide-menu">PROGRAMMATION</span>
            </li>
			<li class="sidebar-item">
              <a class="sidebar-link" href="./creation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Cr&eacute;ation Dispo</span>
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
			      <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MODIFICATION</span>
            </li>
			  <li class="sidebar-item">
			  <a class="sidebar-link" href="./mod.php" aria-expanded="false">
                <span>
                  <i class="ti ti-edit"></i>
                </span>
                <span class="hide-menu">Edition Couleur & Article</span>
              </a>
              </li>
				    <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary">LOG OUT</a>
  </div>
  
        </nav>
				
        <!-- End Sidebar navigation -->

      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <div class="container-xxl">
              <div class="card">
                <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Cr&eacute;ation </h5>
			
  <form method="post">
  <div class="row mb-3">

        <div class="col">
          <label  class="form-label">Dispo</label>
          <input type="text" class="form-control"  placeholder="Num&eacute;ro Dispo" name = "dispo" required>
           
         
		  </div>
	  
	</div>
  <div class="mb-3">
  <label class="form-label">Fournisseur</label>
  <select  class="form-select" name = "fournisseur"required>
    <option>GULLE</option>
	<option>KARA</option>
	<option>KASAR</option>
	<option>SANKO</option>
	<option>TOPEKA</option>
  </select>
</div>

<div class="mb-3">
  <label  class="form-label">Type de Traitement</label>
  <select id="Select2" class="form-select" name = "type_traitement"required>
    <option>Blanc 101</option>
	<option>Teinture</option>
	<option>PPT</option>
	<option>Lavage</option>
  </select>
</div>

<div class="mb-3">
  <label  class="form-label">Num&eacute;ro du Lot</label>
  <input type="text" class="form-control"  placeholder="Numero du Lot" name = "numero_lot" required>
</div>
<div class="mb-3">
  <label  class="form-label">Cabb</label>
  <input type="text" class="form-control"  placeholder="Numero du Cabb" name = "cabb" required>
</div>

<div class="row mb-3">
  <div class="col">
    <label  class="form-label">Article</label>
    <select  class="form-select" name ="article"required>
<?php

// Construct and execute a SQL query to fetch "dispos" where "date_heure_pesage" is within the next 24 hours
$sql = "SELECT * FROM  `REF` WHERE article <> '' ";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $article = $row['article'];
        echo "<option value='$article'>$article</option>";
    }
} else {
    echo "<option value=''>No Article found</option>";
}

// Close the database connection

?>
    </select>
  </div>
  <div class="col">
    <label  class="form-label">Couleur</label>
    <select  class="form-select" name ="couleur"required>
<?php

// Construct and execute a SQL query to fetch "dispos" where "date_heure_pesage" is within the next 24 hours
$sql = "SELECT * FROM  `REF` WHERE couleur <> '' ";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $couleur = $row['couleur'];
        echo "<option value='$couleur'>$couleur</option>";
    }
} else {
    echo "<option value=''>No couleur found</option>";
}

// Close the database connection
$conn->close();
?>
    </select>
  </div>
  <div class="col">
    <label  class="form-label">Poids sur Dispo</label>
    <input type="number" class="form-control"  placeholder="Poids sur Dispo" name ="poids_dispo" required step ="0.01">
  </div>
 
  <div class="col">
    <label  class="form-label">M&eacute;trage sur Dispo</label>
    <input type="number" class="form-control"  placeholder="Metrage sur Dispo" name ="metrage_dispo"required step ="0.01">
  </div>


    <div class="card-body d-flex justify-content-between">
	  <input type="submit"name="Submit" class="btn btn-primary m-1" value ="START">
	 </div>

		
  </form>
<?php echo $jsCode; ?>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>