<?php
session_start();
include("db.php");

// R&eacute;cup&eacute;rer l'ID de la ligne depuis l'URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $etape = $_GET['etape'];

    // Effectuer une requête pour r&eacute;cup&eacute;rer les donn&eacute;es de la ligne avec l'ID donn&eacute;
 $query = "SELECT  * FROM `preparation` WHERE `id` = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
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
        // Aucune ligne trouv&eacute;e avec l'ID donn&eacute;
        echo "Aucune donn&eacute;e trouv&eacute;e.";
    }


} else {
    // ID non valide
    echo "ID non valide.";
}
           // Check if there is a matching record in Teinture
                $queryTeinture = "SELECT *FROM `Teinture` WHERE dispo = '$dispo' AND etape = '$etape'";
                $resultTeinture = mysqli_query($conn, $queryTeinture);
                $rowTeinture = mysqli_fetch_assoc($resultTeinture);
                $etat = $rowTeinture['etat'];
                $date_fin_Teinture = $rowTeinture['date_fin_Teinture'];
				$date_debut_Teinture = $rowTeinture['date_debut_Teinture'];
		        $chef_equipe1 = $rowTeinture['chef_equipe'];
			
				$deltae2 = $rowTeinture['deltaE2'];
				$deltae3 = $rowTeinture['deltaE3'];


				$heure_campionatura = date('Y-m-d H:i:s', strtotime('+1 hour'));

			
				$date_debut_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
		
				$date_debut_reparation2 = $rowTeinture['date_debut_reparation2'];
				$date_debut_reparation1 = $rowTeinture['date_debut_reparation1'];
	
				$date_fin_reparation2 = $rowTeinture['date_fin_reparation2'];
				$date_fin_reparation1 = $rowTeinture['date_fin_reparation1'];
				$operateur1 = $rowTeinture['operateur'];
				$machine1 = $rowTeinture['machine'];
			// Check if there is a matching record in Teinture	
               
				//definir les variables 
				$date_debut_teinture = date('Y-m-d H:i:s', strtotime('+1 hour'));
				$date_fin_teinture = date('Y-m-d H:i:s', strtotime('+1 hour'));
				$date_debut_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
				$date_fin_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
                $chef_equipe = mysqli_real_escape_string($conn, $_POST['chef_equipe']);




if (isset($_POST['fin'])) {
	
   
   

	
	if ($deltae2 != "0.00"  ){
    
           if ( $etat == "en cours"   ) {
			   
			   if ( $deltae3 == "0.00"   ) {
				   $etat1 = "termine";
                    $updateQuery = "UPDATE `Teinture` 
                                        SET  deltaE = '$deltae2', etat = '$etat1', date_fin_Teinture ='$date_fin_teinture', chef_equipe = '$chef_equipe'
                                        WHERE dispo = '$dispo' AND etape = '$etape'";
	
					} 
if (mysqli_query($conn, $updateQuery)) {
                            $alertClass = 'alert-success';
                            $message = "Dispo termin&eacute; avec succ&egrave;s";
                        } else {
                            $alertClass = 'alert-danger';
                            $message = "Erreur lors de l'insertion " . mysqli_error($conn);
                        }						
                    } elseif ($etat == "en attente" ){
						    $alertClass = 'alert-danger';
                            $message = "Veuillez cliquer sur START pour commencer " . mysqli_error($conn);
					}else {
					$alertClass = 'alert-danger';
                    $message = "Dispo d&eacute;ja Termin&eacute; " . mysqli_error($conn);	
					}
                      } else{
						
						$alertClass = 'alert-danger';
                        $message = "Vous devez saisir deltaE2  " . mysqli_error($conn);					
						}
	}
