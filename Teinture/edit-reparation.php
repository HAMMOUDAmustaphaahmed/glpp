<?php
session_start();
include("db.php");
if (!isset($_SESSION['prenom'])) {
header("Location:../index.php");
    exit();
}
// R\u00e9cup\u00e9rer l'ID de la ligne depuis l'URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];


    // Effectuer une requête pour r\u00e9cup\u00e9rer les donn\u00e9es de la ligne avec l'ID donn\u00e9
 $query = "SELECT  dispo, fournisseur, sub, type_traitement, numero_lot, article, couleur, poids_dispo, poids_reel, metrage_dispo, poids_thermo FROM `preparation` WHERE `id` = $id";

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
$poids_thermo = $row['poids_thermo'];

    } else {
        // Aucune ligne trouv\u00e9e avec l'ID donn\u00e9
        echo "Aucune donn\u00e9e trouv\u00e9e.";
    }


} else {
    // ID non valide
    echo "ID non valide.";
}

// get id from preparation
$id = $_GET['id'];
            $queryPreparation = "SELECT * FROM `preparation` ";
            $resultPreparation = mysqli_query($conn, $queryPreparation);
            $rowPreparation = mysqli_fetch_assoc($resultPreparation);
            $dispo = $rowPreparation['dispo'];
            $sub = $rowPreparation['sub'];
			// get etape from blocage
            $queryBlocage = "SELECT * FROM `blocage` WHERE dispo = '$dispo' ";
            $resultBlocage = mysqli_query($conn, $queryBlocage);
            $rowBlocage = mysqli_fetch_assoc($resultBlocage);
            $etape = $rowBlocage['etape'];
// Get id from teinture1 
                        $query_teinture1 = "SELECT * FROM `teinture1` WHERE dispo = '$dispo' AND sub = '$sub'";
                        $result_teinture1 = mysqli_query($conn, $query_teinture1);
				        $row_teinture1 = mysqli_fetch_assoc($result_teinture1);
				        $teinture1_id = $row_teinture1['id'];
						
						$ph2_teinture1 = $row_teinture1['ph2'];
						// Get id from reparation_teinture1
                        $queryreparation_teinture1 = "SELECT * FROM `reparation_teinture1` WHERE dispo = '$dispo' AND sub = '$sub'";
                        $resultreparation_teinture1 = mysqli_query($conn, $queryreparation_teinture1);
				        $rowreparation_teinture1 = mysqli_fetch_assoc($resultreparation_teinture1);
                        $reparation_teinture1_id = $rowreparation_teinture1['id'];
						$date_fin_reparation_teinture1 = $rowreparation_teinture1['date_fin_reparation_teinture1'];
						$ph2_reparation_teinture1 = $rowreparation_teinture1['ph2'];
						
						$deltae1_reparation_teinture1 =  $rowreparation_teinture1['deltaE1'];
						$deltae2_reparation_teinture1 =  $rowreparation_teinture1['deltaE2'];
						$deltae3_reparation_teinture1 =  $rowreparation_teinture1['deltaE3'];
						$heure_campionatura1_reparation_teinture1 = $rowreparation_teinture1['heure_campionatura1']; // Ajoutez cette ligne
						$heure_campionatura2_reparation_teinture1 = $rowreparation_teinture1['heure_campionatura2']; // Ajoutez cette ligne
                        $heure_campionatura3_reparation_teinture1 = $rowreparation_teinture1['heure_campionatura3']; // Ajoutez cette ligne
						$date_debut_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
						$date_fin_reparation = date('Y-m-d H:i:s', strtotime('+1 hour'));
