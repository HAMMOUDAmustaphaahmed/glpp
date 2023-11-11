<?php
// Récupérer l'ID de la ligne depuis l'URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Connexion à la base de données
    include("db.php");

    // Effectuer une requête pour récupérer les données de la ligne avec l'ID donné
 $query = "SELECT  dispo, fournisseur, sub, type_traitement, numero_lot, article, couleur, poids_dispo, poids_reel, metrage_dispo, metrage_reel FROM `preparation` WHERE `id` = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Maintenant, vous pouvez utiliser les valeurs de $row pour remplir les champs dans le formulaire
        // Notez que vous devez supprimer l'attribut "disabled" pour que les champs puissent être modifiés

        // Exemple :

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
$metrage_reel = $row['metrage_reel'];

    } else {
        // Aucune ligne trouvée avec l'ID donné
        echo "Aucune donnée trouvée.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // ID non valide
    echo "ID non valide.";
}
?><?php
date_default_timezone_set('Africa/Tunis');

include("db.php");

$message = ""; // Initialize the message variable

if (isset($_POST['Submit'])) {
    // Récupérer les données du formulaire
    $operateur = mysqli_real_escape_string($conn, $_POST['operateur']);
    $machine = mysqli_real_escape_string($conn, $_POST['machine']);
    $date_debut_sfaldina = date('Y-m-d H:i:s', strtotime('-1 hour'));
    $etat = "en cours";

    // Vérifier si $operateur et $machine ne sont pas vides
    if (!empty($operateur) && !empty($machine)) {
        // Récupérer les données de la ligne sélectionnée depuis la table `preparation`
        $query = "SELECT id FROM `sfaldina` WHERE dispo='$dispo' AND sub='$sub'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            $sfaldina_id = $row['id'];

            // Mettre à jour les données dans la table `sfaldina`
            $updateQuery = "UPDATE `sfaldina` SET operateur='$operateur', machine='$machine', etat='$etat', date_debut_sfaldina='$date_debut_sfaldina' WHERE id='$sfaldina_id'";

            if (mysqli_query($conn, $updateQuery)) {
                $message = "Donn\u00e9es mises à jour !";
            } else {
                $message = "Erreur lors de la mise à jour des donn\u00e9es : " . mysqli_error($conn);
            }
        } else {
            $message = "Aucun enregistrement correspondant trouvé dans la table sfaldina";
        }
    } else {
        $message = "Op\u00e9rateur et Machine ne peuvent pas être vides!";
    }
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_close($conn);

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('index.php');</script>";
}
?><?php
date_default_timezone_set('Africa/Tunis');

include("db.php");

$message = ""; // Initialize the message variable

if (isset($_POST['Su'])) {
    // Récupérer les données du formulaire
    $nb_chariots = mysqli_real_escape_string($conn, $_POST['nb_chariots']);
    $poids_sfaldina = mysqli_real_escape_string($conn, $_POST['poids_sfaldina']);
    $date_fin_sfaldina = date('Y-m-d H:i:s', strtotime('-1 hour'));
    $etat = "termine";
	$etat1= "en attente";

    // Vérifier si $nb_chariots et $poids_sfaldina ne sont pas vides
  
        // Récupérer les données de la ligne sélectionnée depuis la table `preparation`
        $query = "SELECT id FROM `sfaldina` WHERE dispo='$dispo' AND sub='$sub'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            $sfaldina_id = $row['id'];

            // Mettre à jour les données dans la table `sfaldina`
            $updateQuery = "UPDATE `sfaldina` SET nb_chariots='$nb_chariots', poids_sfaldina='$poids_sfaldina', etat='$etat', date_fin_sfaldina='$date_fin_sfaldina' WHERE id='$sfaldina_id'";

            if (mysqli_query($conn, $updateQuery)) {
                $message = "Donn\u00e9es mises à jour !";
            } else {
                $message = "Erreur lors de la mise à jour des donn\u00e9es : " . mysqli_error($conn);
            }
        } else {
            $message = "Aucun enregistrement correspondant trouv\u00e9 !";
        }
    } 




mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_close($conn);

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); window.location.replace('index.php');</script>";
}
?>

<!-- Reste du code HTML -->



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle Externe</title>
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
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Liste Tissue</span>
              </a>
         </li>
        

						
     
        
          </ul>
    <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="authentication-login.html"  class="btn btn-primary">LOG OUT</a>
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
      
       <div class="container">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Liste Tissue </h5>
			 
			   
            
            

				
  <form method="post">
  <div class="row mb-3">
  <div class="col">
  <label  class="form-label">Fournisseur</label>
  <select  id="fournisseur" class="form-select" name="fournisseur" disabled>
 <option value="<?php echo $fournisseur; ?>"><?php echo $fournisseur; ?></option>
  </select>
</div>

        <div class="col">
          <label  class="form-label">Dispo</label>
          <select  class="form-select" name="dispo" disabled >
<option value="<?php echo $dispo; ?>"><?php echo $dispo; ?></option>
          </select>
		  </div>

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

		  


	</div>
	      <h6 class="fw-semibold">Teste Physique </h6>



<div class="mb-3">
  <label  class="form-label">Type de Traitement</label>
  <select name = "type_traitement" class="form-select" disabled>
<option value="<?php echo $type_traitement; ?>"><?php echo $type_traitement; ?></option>
  </select>
</div>
  <h6 class="fw-semibold">Teste Chimique </h6>
<div class="mb-3">
  <label  class="form-label">Num&eacute;ro du Lot</label>
  <input type="text" class="form-control" name = "numero_lot" placeholder="Numero du Lot" value="<?php echo $numero_lot; ?>" disabled>
</div>
<h6 class="fw-semibold">Calo</h6>
<div class="row mb-3">

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
  <div class="col">
    <label  class="form-label">M&eacute;trage R&eacute;el</label>
    <input type="number" class="form-control" name="metrage_reel" placeholder="Metrage Reel"  value="<?php echo $metrage_reel; ?>"disabled>
  </div>
 </div>
  
    <div class="card-body d-flex justify-content-between">
     <input type="submit" name="Submit" class="btn btn-success m-1" value ="START">
	  <input type="submit" name="Su" class="btn btn-danger m-1"value ="FINISH">
	 </div>
  </form>
          <div class="text-center">
          <p class="mb-0 fs-4">Designed and Developed by Zoghlami Ahmed Seddik</p>
        </div>

<?php echo $jsCode; ?>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>