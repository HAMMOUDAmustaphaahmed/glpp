<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
$message = ""; // Initialize a variable to store messages

if (isset($_GET['id'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Fetch the existing data
    $query = "SELECT `operateur`, `dispo`, `sub`, `fournisseur`, `type_traitement`, `numero_lot`, `article`, `couleur`, `poids_dispo`, `poids_reel`, `metrage_dispo`, `poids_thermo`, `cabb` FROM `preparation` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $editId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $operateur, $dispo, $sub, $fournisseur, $type_traitement, $numero_lot, $article, $couleur, $poids_dispo, $poids_reel, $metrage_dispo, $poids_thermo, $cabb);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['Submit'])) {
    $editId = intval($_GET['id']); // Sanitize input

    // Extract new values from POST data
    $newOperateur = $_POST['operateur'];
    $newdispo = $_POST['dispo'];
    $newsub = $_POST['sub'];
    $newfournisseur = $_POST['fournisseur'];
    $newTypeTraitement = $_POST['type_traitement'];
    $newNumeroLot = $_POST['numero_lot'];
    $newarticle = $_POST['article'];
    $newcouleur = $_POST['couleur'];
    $newPoidsDispo = $_POST['poids_dispo'];
    $newPoidsReel = $_POST['poids_reel'];
    $newMetrageDispo = $_POST['metrage_dispo'];
    $newPoidsThermo = $_POST['poids_thermo'];
    $newcabb = $_POST['cabb'];
    $etat = "en attente"; // Set etat value

        // Update query
        $updateQuery = "UPDATE `preparation` SET 
            `operateur` = ?, 
            `dispo` = ?, 
            `sub` = ?, 
            `fournisseur` = ?, 
            `type_traitement` = ?, 
            `numero_lot` = ?, 
            `article` = ?, 
            `couleur` = ?, 
            `poids_dispo` = ?, 
            `poids_reel` = ?, 
            `metrage_dispo` = ?, 
            `poids_thermo` = ?, 
            `cabb` = ? 
            WHERE `id` = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $updateQuery);

        // Bind parameters
        mysqli_stmt_bind_param(
            $stmt, 
            "sssssssssssssi", 
            $newOperateur, 
            $newdispo, 
            $newsub, 
            $newfournisseur, 
            $newTypeTraitement, 
            $newNumeroLot, 
            $newarticle, 
            $newcouleur, 
            $newPoidsDispo, 
            $newPoidsReel, 
            $newMetrageDispo, 
            $newPoidsThermo, 
            $newcabb, 
            $editId
        );

        // Execute the update query
        if (mysqli_stmt_execute($stmt)) {
            $message = "Record updated successfully.";
        } else {
            $message = "Error updating record: " . mysqli_error($conn);
        }


       // Define delete queries based on article and color conditions
    $deleteQueries = array();
    if (in_array($article, array('AOU', 'ATN', 'VR5', 'YN4'))) {
        if (!in_array($couleur, array('074', '101', '501', '506', '507'))) {
            $deleteQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "teinture2", "sechoire2", "rameuse1", "controle");
        } else {
            $deleteQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "rameuse1", "controle");
        }
    } elseif (in_array($article, array('WG9', 'MT1', 'F9H'))) {
        $deleteQueries = array("sfaldina", "rameuse1", "teinture1", "essorage", "sechoire1", "rameuse2", "controle");
    } else {
        $deleteQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "rameuse1", "controle");
    }

    // Execute delete queries
    foreach ($deleteQueries as $table) {
        $deleteQuery = "DELETE FROM `$table` WHERE `article` = '$article' AND `couleur` = '$couleur' AND `dispo` = '$dispo' AND `sub` = '$sub' AND `etat` = '$etat'";
        mysqli_query($conn, $deleteQuery);
    }

    // Define insert queries based on article condition
    $insertQueries = array();
    if (in_array($newarticle, array('AOU', 'ATN', 'VR5', 'YN4'))) {
        if (!in_array($newcouleur, array('074', '101', '501', '506', '507'))) {
            $insertQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "teinture2", "sechoire2", "rameuse1", "controle");
        } else {
            $insertQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "rameuse1", "controle");
        }
    } elseif (in_array($newarticle, array('WG9', 'MT1', 'F9H'))) {
        $insertQueries = array("sfaldina", "rameuse1", "teinture1", "essorage", "sechoire1", "rameuse2", "controle");
    } else {
        $insertQueries = array("sfaldina", "teinture1", "essorage", "sechoire1", "rameuse1", "controle");
    }

    // Execute insert queries
    foreach ($insertQueries as $table) {
        $insertQuery = "INSERT INTO `$table` (dispo, sub, article, couleur, etat) VALUES ('$newdispo', '$newsub', '$newarticle', '$newcouleur', '$etat')";
        mysqli_query($conn, $insertQuery);
    }

           $message .= " Insertion r\u00e9ussie.";
		   header("Location: preparation.php");
exit(); // Make sure to exit to prevent further execution
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }



mysqli_close($conn);

