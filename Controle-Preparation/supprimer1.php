<?php
include("db.php");

if (isset($_GET['dispo'])) {
    $dispo = $_GET['dispo'];
	    $query2 = "SELECT * FROM teinture1 WHERE dispo = '$dispo'";
    $result = mysqli_query($conn, $query2);
	 $row = mysqli_fetch_assoc($result);
$article=$row['article'];
$couleur=$row['couleur'];



    // Define delete queries based on article and color conditions
    $deleteQueries = array();
    if (in_array($article, array('AOU', 'ATN', 'VR5', 'YN4'))) {
        if (!in_array($couleur, array('074', '101', '501', '506', '507'))) {
            $deleteQueries = array("preparation","sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "teinture2", "sechoire2", "rameuse1", "controle");
        } else {
            $deleteQueries = array("preparation","sfaldina", "teinture1", "essorage", "sechoire1", "spazzolato", "rameuse1", "controle");
        }
    } elseif (in_array($article, array('WG9', 'MT1', 'F9H'))) {
        $deleteQueries = array("preparation","sfaldina", "rameuse1", "teinture1", "essorage", "sechoire1", "rameuse2", "controle");
    } else {
        $deleteQueries = array("preparation","sfaldina", "teinture1", "essorage", "sechoire1", "rameuse1", "controle");
    }

    // Build and execute delete queries
    foreach ($deleteQueries as $table) {
        $deleteQuery = "DELETE FROM `$table` WHERE dispo = '$dispo'  ";
        if (!mysqli_query($conn, $deleteQuery)) {
            echo "Error while deleting from $table: " . mysqli_error($conn);
        }
    }
    
    // Redirect to the main page after deletion
    header("Location: teinture.php");
    exit();
} else {
    echo "ID not specified for deletion.";
}

mysqli_close($conn);
?>
