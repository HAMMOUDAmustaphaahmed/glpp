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
$dispo = strtoupper(substr($dispo, 0, -1));
    $fournisseur = mysqli_real_escape_string($conn, $_POST['fournisseur']);
    $type_traitement = mysqli_real_escape_string($conn, $_POST['type_traitement']);
    $numero_lot = mysqli_real_escape_string($conn, $_POST['numero_lot']);
    $cabb = mysqli_real_escape_string($conn, $_POST['cabb']);
    $article = mysqli_real_escape_string($conn, $_POST['article']);
    $couleur = mysqli_real_escape_string($conn, $_POST['couleur']);
    $poids_dispo = mysqli_real_escape_string($conn, $_POST['poids_dispo']);
    $semaine = mysqli_real_escape_string($conn, $_POST['semaine']);
    $metrage_dispo = mysqli_real_escape_string($conn, $_POST['metrage_dispo']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $poids_theorique = mysqli_real_escape_string($conn, $_POST['poids_theorique']);
	$groupe = strtoupper(mysqli_real_escape_string($conn, $_POST['groupe']));
    $etat = "en attente";
 $queryRef = "SELECT *  FROM `ref` WHERE article = '$article' ";
                $resultRef = mysqli_query($conn, $queryRef);
				$rowRef = mysqli_fetch_assoc($resultRef);
                $groupe_article = $rowRef['groupe_article'];
		
$queryRef2 = "SELECT *  FROM `ref` WHERE  couleur = '$couleur'";
                $resultRef2 = mysqli_query($conn, $queryRef2);
				$rowRef2 = mysqli_fetch_assoc($resultRef2);        
				$groupe_couleur = $rowRef2['groupe_couleur'];
				
$queryTissu = "SELECT *  FROM `tissu` WHERE groupe_article = '$groupe_article' AND groupe_couleur = '$groupe_couleur'";
                $resultTissu = mysqli_query($conn, $queryTissu);
				$rowTissu = mysqli_fetch_assoc($resultTissu);
                $etape1 = $rowTissu['etape1'];
				$etape2 = $rowTissu['etape2'];	
                $etape3 = $rowTissu['etape3'];
				$etape4 = $rowTissu['etape4'];
                $etape5 = $rowTissu['etape5'];
				$etape6 = $rowTissu['etape6'];
                $etape7 = $rowTissu['etape7'];
				$etape8 = $rowTissu['etape8'];				
                $etape9 = $rowTissu['etape9'];
				$etape10 = $rowTissu['etape10'];
    $query1 = "SELECT dispo,sub FROM `controle` WHERE dispo='$dispo' AND sub='$sub'";
    $result1 = mysqli_query($conn, $query1);
	

    if (mysqli_num_rows($result1) >= 1) {
		$alertClass = 'alert-danger';
        $message = "Dispo D&eacute;ja existe !!!". mysqli_error($conn);
    }else {
		if ($type_traitement == "thermofixage") {
    // Définir un tableau d'étapes
    $etapes = array("preparation", "sfaldina", "rameuse");
} else {
    // Définir un tableau d'étapes
    $etapes = array($etape1, $etape2, $etape3, $etape4, $etape5, $etape6, $etape7, $etape8, $etape9, $etape10);
}

// Boucle pour parcourir les étapes
foreach ($etapes as $etapeValue) {
    // Remplacer "teinture1" ou "teinture2" par "teinture"
    if ($etapeValue === null || $etapeValue === "" || empty($etapeValue)) {
        break; // Sortir de la boucle si $etapeValue est null ou vide
    }
    if ($etapeValue == "teinture1" || $etapeValue == "teinture2") {
        $etape = $etapeValue;
        $etapeValue = "teinture";
    } elseif ($etapeValue == "sechoire1" || $etapeValue == "sechoire2") {
        $etape = $etapeValue;
        $etapeValue = "sechoire";
    } else {
        $etape = $etapeValue;
    }

    if ($etapeValue == "preparation") {
        $queryInsert = "INSERT INTO `preparation` (operateur, dispo, sub, fournisseur, type_traitement, numero_lot, cabb, article, couleur, poids_dispo, metrage_dispo, semaine, note,poids_theorique, groupe) VALUES ('$operateur', '$dispo', '$sub', '$fournisseur', '$type_traitement', '$numero_lot', '$cabb', '$article', '$couleur', '$poids_dispo', '$metrage_dispo', '$semaine', '$note','$poids_theorique', '$groupe')";
    } else {
        // Insertion dans la table correspondante à l'étape
        $queryInsert = "INSERT INTO `$etapeValue` (etape, dispo, sub, article, couleur, semaine, etat) VALUES ('$etape', '$dispo', '$sub', '$article', '$couleur', '$semaine', '$etat')";
    }

    if (mysqli_query($conn, $queryInsert)) {
        $success = true;
    } else {
        $success = false; // L'insertion a échoué, mettre la variable de drapeau à false
        break; // Sortir de la boucle en cas d'erreur
    }
}


if ($success) {
    $alertClass = 'alert-success';
    $message = "Dispo cr&eacute;e avec succ&egrave;s";
} else {
    $alertClass = 'alert-danger';
    $message = "Erreur lors de l'insertion " . mysqli_error($conn);
}

}
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Afficher l'alerte
echo '<div class="alert ' . $alertClass . ' fixed-top-right" role="alert" style="display: none;">';
echo $message;
echo '</div>';

// Afficher l'alerte avec un d\u00e9lai de 2 secondes (2000 millisecondes)
echo '<script>';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "block"; }, 200);';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "none"; }, 20000);'; // Masquer apr\u00e8s 10 secondes
echo '</script>';
?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programmtion</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
   <style>
        /* Style pour les alertes empil\u00e9es en haut à droite */
        .fixed-top-right {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
        }
    </style>
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
          <input type="text" class="form-control"  placeholder="Saisie Num&eacute;ro Dispo" name = "dispo" required>
          </div>
		  <div class="col">
          <label  class="form-label">Semaine</label>
          <input type="text" class="form-control"  placeholder="Saisie Semaine De Production" name = "semaine" required>
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
    <option value ="blanc 101">Blanc 101</option>
	<option value ="teinture">Teinture</option>
	<option value ="thermofixage">Thermofixage</option>
	<option value ="ppt">PPT</option>
	<option value ="lavage">Lavage</option>
	<option value = "reparation">R&eacute;paration</option>
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
$sql = "SELECT DISTINCT article FROM  `REF` where article <>'' ";
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
$sql = "SELECT DISTINCT couleur FROM  `REF`  where couleur <>'' ";
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
  
  <div class="col">
    <label  class="form-label">Poids Th&eacute;orique</label>
    <input type="number" class="form-control"  placeholder="Poids Theorique" name ="poids_theorique" step ="0.01">
  </div>
  <div class="col">
    <label  class="form-label">Groupe</label>
    <input type="text" class="form-control"  placeholder="Groupe" name ="groupe" step ="0.01">
  </div>
  </div>

      <div>
                        <label  class="form-label">Note</label>
                        <textarea class="form-control" type="text" rows="2" name ="note"></textarea>
                      </div>
    <div class="card-body d-flex justify-content-between">
	  <input type="submit"name="Submit" class="btn btn-primary m-1" value ="START">
	 </div>

		
  </form>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>

</html>