?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pr&eacute;paration</title>
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
              <a class="sidebar-link" href="liste.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Liste Pr&eacute;paration</span>
              </a>
         </li>            
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Donn&eacute;es Pr&eacute;paration</span>
              </a>
         </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="pannes.php" aria-expanded="true">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pannes Pr&eacute;paration</span>
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
              <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Pr&eacute;paration </h5>
			
  <form method="post">
  <div class="row mb-3">
          <div class="col">
          <label  class="form-label">Op&eacute;rateur</label>
          <select  class="form-select" name = "operateur" >
		  <option><?php echo $operateur ?></option>
            <option>Aymen</option>
			<option>Hatem</option>
			<option>Noureddine</option>
			<option>Salem</option>
          </select>
		  </div>
        <div class="col">
          <label  class="form-label">Dispo</label>
          <input type="text" class="form-control"   name = "dispo" value="<?php echo $dispo ?>">
           
         
		  </div>
	  <div class="col">
          <label  class="form-label">Sub</label>
          <select  class="form-select"  name = "sub" >
		  <option><?php echo $sub ?></option>
            <option >0</option>
			<option>1</option>
			<option>2</option>
          </select>
		  </div>
	</div>
  <div class="mb-3">
  <label class="form-label">Fournisseur</label>
  <select  class="form-select" name = "fournisseur" >
  <option><?php echo $fournisseur ?></option>
    <option>GULLE</option>
	<option>KARA</option>
	<option>KASAR</option>
	<option>SANKO</option>
	<option>TOPEKA</option>
  </select>
</div>

<div class="mb-3">
  <label  class="form-label">Type de Traitement</label>
  <select id="Select2" class="form-select" name = "type_traitement">
  <option><?php echo $type_traitement ?></option>
    <option>Blanc 101</option>
	<option>Teinture</option>
	<option>PPT</option>
  </select>
</div>

<div class="mb-3">
  <label  class="form-label">Num&eacute;ro du Lot</label>
  <input type="text" class="form-control"   name = "numero_lot"  value="<?php echo $numero_lot ?>">
</div>
<div class="mb-3">
  <label  class="form-label">Cabb</label>
  <input type="text" class="form-control"   name = "cabb" value="<?php echo $cabb ?>">
</div>

