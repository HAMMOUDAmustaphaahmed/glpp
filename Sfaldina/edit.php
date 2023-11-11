<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
$query = "SELECT  * FROM `preparation` WHERE `id` = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$dispo = $row['dispo'];
$fournisseur = $row['fournisseur'];
$sub = $row['sub'];
$type_traitement = $row['type_traitement'];
$numero_lot = $row['numero_lot'];
$article = $row['article'];
$couleur = $row['couleur'];
$poids_dispo = $row['poids_dispo'];
$poids_reel = $row['poids_reel'];
$metrage_dispo = $row['metrage_dispo'];
    
} else {
    // ID non valide
    echo "ID non valide.";
}

 $querySfaldina = "SELECT *  FROM `sfaldina` WHERE dispo = '$dispo' AND sub = '$sub'";
                $resultSfaldina = mysqli_query($conn, $querySfaldina);
				$rowSfaldina = mysqli_fetch_assoc($resultSfaldina);
                $date_debut = $rowSfaldina['date_debut_sfaldina'];
				$operateur1 = $rowSfaldina['operateur'];
				$machine1 = $rowSfaldina['machine'];
				$nb1 = $rowSfaldina['nb_chariots'];
				$num1 = $rowSfaldina['num_chariot'];
 $query = "SELECT id FROM `sfaldina` WHERE dispo='$dispo' AND sub='$sub'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $sfaldina_id = $row['id'];
if (isset($_POST['Start'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire
    $operateur = mysqli_real_escape_string($conn, $_POST['operateur']);
    $machine = mysqli_real_escape_string($conn, $_POST['machine']);
	$nb_chariots = mysqli_real_escape_string($conn, $_POST['nb_chariots']);
	$num_chariot = mysqli_real_escape_string($conn, $_POST['num_chariot']);
    $date_debut_sfaldina = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $etat = "en cours";
    if (!empty($operateur) && !empty($machine) &&!empty($nb_chariots)  && !empty($num_chariot) ) {
// Mettre \u00e0 jour les donn\u00e9es dans la table `sfaldina`
            $updateQuery = "UPDATE `sfaldina` SET nb_chariots='$nb_chariots',num_chariot='$num_chariot',operateur='$operateur', machine='$machine', etat='$etat', date_debut_sfaldina='$date_debut_sfaldina' WHERE dispo = '$dispo'";
            if (mysqli_query($conn, $updateQuery)) {
				$alertClass = 'alert-success';
                $message = "Donn&eacute;es mises &agrave; jour !";
            } else {
				$alertClass = 'alert-danger';
                $message = "Erreur lors de l'insertion !!" . mysqli_error($conn);
            }   
    } else {
		$alertClass = 'alert-danger';
        $message = "Assurer vous de remplir tous les cases!";
    }
}
if (isset($_POST['Su'])) {
 $date_fin_sfaldina = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $etat = "termine";
    if ($date_debut!= "0000-00-00 00:00:00"  ) {

            $updateQuery = "UPDATE `sfaldina` SET  etat='$etat', date_fin_sfaldina='$date_fin_sfaldina' WHERE dispo = '$dispo'";

            if (mysqli_query($conn, $updateQuery)) {
				$alertClass = 'alert-success';
                $message = "Donn&eacute;es mises &agrave; jour !";
            } else {
				$alertClass = 'alert-danger';
                $message = "Erreur lors de l'insertion !!" . mysqli_error($conn);
            }
         } else {
		$alertClass = 'alert-danger';
        $message = "Veuiller cliquer sur START pour commencer !!";
    }
}



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_close($conn);

// Afficher l'alerte
echo '<div class="alert ' . $alertClass . ' fixed-top-right" role="alert" style="display: none;">';
echo $message;
echo '</div>';

// Afficher l'alerte avec un d\u00e9lai de 2 secondes (2000 millisecondes)
echo '<script>';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "block"; }, 100);';
echo 'setTimeout(function() { document.querySelector(".alert.fixed-top-right").style.display = "none"; }, 20000);'; // Masquer apr\u00e8s 10 secondes
echo '</script>';
?>

<!-- Reste du code HTML -->



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sfaldina</title>
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
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Donn&eacute;es Sfaldina</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Sfaldina</span>
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
      <!--  Header Start -->

      <!--  Header End -->
      
       <div class=" container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Sfaldina </h5>
			 
			   
            
            

				
  <form method="post">
  <div class="row mb-3">
  <div class="col">
      <label class="form-label">Op&eacute;rateur</label>
    <select class="form-select" name="operateur" <?php echo (!empty($operateur1) ) ? 'disabled' : ''; ?>>
        <?php if (empty($operateur1) ) : ?>
            <!-- Si $operateur1 et $operateur2 sont vides, affichez la liste déroulante avec des options statiques -->
             <option value ="Anwar">Anwar</option>
			<option value ="Aymen">Aymen</option>
			<option value ="Hatem">Hatem</option>
			<option value ="Hssan">Hssan</option>
			<option value = "Noureddine">Noureddine</option>
			<option value = "Salem">Salem</option>
			<option value = "Wahid">Wahid</option>
			<option value = "Mouadh">Mouadh</option>
            
     
        <?php elseif (!empty($operateur1) ) : ?>
            <!-- Si $operateur1 n'est pas vide et $operateur2 est vide, affichez $operateur1 comme option sélectionnée -->
            <option selected><?php echo $operateur1; ?></option>

        <?php endif; ?>
    </select>