if (isset($_POST['submitdeltaEdeux'])) {
    // R&eacute;cup&eacute;rer les donn&eacute;es du formulaire
    if (!empty($_POST['deltaE'])) { // V&eacute;rifier si 'deltaE' n'est pas vide
        $deltaE = mysqli_real_escape_string($conn, $_POST['deltaE']); 
		if ($deltae2 =="0.00") {
         $updateQuery = "UPDATE `Teinture` 
                                            SET deltaE2 = '$deltaE', heure_campionatura2 = '$heure_campionatura'
                                            WHERE dispo = '$dispo' AND etape = '$etape'";
                            
                            if (mysqli_query($conn, $updateQuery)) {
								$alertClass = 'alert-success';
                                $message = "DeltaE2 mises &agrave; jour avec succ&egrave;s !";
                            }  else {
								$alertClass = 'alert-danger';
                            $message = "Erreur lors de l'enregistrement de DeltaE3";
                        }  
						 } else {
							$alertClass = 'alert-danger';
                            $message = "deltaE2 d&eacute;ja enregistr&eacute;.";
                        }
    } else {
        $alertClass = 'alert-danger';
        $message = "Erreur : deltaE est vide.";
    }
}
if (isset($_POST['submitdeltaEtrois'])) {
    // R&eacute;cup&eacute;rer les donn&eacute;es du formulaire
    if (!empty($_POST['deltaE'])) { // V&eacute;rifier si 'deltaE' n'est pas vide
        $deltaE = mysqli_real_escape_string($conn, $_POST['deltaE']);
                    if ( $deltae2 !="0.00"  ) {
						
                        if ($deltae3 =="0.00"  ) {
							if ($date_fin_reparation1 != "0000-00-00 00:00:00"){
                            $updateQuery = "UPDATE `Teinture` 
                                        SET  deltaE3 = '$deltaE', heure_campionatura3 = '$heure_campionatura'
                                        WHERE dispo = '$dispo' AND etape = '$etape'";
                            
                            if (mysqli_query($conn, $updateQuery)) {
								$alertClass = 'alert-success';
                                $message = "DeltaE3 mises &agrave; jour avec succ&egrave;s !";
                            } else {
								$alertClass = 'alert-danger';
                                $message = "Erreur lors de l'enregistrement de DeltaE3 " . mysqli_error($conn);
                            }
							} else {
							$alertClass = 'alert-danger';
                            $message = "Veuillez terminer la 1ere reparation.";
                        }
                        } else {
							$alertClass = 'alert-danger';
                            $message = "deltaE3 est d&eacute;ja enregistr&eacute;.";
                        }
					
						} else {
							$alertClass = 'alert-danger';
                            $message = " Veuillez saisir DeltaE2 avant de saisir DeltaE3.";
                        }
                    
    } else {
        $alertClass = 'alert-danger';
        $message = "Erreur : deltaE est vide.";
    }
}
if (isset($_POST['reparation'])) {
                
if ($etat == "en cours" ) {
                       if ( $deltae2 !="0.00"  && $deltae3 =="0.00" ) {
						if (   empty($date_debut_reparation1)||  $date_debut_reparation1 == "0000-00-00 00:00:00"  ){   
    $updateQuery = "UPDATE `Teinture` 
                    SET date_debut_reparation1 = '$date_debut_reparation'
                    WHERE dispo = '$dispo' AND etape = '$etape'";
					if (isset($updateQuery) && mysqli_query($conn, $updateQuery)) {
	                $alertClass = 'alert-success';
                    $message = "Vous avez commencer la reparation .";
                } else {
					$alertClass = 'alert-danger';
                            $message = " Veuillez saisir DeltaE2 avant de commencer la r&eacute;paration !!" . mysqli_error($conn);
                }
						}else {
						    $alertClass = 'alert-danger';
                            $message = "La 1ere r&eacute;paration est d&eacute;ja en cours !!";	
						}
                     } elseif ( $deltae3 !="0.00" ){
					if (  $date_debut_reparation2 == "0000-00-00 00:00:00" ){ 	 
    $updateQuery = "UPDATE `Teinture` 
                    SET date_debut_reparation2 = '$date_debut_reparation'
                    WHERE dispo = '$dispo' AND etape = '$etape'";
					if (isset($updateQuery) && mysqli_query($conn, $updateQuery)) {
	                $alertClass = 'alert-success';
                    $message = "Vous avez commencer la reparation .";
                } else {
					$alertClass = 'alert-danger';
                            $message = " Veuillez saisir DeltaE2 avant de commencer la r&eacute;paration !!" . mysqli_error($conn);
                }
}else {
						    $alertClass = 'alert-danger';
                            $message = "La 2&eacute;me r&eacute;paration est d&eacute;ja en cours !!";	
						}
}
                 
					 
}  elseif ($etat == "en attente" ) {
						 $alertClass = 'alert-danger';
                            $message = "Veuillez cliquer sur START pour commencer " . mysqli_error($conn);
}   else{
						$alertClass = 'alert-danger';
                    $message = "Dispo d&eacute;ja Termin&eacute; " . mysqli_error($conn);	
					}       
          
    } 