// Get id from teinture2
                       $query_teinture2 = "SELECT *  FROM `teinture2` WHERE dispo = '$dispo' AND sub = '$sub'";
                       $result_teinture2 = mysqli_query($conn, $query_teinture2);
				       $row_teinture2 = mysqli_fetch_assoc($result_teinture2);
				       $teinture2_id = $row_teinture2['id'];
					   
					   // Get id from  reparation_teinture2
                       $queryreparation_teinture2 = "SELECT *  FROM `reparation_teinture2` WHERE dispo = '$dispo' AND sub = '$sub'";
                       $resultreparation_teinture2 = mysqli_query($conn, $queryreparation_teinture2);
				       $rowreparation_teinture2 = mysqli_fetch_assoc($resultreparation_teinture2);
                       $reparation_teinture2_id = $rowreparation_teinture2['id'];
					   $ph2_reparation_teinture2 = $rowreparation_teinture2['ph2'];
					   
					   $deltae1_reparation_teinture2 =  $rowreparation_teinture2['deltaE1'];
					   $deltae2_reparation_teinture2 =  $rowreparation_teinture2['deltaE2'];
					   $deltae3_reparation_teinture2 =  $rowreparation_teinture2['deltaE3'];
					   $heure_campionatura1_reparation_teinture2 = $rowreparation_teinture2['heure_campionatura1']; // Ajoutez cette ligne
					   $heure_campionatura2_reparation_teinture2 = $rowreparation_teinture2['heure_campionatura2']; // Ajoutez cette ligne
                       $heure_campionatura3_reparation_teinture2 = $rowreparation_teinture2['heure_campionatura3']; // Ajoutez cette ligne
$date_debut_reparation_teinture1 = date('Y-m-d H:i:s', strtotime('+1 hour'));
$date_debut_reparation_teinture2 = date('Y-m-d H:i:s', strtotime('+1 hour'));	   
$heure_campionatura = date('Y-m-d H:i:s', strtotime('+1 hour'));	
    $date_savonnage = date('Y-m-d H:i:s', strtotime('+1 hour'));					
