<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
$message = ""; // Initialize a variable to store messages


// Récupérer l'ID de l'URL
if (isset($_GET['id'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Requête pour récupérer les données existantes
    $query = "SELECT `article`, `fournisseur`, `lotfournisseur`, `lotinterne`, `facture`, `datearrivage`, `machine`, `lfa1`, `lfa2`, `lfa3`, `poids`, `largeur`, `testteinture`, `note`, `dispo_test` FROM `greggio` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $editId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $article, $fournisseur, $lotfournisseur, $lotinterne, $facture, $datearrivage, $machine, $lfa1, $lfa2, $lfa3, $poids, $largeur, $testteinture, $note, $dispo_test);

    // Vérifier si les données ont été récupérées avec succès
    if (mysqli_stmt_fetch($stmt)) {
        // Les données ont été récupérées avec succès, vous pouvez les utiliser ici
    } else {
        // Aucune donnée trouvée pour l'ID donné, vous pouvez gérer cela ici
        echo "Aucune donnée trouvée pour l'ID donné.";
        exit(); // Terminer le script si aucune donnée n'est trouvée
    }

    mysqli_stmt_close($stmt);
}

// Traitement du formulaire de mise à jour
if (isset($_POST['submit'])) {
    // Extract new values from POST data
    $newarticle = $_POST['article'];
    $newfournisseur = $_POST['fournisseur'];
    $newlotfournisseur = $_POST['lotfournisseur'];
    $newlotinterne = $_POST['lotinterne'];
    $newfacture = $_POST['facture'];
    $newdatearrivage = $_POST['datearrivage'];
    $newmachine = $_POST['machine'];
    $newlfa1 = $_POST['lfa1'];
    $newlfa2 = $_POST['lfa2'];
    $newlfa3 = $_POST['lfa3'];
    $newpoids = $_POST['poids'];
    $newlargeur = $_POST['largeur'];
    $newtestteinture = $_POST['testteinture'];
    $newnote = $_POST['note'];
    $newdispo_test = $_POST['dispo_test'];

    // Requête de mise à jour
    $updateQuery = "UPDATE `greggio` SET 
        `article` = ?, 
        `fournisseur` = ?, 
        `lotfournisseur` = ?, 
        `lotinterne` = ?, 
        `facture` = ?, 
        `datearrivage` = ?, 
        `machine` = ?, 
        `lfa1` = ?, 
        `lfa2` = ?, 
        `lfa3` = ?, 
        `poids` = ?, 
        `largeur` = ?, 
        `testteinture` = ?, 
        `note` = ?, 
        `dispo_test` = ?
        WHERE `id` = ?";

    // Préparer la requête
    $stmt = mysqli_prepare($conn, $updateQuery);

    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
        // Lier les paramètres
        mysqli_stmt_bind_param(
            $stmt, 
            "sssssssssssssssi", 
            $newarticle, 
            $newfournisseur, 
            $newlotfournisseur, 
            $newlotinterne, 
            $newfacture, 
            $newdatearrivage, 
            $newmachine, 
            $newlfa1, 
            $newlfa2, 
            $newlfa3, 
            $newpoids, 
            $newlargeur, 
            $newtestteinture, 
            $newnote, 
            $newdispo_test,
            $editId
        );

        // Exécuter la requête de mise à jour
        if (mysqli_stmt_execute($stmt)) {
            $alertClass = 'alert-success';
	$message .= " Insertion r&eacute;ussie.";
	
       
                    } else {
						$alertClass = 'alert-danger';
                        $message .= " Erreur lors de l'insertion  : " . mysqli_error($conn);
                    }

        // Fermer la déclaration
        mysqli_stmt_close($stmt);
    } else {
		$alertClass = 'alert-danger';
        echo "Erreur lors de la préparation de la requête.";
    }
}


$dateFormattee = date("Y-m-d", strtotime($datearrivage));

mysqli_close($conn);
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle Greggio</title>
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
                   <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Liste Greggio</span>
              </a>
         </li>            
        
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="greggio.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Ajouter Greggio</span>
              </a>
            </li>
     
        
          </ul>
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
        <div class="container-fluid">
              <div class="card">
                <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajouter Greggio </h5>
			
  <form method="post">
  <div class="my-3"></div>
  <h5 style="color: #4682B4;">Identification Du Lot</h5>

  <div class="my-3"></div>
  <div class="row mb-3">
      
          <div class="col">
    <label  class="form-label">article</label>
    <select  class="form-select" name ="article"required>
	<option><?php echo $article ?></option>
<option>04K</option>
	  <option>085</option>
	  <option>088</option>
	  <option>089</option>
	  <option>096</option>
	  <option>12N</option>
	  <option>38H</option>
	  <option>4CI</option>
	  <option>51H</option>
	  <option>54E</option>
	  <option>63E</option>
	  <option>72K</option>
	  <option>793</option>
      <option>86A</option>
	  <option>900</option>
	  <option>904</option>
	  <option>94L</option>
	  <option>96G</option>
	  <option>979</option>
	  <option>AOU</option>
	  <option>ATN</option>
	  <option>B2Z</option>
	  <option>BR4</option>
	  <option>C73</option>
	  <option>CDI</option>
	  <option>CTQ</option>
	  <option>D56</option>
	  <option>EG9</option>
	  <option>EM5</option>
	  <option>F9H</option>
	  <option>GA2</option>
	  <option>I1X</option>
	  <option>I9W</option>
	  <option>J67</option>
	  <option>J68</option>
	  <option>J70</option>
	  <option>J74</option>
	  <option>L0X</option>
	  <option>MT1</option>
	  <option>NKH</option>
	  <option>P0V</option>
	  <option>P1V</option>
	  <option>P7X</option>
	  <option>VR5</option>
	  <option>WG9</option>
	  <option>YR3</option>
	  <option>Z9F</option>
    </select>
  </div>
	  <div class="col">
  <label class="form-label">Fournisseur</label>
  <select  class="form-select" name = "fournisseur"  >
<option><?php echo $fournisseur ?></option>
    <option>GULLE</option>
	<option>KARA</option>
	<option>KASAR</option>
	<option>SANKO</option>
	<option>TOPEKA</option>
  </select>
</div>


<div class="col">

  <label  class="form-label">Lot Fournisseur</label>
  <input type="text" class="form-control"   name = "lotfournisseur" value="<?php echo $lotfournisseur ?>"  >
</div>

	  <div class="col">
  <label class="form-label">Lot Interne</label>
  <select  class="form-select" name = "lotinterne"  >
<option><?php echo $lotinterne ?></option>
    <option>A</option>
	<option>B</option>
	<option>C</option>
	<option>D</option>
	
  </select>
</div>
<div class="col">
  <label  class="form-label">Facture</label>
  <input type="text" class="form-control"   name = "facture" value="<?php echo $facture ?>" >
</div>
<div class="col">
<label  class="form-label">Date Arrivage</label>
            <input type="date" id="Date" class="form-control" name="datearrivage" value="<?php echo $dateFormattee ?>">
        </div>
		</div>
		<div class="my-3"></div>
 <h5 style="color: #4682B4 ;">Information Technique </h5>	
 <div class="my-3"></div>

<div class="row mb-3">
<div class="col">
  <label  class="form-label">Machine</label>
  <input type="text" class="form-control"   name = "machine" value="<?php echo $machine ?>">
</div>
  <div class="col">
  <label  class="form-label">LFA (1 fibre)</label>
  <input type="text" class="form-control"   name = "lfa1" value="<?php echo $lfa1 ?>">
</div>
  <div class="col">
  <label  class="form-label">LFA (2 fibres)</label>
  <input type="text" class="form-control"   name = "lfa2" value="<?php echo $lfa2 ?>">
</div>
  <div class="col">
  <label  class="form-label">LFA (3 fibres)</label>
  <input type="text" class="form-control"   name = "lfa3" value="<?php echo $lfa3 ?>">
</div>
  <div class="col">
  <label  class="form-label">Poids (g / m²)</label>
  <input type="text" class="form-control"   name = "poids" value="<?php echo $poids ?>">
</div>
  <div class="col">
  <label  class="form-label">Largeur (cm)</label>
  <input type="text" class="form-control"   name = "largeur" value="<?php echo $largeur ?>">
</div>
</div>
<div class="my-2"></div>
 <h5 style="color: #4682B4;">Test</h5>
 <div class="my-2"></div>
<div class="row mb-3">
<div class="col">
  <label  class="form-label">Dispo Test</label>
  <input type="text" class="form-control"   name = "dispo_test" value="<?php echo $dispo_test ?>">
</div>
	  <div class="col">
  <label class="form-label">Test Teinture</label>
  <select  class="form-select" name = "testteinture" value="<?php echo $testteinture ?>" >

    <option>Ok</option>
	<option>Non Ok</option>

	
  </select>
</div>

      <div class="col">
                        <label  class="form-label">Note</label>
                        <textarea class="form-control" type="text" rows="1" name ="note" value="<?php echo $note ?>"></textarea>
                      </div>
   
  
    <div class="card-body d-flex justify-content-between">

	  <input type="Submit"name="submit" class="btn btn-primary m-1" value ="Modifier">
	 </div>

		
  </form>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>