if (isset($_POST['finreparation'])) {

                        if (  $date_debut_reparation1 != "0000-00-00 00:00:00" &&   $date_debut_reparation2 == "0000-00-00 00:00:00" && $date_fin_reparation1 == "0000-00-00 00:00:00"  ) {

    $updateQuery = "UPDATE `Teinture` 
                    SET date_fin_reparation1 = '$date_fin_reparation'
                    WHERE dispo = '$dispo' AND etape = '$etape'";
} elseif ( $date_debut_reparation2 != "0000-00-00 00:00:00" && $date_fin_reparation2 == "0000-00-00 00:00:00"  ) {

    $updateQuery = "UPDATE `Teinture` 
                    SET date_fin_reparation2 = '$date_fin_reparation'
                    WHERE dispo = '$dispo' AND etape = '$etape'";
} 

                // Ex&eacute;cuter la requête d'insertion ou de mise à jour si applicable
                if (isset($updateQuery) && mysqli_query($conn, $updateQuery)) {
                    $alertClass = 'alert-success';
                    $message = "Vous avez termin&eacute; la r&eacute;paration .";
                }  else {
					$alertClass = 'alert-danger';
                    $message = "La r&eacute;paration est d&eacute;ja termin&eacute;e " . mysqli_error($conn);
                }    
    } 

mysqli_close($conn);

// Afficher l'alerte
echo '<div class="alert ' . $alertClass . ' fixed-top-right" role="alert" style="display: none;">';
echo $message;
echo '</div>';

// Afficher l'alerte avec un d&eacute;lai de 2 secondes (2000 millisecondes)
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
  <title>Teinture</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
     <style>
        /* Style pour les alertes empil&eacute;es en haut à droite */
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
                <span class="hide-menu">Donn&eacute;es Teinture</span>
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
      <!--  Header Start -->

      <!--  Header End -->
      
       <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Donn&eacute;es Teinture </h5>
			 
			   
            
            

				
  <form method="post">
  <div class="row mb-3">

		  
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
    <label class="form-label">Op&eacute;rateur</label>
    <select class="form-select" name="operateur" disabled>
       <option value="<?php echo $operateur1; ?>"><?php echo $operateur1; ?></option>
    </select>
</div>

		            <div class="col">
    <label class="form-label">Chef d'&eacute;quipe</label>
    <select class="form-select" name="chef_equipe" <?php echo (!empty($chef_equipe1) ) ? 'disabled' : ''; ?>>
        <?php if (empty($chef_equipe1) ) : ?>
            <!-- Si $operateur1 et $operateur2 sont vides, affichez la liste déroulante avec des options statiques -->

    <option>Hamed Flissi</option>
	   <option>Hamdi Khedimi</option>
	   <option>Walid Azzouzi</option>
        
        <?php elseif (!empty($chef_equipe1) ) : ?>
            <!-- Si $operateur1 n'est pas vide et $operateur2 est vide, affichez $operateur1 comme option sélectionnée -->
            <option selected><?php echo $chef_equipe1; ?></option>
        
        <?php endif; ?>
    </select>
</div>


          <div class="col">
    <label class="form-label">Machine</label>
    <select class="form-select" name="machine" disabled>
        <option value="<?php echo $machine1; ?>"><?php echo $machine1; ?></option>
    </select>
</div>  
		  


<div class="row mb-3">
  <div class="col">
  <label  class="form-label">Fournisseur</label>
  <select  id="fournisseur" class="form-select" name="fournisseur" disabled>
 <option value="<?php echo $fournisseur; ?>"><?php echo $fournisseur; ?></option>
  </select>

</div>
            

<div class="col">
  <label  class="form-label">Type de Traitement</label>
  <select name = "type_traitement" class="form-select" disabled>
<option value="<?php echo $type_traitement; ?>"><?php echo $type_traitement; ?></option>
  </select>
</div>

<div class="col">
  <label  class="form-label">Num&eacute;ro du Lot</label>
  <input type="text" class="form-control" name = "numero_lot" placeholder="Numero du Lot" value="<?php echo $numero_lot; ?>" disabled>
</div>
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

 <label  class="form-label">Campionatura</label>
 <div class="row mb-2">
  <div class="col">
 <div class="input-group">
 <input
type="numbre"
class="form-control"
placeholder="Saisie Valeur DeltaE"
name="deltaE"
step ="0.01"
/>

<input type="submit" name="submitdeltaEdeux" class="btn btn-outline-primary"  value ="DeltaE 2">
<input type="submit" name="submitdeltaEtrois" class="btn btn-outline-primary"  value ="DeltaE 3">
</div>
</div>
 <div class="col">
<input type="submit" name="reparation" class="btn btn-outline-success" value= "D&eacute;but R&eacute;paration">
<input type="submit" name="finreparation" class="btn btn-outline-danger" value ="Fin R&eacute;paration">






</div>
</div>


    <div class="card-body d-flex justify-content-between"  style="float: right;">

	  <input type="submit" name="fin" class="btn btn-danger m-1"value ="FINISH">
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