if (isset($_POST['Submit'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire
    $operateur = mysqli_real_escape_string($conn, $_POST['operateur']);
    $machine = mysqli_real_escape_string($conn, $_POST['machine']);
    $etat = "en cours reparation"; // \u00e9tat initial, peut être modifi\u00e9 selon vos besoins
                if ($etape == "teinture1") {
                    // date_fin_reparation_teinture1 is empty, update reparation_teinture1 with additional info
					
					$updateQuery = "UPDATE `teinture1` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture1_id'";
                    $insertQuery = "INSERT INTO `reparation_teinture1` (dispo, sub, article, couleur, etat, machine, operateur, date_debut_reparation_teinture1 ) VALUES ('$dispo', '$sub','$article','$couleur','$etat', '$machine', '$operateur','$date_debut_reparation_teinture1')";
                      // Ex\u00e9cuter la requête d'insertion or update if applicable
            if (isset($updateQuery)  && isset($insertQuery) ) {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }              
                } else {
                    // Insert into reparation_teinture2 with the same dispo and sub
                    
                    $updateQuery = "UPDATE `teinture2` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture2_id'";
					$insertQuery = "INSERT INTO `reparation_teinture2` (dispo, sub, article, couleur, etat, machine, operateur, date_debut_reparation_teinture2 ) VALUES ('$dispo', '$sub','$article','$couleur','$etat', '$machine', '$operateur','$date_debut_reparation_teinture2')";
					 // Ex\u00e9cuter la requête d'insertion or update if applicable
            if (isset($updateQuery) && isset($insertQuery) ) {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }
                }
            
        } 
if (isset($_POST['fin'])) {
	 
     $etat = "fin reparation"; // \u00e9tat initial, peut être modifi\u00e9 selon vos besoins
    
      if ($etape == "teinture1") {
		  if (!empty($ph2_reparation_teinture1) ){
			  if ( !empty($deltae2_reparation_teinture1) ){
 if ( $deltae3_reparation_teinture1 == "0.00"   ) {
                        $date_fin_reparation_teinture1 = date('Y-m-d H:i:s', strtotime('+1 hour'));
                        $updateQuery = "UPDATE `teinture1` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture1_id'";
                        $insertQuery = "UPDATE `reparation_teinture1` 
                                    SET etat = '$etat' , deltaE = '$deltae2_reparation_teinture1' , date_fin_reparation_teinture1 = '$date_fin_reparation_teinture1'
                                    WHERE id = '$reparation_teinture1_id'";
            if (mysqli_query($conn, $updateQuery)  && mysqli_query($conn, $insertQuery))  {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }
 
			
			} else {
                           $date_fin_reparation_teinture1 = date('Y-m-d H:i:s', strtotime('+1 hour'));
                        $updateQuery = "UPDATE `teinture1` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture1_id'";
                        $insertQuery = "UPDATE `reparation_teinture1` 
                                    SET etat = '$etat' , deltaE = '$deltae3_reparation_teinture1' , date_fin_reparation_teinture1 = '$date_fin_reparation_teinture1'
                                    WHERE id = '$reparation_teinture1_id'";
                        if (mysqli_query($conn, $updateQuery)  && mysqli_query($conn, $insertQuery) ) {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }
                        }
						} else {
			   $message = "Veuiller s'il vous plait saisire deltaE : " . mysqli_error($conn);
		  }
		  } else {
			   $message = "Veuiller s'il vous plait saisire PH : " . mysqli_error($conn);
		  }
                    } else {
						if ( !empty($ph2_reparation_teinture2) ){
							if ( !empty($deltae2_reparation_teinture2) ){
					   if ( $deltae3_teinture2 == "0.00"   ) { 
                        // Insert into reparation_teinture2 with the same dispo and sub
                        
                        $date_fin_reparation_teinture2 = date('Y-m-d H:i:s', strtotime('+1 hour'));
                        $updateQuery = "UPDATE `teinture2` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture2_id'";
                        $insertQuery = "UPDATE `reparation_teinture2` 
                                    SET etat = '$etat' , deltaE = '$deltae2_reparation_teinture2' , date_fin_reparation_teinture2 = '$date_fin_reparation_teinture2'
                                    WHERE id = '$reparation_teinture2_id'";
                        if (mysqli_query($conn, $updateQuery)  && mysqli_query($conn, $insertQuery) ) {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }
                    } else {
						$date_fin_reparation_teinture2 = date('Y-m-d H:i:s', strtotime('+1 hour'));
                        $updateQuery = "UPDATE `teinture2` 
                                    SET etat = '$etat' 
                                    WHERE id = '$teinture2_id'";
                        $insertQuery = "UPDATE `reparation_teinture2` 
                                    SET etat = '$etat' , deltaE = '$deltae3_reparation_teinture2' , date_fin_reparation_teinture2 = '$date_fin_reparation_teinture2'
                                    WHERE id = '$reparation_teinture2_id'";
                        if (mysqli_query($conn, $updateQuery)  && mysqli_query($conn, $insertQuery) ) {
                $message = "Donn\u00e9es mises \u00e0 jour !";
            }  else {
                $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion des donn\u00e9es : " . mysqli_error($conn);
            }}
                
 }    else {
	$message = "Veuiller s'il vous plait saisire deltaE : " . mysqli_error($conn);
}           
        
}    else {
	$message = "Veuiller s'il vous plait saisire PH : " . mysqli_error($conn);
}
}
}

if (isset($_POST['submitphdeux'])) {
    // Retrieve data from the form
    if (!empty($_POST['ph'])) {
        $ph = mysqli_real_escape_string($conn, $_POST['ph']);
        $heure_ph = date('Y-m-d H:i:s', strtotime('+1 hour'));
        if (empty ($ph2_reparation_teinture1)  && $etape == "teinture1") {
                            $updateQuery1 = "UPDATE `reparation_teinture1` 
                                            SET ph2 = '$ph', heure_ph2 = '$heure_ph'
                                            WHERE id = '$reparation_teinture1_id'";
                            if (isset($updateQuery1) && mysqli_query($conn, $updateQuery1) ) {
                                $message = "Donn\u00e9es mises \u00e0 jour pour reparation_teinture1!";
                            } else {
                                $message = "ph2 est d\u00e9j\u00e0 enregistr\u00e9. " . mysqli_error($conn);
                            }
                        } elseif ( empty($ph2_reparation_teinture2)  && $etape == "teinture2") {

                        $updateQuery2 = "UPDATE `reparation_teinture2` 
                                         SET ph2 = '$ph', heure_ph2 = '$heure_ph'
                                         WHERE id = '$reparation_teinture2_id'";
                        
                        if (mysqli_query($conn, $updateQuery2)) {
                            $message = "Donn\u00e9es mises \u00e0 jour pour reparation_teinture2!";
                        } else {
                            $message = "ph2 est d\u00e9j\u00e0 enregistr\u00e9  " . mysqli_error($conn);
                        }
                    }  
} else {
        $message = "Erreur : Le champ 'ph' ne peut pas être vide.";
    }
}
if (isset($_POST['submitdeltaEun'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire
    if (!empty($_POST['deltaE'])) { // V\u00e9rifier si 'deltaE' n'est pas vide
        $deltaE = mysqli_real_escape_string($conn, $_POST['deltaE']);

        if (empty($deltae1_reparation_teinture1) &&  $etape == "teinture1") {
                        // date_fin_reparation_teinture1 est vide, mettez \u00e0 jour reparation_teinture1 avec des informations suppl\u00e9mentaires
                        $updateQuery = "UPDATE `reparation_teinture1` 
                                        SET deltaE1 = '$deltaE', heure_campionatura1 = '$heure_campionatura'
                                        WHERE id = '$reparation_teinture1_id'";
							            
         } elseif (empty($deltae1_reparation_teinture2) &&  $etape == "teinture2") {
                        $updateQuery = "UPDATE `reparation_teinture2` 
                                         SET deltaE1 = '$deltaE', heure_campionatura1 = '$heure_campionatura'
                                         WHERE id = '$reparation_teinture2_id'";  
                    } 
              if (mysqli_query($conn, $updateQuery)) {
                            $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s pour reparation_teinture2!";
                        } else {
                            $message = "DeltaE1 d\u00e9j\u00e0 enregistr\u00e9 " . mysqli_error($conn);
                        } 
    } else {
        // 'deltaE' est vide, g\u00e9rer ce cas en cons\u00e9quence
        $message = "Erreur : Le champ 'deltaE' ne peut pas être vide.";
    }
}
if (isset($_POST['submitdeltaEdeux'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire
    if (!empty($_POST['deltaE'])) { // V\u00e9rifier si 'deltaE' n'est pas vide
        $deltaE = mysqli_real_escape_string($conn, $_POST['deltaE']);
    if ($deltae1_reparation_teinture1 != "0.00") {
                        if (empty($deltae2_reparation_teinture1 )  &&  $etape=="teinture1") {
                            
                            $updateQuery = "UPDATE `reparation_teinture1` 
                                            SET deltaE2 = '$deltaE', heure_campionatura2 = '$heure_campionatura'
                                            WHERE id = '$reparation_teinture1_id'";
											if (mysqli_query($conn, $updateQuery)) {
                            $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s pour reparation_teinture2!";
                        } else {
                            $message = "Erreur lors de la mise \u00e0 jour : " . mysqli_error($conn);
                        }
                        } elseif ( empty($deltae2_reparation_teinture2) &&  $etape=="teinture2") {
                            
                            $updateQuery = "UPDATE `reparation_teinture1` 
                                            SET deltaE2 = '$deltaE', heure_campionatura2 = '$heure_campionatura'
                                            WHERE id = '$reparation_teinture2_id'";
											if (mysqli_query($conn, $updateQuery)) {
                            $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s pour reparation_teinture2!";
                        } else {
                            $message = "Erreur lors de la mise \u00e0 jour : " . mysqli_error($conn);
                        }
                        } 
                    } else {
                        $message = "deltaE1 non enregist\u00e9 !";
                    }
                    
                }
            }    
if (isset($_POST['submitdeltaEtrois'])) {
    // R\u00e9cup\u00e9rer les donn\u00e9es du formulaire
    if (!empty($_POST['deltaE'])) { // V\u00e9rifier si 'deltaE' n'est pas vide
        $deltaE = mysqli_real_escape_string($conn, $_POST['deltaE']);
    if ($deltae1_reparation_teinture1 !="0.00" && $deltae2_reparation_teinture1!= "0.00") {
                        if (empty($deltae3_reparation_teinture1)  &&  $etape =="teinture1") {
                            
                            $updateQuery = "UPDATE `reparation_teinture1` 
                                            SET deltaE3 = '$deltaE', heure_campionatura3 = '$heure_campionatura'
                                            WHERE id = '$reparation_teinture1_id'";
                        } elseif ( empty($deltae3_reparation_teinture2) &&  $etape =="teinture2") {
                            
                            $updateQuery = "UPDATE `reparation_teinture1` 
                                            SET deltaE3 = '$deltaE', heure_campionatura3 = '$heure_campionatura'
                                            WHERE id = '$reparation_teinture2_id'";
                        } 
                    } else {
                        $message = "deltaE1 ou deltaE2 non enregist\u00e9 !";
                    }
                    if (mysqli_query($conn, $updateQuery)) {
                            $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s pour reparation_teinture2!";
                        } else {
                            $message = "Erreur lors de la mise \u00e0 jour : " . mysqli_error($conn);
                        }
                }
            }    
if (isset($_POST['reparation'])) {
               if (empty($date_fin_reparation_teinture1) || $date_fin_reparation_teinture1 == "0000-00-00 00:00:00") {
                        // date_fin_reparation_teinture1 est vide, mettez \u00e0 jour reparation_teinture1 avec des informations suppl\u00e9mentaires
                        if (  $heure_campionatura2_reparation_teinture1 == "0000-00-00 00:00:00" &&   $heure_campionatura3_reparation_teinture1 == "0000-00-00 00:00:00") {
    // Si heure_campionatura2 et heure_campionatura3 sont vides, enregistrez dans date_debut_reparation1
  $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_debut_reparation1 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture1_id'";
				
} elseif ( $heure_campionatura3_reparation_teinture1 == "0000-00-00 00:00:00" && $heure_campionatura2_reparation_teinture1 != "0000-00-00 00:00:00") {
  $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_debut_reparation2 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture1_id'";
} else {

    $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_debut_reparation3 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture1_id'";
}
                    } else {
                        // Ins\u00e9rer dans reparation_teinture2 avec le même dispo et sub
                        if ($heure_campionatura2_reparation_teinture2 == "0000-00-00 00:00:00" &&   $heure_campionatura3_reparation_teinture2 == "0000-00-00 00:00:00") {
    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_debut_reparation1 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture2_id'";
} elseif ($heure_campionatura3_reparation_teinture2 == "0000-00-00 00:00:00" && $heure_campionatura2_reparation_teinture2 != "0000-00-00 00:00:00") {
    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_debut_reparation2 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture2_id'";
} else {
    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_debut_reparation3 = '$date_debut_reparation'
                    WHERE id = '$reparation_teinture2_id'";
}
                    }
 // Ex\u00e9cuter la requête d'insertion ou de mise \u00e0 jour si applicable
                if (isset($updateQuery) && mysqli_query($conn, $updateQuery) && isset($insertQuery) && mysqli_query($conn, $insertQuery)) {
                    $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s!";
                } else {
                    $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion : " . mysqli_error($conn);
                }    
    } 
if (isset($_POST['finreparation'])) {
 if (empty($date_fin_reparation_teinture1) || $date_fin_reparation_teinture1 == "0000-00-00 00:00:00") {
   // date_fin_reparation_teinture1 est vide, mettez \u00e0 jour reparation_teinture1 avec des informations suppl\u00e9mentaires
                        if ($heure_campionatura2_reparation_teinture1 == "0000-00-00 00:00:00" &&   $heure_campionatura3_reparation_teinture1 == "0000-00-00 00:00:00") {
    // Si date_debut_reparation2 et date_debut_reparation3 sont vides, enregistrez dans date_fin_reparation1

    $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_fin_reparation1 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture1_id'";
} elseif ( $heure_campionatura3_reparation_teinture1 == "0000-00-00 00:00:00" && $heure_campionatura2_reparation_teinture1 != "0000-00-00 00:00:00" ) {
    // Si date_debut_reparation3 est vide et date_debut_reparation2 est non vide, enregistrez dans date_fin_reparation2
 $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_fin_reparation2 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture1_id'";
} else {
    $updateQuery = "UPDATE `reparation_teinture1` 
                    SET date_fin_reparation3 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture1_id'";
}
                    } else {
                        // Ins\u00e9rer dans reparation_teinture2 avec le même dispo et sub
                        if ($heure_campionatura2_reparation_teinture2 == "0000-00-00 00:00:00" &&   $heure_campionatura3_reparation_teinture2 == "0000-00-00 00:00:00") {
    // Si date_debut_reparation2 et date_debut_reparation3 sont vides, enregistrez dans date_fin_reparation1
    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_fin_reparation1 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture2_id'";
} elseif ($heure_campionatura3_reparation_teinture2 == "0000-00-00 00:00:00" && $heure_campionatura2_reparation_teinture2 != "0000-00-00 00:00:00") {
    // Si date_debut_reparation3 est vide et date_debut_reparation2 est non vide, enregistrez dans date_fin_reparation2
    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_fin_reparation2 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture2_id'";
} else {
    // Sinon, enregistrez dans date_fin_reparation3

    $updateQuery = "UPDATE `reparation_teinture2` 
                    SET date_fin_reparation3 = '$date_fin_reparation'
                    WHERE id = '$reparation_teinture2_id'";
}
                    }
                // Ex\u00e9cuter la requête d'insertion ou de mise \u00e0 jour si applicable
                if (isset($updateQuery) && mysqli_query($conn, $updateQuery)) {
                    $message = "Donn\u00e9es mises \u00e0 jour avec succ\u00e8s!";
                } elseif (isset($insertQuery) && mysqli_query($conn, $insertQuery)) {
                    $message = "Donn\u00e9es ins\u00e9r\u00e9es avec succ\u00e8s !";
                } else {
                    $message = "Erreur lors de la mise \u00e0 jour ou de l'insertion : " . mysqli_error($conn);
                }
           
    } 

// JavaScript code for displaying alert and redirecting
$jsCode = "";
if (!empty($message)) {
    $jsCode = "<script>alert(\"$message\"); </script>";
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
          <select  class="form-select" name="operateur">
            <option>Chaabene Azouzi</option>
			<option>Hamdi Khedimi</option>
			<option>Hamed Flissi</option>
			<option>Hatem Belwaer</option>
			<option>Khayri Souid</option>
			<option>Mansour Elwaer</option>
			<option>Rafik Bssili</option>
			<option>Rami Skhiri</option>
			<option>Sayfeddine Ghali</option>
			<option>Wahid Khadraoui</option>
			<option>Walid Azzouzi</option>
			<option>Zied Missaoui</option>		
          </select>
		  </div>
		  <div class="col">
          <label class="form-label">Machine</label>
          <select  class="form-select" name="machine"required >
            <option>MAC10</option>
			<option>MAC11</option>
			<option>MAC12</option>
			<option>MAC13</option>
			<option>MAC14</option>
			<option>MAC15</option>
			<option>MAC16</option>
			<option>MAC17</option>
			<option>MAC18</option>
			<option>MAC19</option>
			<option>MAC20</option>
			<option>MAC21</option>
			<option>MAC22</option>
			<option>MAC23</option>
			<option>MAC24</option>
			<option>MAC25</option>
			<option>MAC26</option>
			<option>MAC27</option>
			<option>MAC28</option>
			<option>MAC29</option>
          </select>
		  </div>
		  


	</div>
	    <div id="form-data">
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
  <div class="col">
    <label  class="form-label">Poids Thermofixage</label>
    <input type="number" class="form-control" name="poids_thermo" placeholder="Metrage Reel"  value="<?php echo $poids_thermo; ?>"disabled>
  </div>
 </div>
 <label  class="form-label">Ph</label>
 <div class="input-group">
<input type="number" class="form-control" placeholder="Saisie Valeur Ph" name ="ph" step ="0.01" />

<input type="submit" name="submitphdeux"  class="btn btn-outline-primary"  value="Ph" >
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
<input type="submit" name="submitdeltaEun" class="btn btn-outline-primary"  value ="DeltaE 1">
<input type="submit" name="submitdeltaEdeux" class="btn btn-outline-primary"  value ="DeltaE 2">
<input type="submit" name="submitdeltaEtrois" class="btn btn-outline-primary"  value ="DeltaE 3">
</div>
</div>
 <div class="col">
<input type="submit" name="reparation" class="btn btn-outline-success" value= "D&eacute;but R&eacute;paration">
<input type="submit" name="finreparation" class="btn btn-outline-danger" value ="Fin R&eacute;paration">






</div>

    <div class="card-body d-flex justify-content-between">
     <input type="submit" name="Submit" class="btn btn-success m-1" value ="START">
	  <input type="submit" name="fin" class="btn btn-danger m-1"value ="FINISH">
	 </div>
  </form>

<?php echo $rsCode;?>

<?php echo $ph1Code;?>
<?php echo $jsCode; ?>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>