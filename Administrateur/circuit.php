<?php

session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}

$message = ""; // Initialize the message variable

if (isset($_POST['Submit'])) {
    // Échapper les caractères spéciaux pour les données POST
    $article = mysqli_real_escape_string($conn, $_POST['article']);
    $couleur = mysqli_real_escape_string($conn, $_POST['couleur']);
    $etape1 = mysqli_real_escape_string($conn, $_POST['etape1']);
    $etape2 = mysqli_real_escape_string($conn, $_POST['etape2']);
    $etape3 = mysqli_real_escape_string($conn, $_POST['etape3']);
    $etape4 = mysqli_real_escape_string($conn, $_POST['etape4']);
    $etape5 = mysqli_real_escape_string($conn, $_POST['etape5']);
    $etape6 = mysqli_real_escape_string($conn, $_POST['etape6']);
    $etape7 = mysqli_real_escape_string($conn, $_POST['etape7']);
    $etape8 = mysqli_real_escape_string($conn, $_POST['etape8']);
    $etape9 = mysqli_real_escape_string($conn, $_POST['etape9']);


    if ($etape1!= $etape2 && $etape2!= $etape3 && $etape3 != $etape4 && $etape4 != $etape5 && $etape5!= $etape6 &&  $etape6!= $etape7 && $etape7!= $etape8 ) {
        // Requête pour vérifier l'existence du circuit
        $query = "SELECT groupe_article, groupe_couleur FROM `Tissu` WHERE groupe_article ='$article' AND groupe_couleur='$couleur'";
        $result = mysqli_query($conn, $query);

        // Vérification de l'existence du circuit
        if (mysqli_num_rows($result) >= 1) {
            $alertClass = 'alert-warning';
            $message = "Circuit d&eacute;j&agrave; existant !!!";
        } else {
            // Requête pour insérer le nouveau circuit
            $insertQuery = "INSERT INTO `Tissu` (groupe_article, groupe_couleur, etape1, etape2, etape3, etape4, etape5, etape6, etape7, etape8, etape9) VALUES ('$article', '$couleur', '$etape1', '$etape2', '$etape3', '$etape4', '$etape5', '$etape6', '$etape7', '$etape8', '$etape9')";
            
            // Exécution de la requête d'insertion
            if (mysqli_query($conn, $insertQuery)) {
                $alertClass = 'alert-success';
                $message = "Circuit ajout&eacute; avec succ&egrave;s !";
            } else {
                $alertClass = 'alert-danger';
                $message = "Erreur lors de l'ajout du circuit : " . mysqli_error($conn);
            }
        }
    }else {
		$alertClass = 'alert-danger';
            $message = " Erreur: Etape r&eacute;p&eacute;t&eacute;e  " ;
         
		
	}
}




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
  <title>Process</title>
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
			  <li class="sidebar-item">
			  <a class="sidebar-link" href="./circuit.php" aria-expanded="false">
                <span>
                  <i class="ti ti-edit"></i>
                </span>
                <span class="hide-menu">Cr&eacute;ation Circuit De Production</span>
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
 <div class="container fluid">
              <div class="card">
                <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajouter Un Circuit </h5>
			
  <form method="post">
 

		  

  <label class="form-label">Groupe Article</label>
  <select  class="form-select" name = "article"required>

    <option value = "spazzolato">Spazzolato</option>
	<option value ="standard">Standard</option>
	<option value ="thermofixage">Thermofixage</option>
	<option value ="apres_thermofixage">Apres Thermofixage</option>

  </select>
	
  <label class="form-label">Groupe couleur Couleur</label>
  <select  class="form-select" name = "couleur"required>

    <option value = "claire">Claire</option>
	<option value ="foncee">Foncée</option>
	<option value ="tous">Tous</option>

  </select>
  <div class="mb-3">
  <label class="form-label">Etape 1</label>
  <select  class="form-select" name = "etape1"required>

    <option value = "preparation">Pr&eacute;paraton</option>
	<option value ="sfaldina">Sfaldina</option>
	<option value ="teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value ="sechoire2">S&eacute;choire 2</option>
	<option value ="rameuse1">Rameuse 1</option>
	<option value ="rameuse2">Rameuse 2</option>
	<option value ="spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 2</label>
  <select  class="form-select" name = "etape2"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value ="sfaldina">Sfaldina</option>
	<option value ="teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value ="essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value ="sechoire2">S&eacute;choire 2</option>
	<option value= "rameuse1">Rameuse 1</option>
	<option value ="rameuse2">Rameuse 2</option>
	<option value ="spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 3</label>
  <select  class="form-select" name = "etape3"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value ="sfaldina">Sfaldina</option>
	<option value= "teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value ="sechoire1">S&eacute;choire 1</option>
	<option value ="sechoire2">S&eacute;choire 2</option>
	<option value ="rameuse1">Rameuse 1</option>
	<option value ="rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 4</label>
  <select  class="form-select" name = "etape4"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value= "sfaldina">Sfaldina</option>
	<option value ="teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value= "sechoire2">S&eacute;choire 2</option>
	<option value ="rameuse1">Rameuse 1</option>
	<option value ="rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 5</label>
  <select  class="form-select" name = "etape5"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value= "sfaldina">Sfaldina</option>
	<option value ="teinture1">Teinture 1</option>
	<option value= "teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value= "sechoire2">S&eacute;choire 2</option>
	<option value= "rameuse1">Rameuse 1</option>
	<option value= "rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 6</label>
  <select  class="form-select" name = "etape6"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value= "sfaldina">Sfaldina</option>
	<option value= "teinture1">Teinture 1</option>
	<option value= "teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value= "sechoire2">S&eacute;choire 2</option>
	<option value= "rameuse1">Rameuse 1</option>
	<option value= "rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 7</label>
  <select  class="form-select" name = "etape7"required>
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value= "sfaldina">Sfaldina</option>
	<option value= "teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value ="essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value= "sechoire2">S&eacute;choire 2</option>
	<option value ="rameuse1">Rameuse 1</option>
	<option value= "rameuse2">Rameuse 2</option>
	<option value ="spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 8</label>
  <select  class="form-select" name = "etape8">
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value= "sfaldina">Sfaldina</option>
	<option value= "teinture1">Teinture 1</option>
	<option value ="teinture2">Teinture 2</option>
	<option value ="essorage">Essorage</option>
	<option value ="sechoire1">S&eacute;choire 1</option>
	<option value ="sechoire2">S&eacute;choire 2</option>
	<option value="rameuse1">Rameuse 1</option>
	<option value= "rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>

  <div class="mb-3">
  <label class="form-label">Etape 9</label>
  <select  class="form-select" name = "etape9">
  <option value = ""></option>
    <option value = "preparation">Pr&eacute;paraton</option>
	<option value ="sfaldina">Sfaldina</option>
	<option value= "teinture1">Teinture 1</option>
	<option value= "teinture2">Teinture 2</option>
	<option value= "essorage">Essorage</option>
	<option value= "sechoire1">S&eacute;choire 1</option>
	<option value= "sechoire2">S&eacute;choire 2</option>
	<option value= "rameuse1">Rameuse 1</option>
	<option value= "rameuse2">Rameuse 2</option>
	<option value= "spazzolato">Spazzolato</option>
	<option value= "controle">Controle</option>
  </select>


    <div class="card-body d-flex justify-content-between " style="float: right;">
	  <input type="submit"name="Submit" class="btn btn-primary m-1" value ="START">
	 </div>

		
  </form>
<?php echo $jsCode; ?>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   
</body>

</html>