</div>
          
		  
        <div class="col">
          <label  class="form-label">Dispo</label>
          <select  class="form-select" name="dispo" disabled >
<option value="<?php echo $dispo; ?>"><?php echo $dispo; ?></option>
          </select>
		  </div>
		        <div class="col">
          <label class="form-label">Sub</label>
          <select  class="form-select" name="sub" disabled>

<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>

          </select>
		  </div>
		    <div class="col">
    <label class="form-label">Machine</label>
    <select class="form-select" name="machine" <?php echo (!empty($machine1) ) ? 'disabled' : ''; ?> required>
        <?php if (empty($machine1) ) : ?>
            <!-- Si $machine 1 et $machine2 sont vides, affichez la liste déroulante avec des options statiques -->
<option>64</option>
<option>65</option>
<option>67-D</option>
<option>67-G</option>
<option>68-D</option>
<option>68-G</option>
            

        <?php elseif (!empty($machine1) ) : ?>
            <!-- Si $machine1 n'est pas vide et $machine2 est vide, affichez $machine1 comme option sélectionnée -->
            <option selected><?php echo $machine1; ?></option>
     
        <?php endif; ?>
    </select>
</div> 
		  
		   <?php if (empty($nb1) ) : ?>
	    <div class="col">
      <label  class="form-label">Nombre Chariots</label>
      <input type="Numbre" class="form-control" name="nb_chariots" placeholder="Saisie Nombre Chariots">
    </div>
	<?php elseif (!empty($nb1) ) : ?>
	    <div class="col">
      <label  class="form-label">Nombre Chariots</label>
      <input type="Numbre" class="form-control" name="nb_chariots" placeholder="Saisie Nombre Chariots"value="<?php echo $nb1; ?>" disabled>
    </div>
	<?php endif; ?>
	
			   <?php if (empty($num1) ) : ?>
	    <div class="col">
      <label  class="form-label">Num&eacute;ro Chariot</label>
      <input type="Numbre" class="form-control" name="num_chariot" placeholder="Saisie Num&eacute;ro Chariot" >
    </div>
	<?php elseif (!empty($num1) ) : ?>
	  	    <div class="col">
      <label  class="form-label">Num&eacute;ro Chariot</label>
      <input type="Numbre" class="form-control" name="num_chariot" placeholder="Saisie Num&eacute;ro Chariot" value="<?php echo $num1; ?>"disabled>
    </div>
	<?php endif; ?>
	
	</div>
	    <div id="form-data">

  <div class="mb-3">
  <label  class="form-label">Fournisseur</label>
  <select  id="fournisseur" class="form-select" name="fournisseur" disabled>
 <option value="<?php echo $fournisseur; ?>"><?php echo $fournisseur; ?></option>
  </select>

</div>

<div class="mb-3">
  <label  class="form-label">Type de Traitement</label>
  <select name = "type_traitement" class="form-select" disabled>
<option value="<?php echo $type_traitement; ?>"><?php echo $type_traitement; ?></option>
  </select>
</div>

<div class="mb-3">
  <label  class="form-label">Num&eacute;ro du Lot</label>
  <input type="text" class="form-control" name = "numero_lot" placeholder="Numero du Lot" value="<?php echo $numero_lot; ?>" disabled>
</div>

<div class="row mb-3">
  <div class="col">
    <label  class="form-label">Article</label>
    <select name = "article" class="form-select" disabled>
<option value="<?php echo $article; ?>"><?php echo $article; ?></option>
    </select>
  </div>
  <div class="col">
    <label  class="form-label">Couleur</label>
    <select name = "couleur" class="form-select" disabled>
<option value="<?php echo $couleur; ?>"><?php echo $couleur; ?></option>
    </select>
  </div>
  <div class="col">
    <label  class="form-label">Poids sur Dispo</label>
    <input type="number" class="form-control" name= "poids_dispo" placeholder="Poids sur Dispo" value="<?php echo $poids_dispo; ?>" disabled>
  </div>
  <div class="col">
    <label  class="form-label">Poids R&eacute;el</label>
    <input type="number" class="form-control" name = "poids_reel" placeholder="Poids Reel" value="<?php echo $poids_reel; ?>" disabled>
  </div>
  <div class="col">
    <label  class="form-label">M&eacute;trage sur Dispo</label>
    <input type="number" class="form-control" name= "metrage_dispo" placeholder="Metrage sur Dispo" value="<?php echo $metrage_dispo; ?>" disabled>
  </div>

 </div>
  
    <div class="card-body d-flex justify-content-between">
     <input type="submit" name="Start" class="btn btn-success m-1" value ="START">
	  <input type="submit" name="Su" class="btn btn-danger m-1"value ="FINISH">
	 </div>
  </form>

<?php echo $jssCode; ?>
<?php echo $jsCode; ?>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>