<div class="row mb-3">
  <div class="col">
    <label  class="form-label">Article</label>
    <select  class="form-select" name ="article">
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
    <label  class="form-label">Couleur</label>
    <select  class="form-select" name ="couleur">
	<option><?php echo $couleur ?></option>
      <option>001</option>
	  <option>003</option>
	  <option>004</option>
	  <option>007</option>
	  <option>010</option>
	  <option>015</option>
	  <option>016</option>
	  <option>030</option>
	  <option>036</option>
	  <option>040</option>
	  <option>041</option>
	        <option>047</option>
	  <option>053</option>
	  <option>073</option>
	  <option>074</option>
	  <option>075</option>
	  <option>079</option>
	  <option>081</option>
	  <option>089</option>
	  <option>096</option>
	  <option>100</option>
	  <option>101</option>
	        <option>108</option>
	  <option>135</option>
	  <option>143</option>
	  <option>143</option>
	  <option>152</option>
	  <option>193</option>
	  <option>217</option>
	  <option>246</option>
	  <option>252</option>
	  <option>256</option>
	  <option>258</option>
	        <option>313</option>
	  <option>315</option>
	  <option>318</option>
	  <option>366</option>
	  <option>386</option>
	  <option>393</option>
	  <option>501</option>
	  <option>506</option>
	  <option>507</option>
	  <option>517</option>
	  <option>600</option>
	  <option>700</option>
	        <option>701</option>
	  <option>858</option>
	  <option>999</option>
	  <option>00D</option>
	  <option>00V</option>
	  <option>01C</option>
	  <option>01N</option>
	  <option>02A</option>
	  <option>02N</option>
	  <option>03F</option>
	  <option>03Z</option>
	        <option>04F</option>
	  <option>04J</option>
	  <option>04W</option>
	  <option>05F</option>
	  <option>05G</option>
	  <option>05N</option>
	  <option>05Q</option>
	  <option>06A</option>
	  <option>06U</option>
	  <option>06M</option>
	  <option>06W</option>
	  <option>06Z</option>
	        <option>07M</option>
	  <option>07N</option>
	  <option>07V</option>
	  <option>07W</option>
	  <option>07Z</option>
	  <option>08Y</option>
	  <option>09A</option>
	  <option>09W</option>
	  <option>0A1</option>
	  <option>0C5</option>
	  <option>0D6</option>
	        <option>0F1</option>
	  <option>0F3</option>
	  <option>0G7</option>
	  <option>0H7</option>
	  <option>0J4</option>
	  <option>0K9</option>
	  <option>0L8</option>
	  <option>0N4</option>
	  <option>0P0</option>
	  <option>0Q3</option>
	  <option>0Q5</option>
	        <option>0R2</option>
	  <option>0T8</option>
	  <option>0U1</option>
	  <option>0U7</option>
	  <option>0V1</option>
	  <option>0V3</option>
	  <option>0V7</option>
	  <option>0W5</option>
	  <option>0W6</option>
	  <option>0W9</option>
	  <option>0Y1</option>
	        <option>0Y3</option>
	  <option>0Y4</option>
	  <option>0Z3</option>
	  <option>0Z8</option>
	  <option>10Z</option>
	  <option>11F</option>
	  <option>11N</option>
	  <option>12D</option>
	  <option>12F</option>
	  <option>12N</option>
	  <option>12T</option>
	  <option>12Y</option>
	  <option>13C</option>
	  <option>14Z</option>
	  <option>15F</option>
	  <option>16F</option>
	  <option>16K</option>
	  <option>16Z</option>
	  <option>17V</option>
	  <option>18E</option>
	  <option>18J</option>
	  <option>18Q</option>
	  <option>18T</option>
	  	  <option>18Z</option>
	  <option>19D</option>
	  <option>19G</option>
	  <option>19R</option>
	  <option>1I1</option>
	  <option>1D1</option>
	  <option>1F3</option>
	  <option>1G2</option>
	  <option>1G6</option>
	  <option>1G9</option>
	  <option>1H3</option>
	  <option>1J4</option>
	  <option>1L6</option>
	  	  <option>1N0</option>
	  <option>1R0</option>
	  <option>1R3</option>
	  <option>1R4</option>
	  <option>1T4</option>
	  <option>1L1</option>
	  <option>1I6</option>
	  <option>1U3</option>
	  <option>1V0</option>
	  <option>1W0</option>
	  <option>1W2</option>
	  <option>1W4</option>
	  <option>1Y3</option>
	  	  <option>1Y7</option>
	  <option>1Y8</option>
	  <option>1Y9</option>
	  <option>1Z9</option>
	  <option>21W</option>
	  <option>22L</option>
	  <option>22T</option>
	  <option>23D</option>
	  <option>24B</option>
	  <option>24D</option>
	  <option>24Z</option>
	  	  <option>25B</option>
	  <option>25D</option>
	  <option>25K</option>
	  <option>25R</option>
	  <option>26A</option>
	  <option>26F</option>
	  <option>26G</option>
	  <option>26P</option>
	  <option>27K</option>
	  <option>29L</option>
	  <option>2C7</option>
	  	  <option>2D2</option>
		  <option>2D6</option>
	  <option>2F8</option>
	  <option>2G3</option>
	  <option>2G5</option>
	  <option>2G6</option>
	  <option>2G9</option>
	  <option>2H0</option>
	  <option>2H1</option>
	  <option>2H6</option>
	  <option>2H7</option>
	  <option>2J2</option>
	  	  <option>2K3</option>
	  <option>2K5</option>
	  <option>2K7</option>
	  <option>2L3</option>
	  <option>2L4</option>
	  <option>2V5</option>
	  <option>2Y4</option>
	  <option>30F</option>
	  <option>30Y</option>
	  <option>31N</option>
	  <option>32Y</option>
	  	  <option>33A</option>
	  <option>33G</option>
	  <option>34A</option>
	  <option>34H</option>
	  <option>34L</option>
	  <option>34P</option>
	  <option>34V</option>
	  <option>35A</option>
	  <option>35L</option>
	  <option>35R</option>
	  <option>36E</option>
	  <option>36U</option>
	  	  <option>37T</option>
	  <option>38A</option>
	  <option>38E</option>
	  <option>39A</option>
	  <option>39B</option>
	  <option>39C</option>
	  <option>3A6</option>
	  <option>3B5</option>
	  <option>3D7</option>
	  <option>3F4</option>
	  <option>3G0</option>
	  	  <option>3G7</option>
	  <option>3H4</option>
	  <option>3K0</option>
	  <option>3L3</option>
	  <option>3L7</option>
	  <option>3M6</option>
	  <option>3N4</option>
	  <option>3N7</option>
	  <option>3P5</option>
	  <option>3P8</option>
	  <option>3T5</option>
	  <option>3V5</option>
	  <option>3W9</option>
	  <option>3Z9</option>
	  <option>66U</option>
	  <option>78T</option>
	  <option>8Y4</option>
	  <option>99A</option>
	  <option>G51</option>
	  
    </select>
  </div>
  <div class="col">
    <label  class="form-label">Poids sur Dispo</label>
    <input type="number" class="form-control"   name ="poids_dispo" value="<?php echo $poids_dispo ?>" step ="0.01">
  </div>
  <div class="col">
    <label  class="form-label">Poids R&eacute;el</label>
    <input type="number" class="form-control"   name ="poids_reel" value="<?php echo $poids_reel ?>" step ="0.01">
  </div>
  <div class="col">
    <label  class="form-label">M&eacute;trage sur Dispo</label>
    <input type="number" class="form-control"   name ="metrage_dispo" value="<?php echo $metrage_dispo ?>" step ="0.01">
  </div>
  <div class="col">
    <label  class="form-label">Poids Thermofixage</label>
    <input type="number" class="form-control"   name ="poids_thermo" value="<?php echo $poids_thermo ?>" step ="0.01">
   
   </div>
 
  
    <div class="card-body d-flex justify-content-between">

	  <input type="submit"name="Submit" class="btn btn-primary m-1" value ="Modifier">
	 </div>

		
  </form>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>