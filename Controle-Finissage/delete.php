<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];



        $deleteQuery = "DELETE FROM `ref` WHERE `id` = '$id' ";
        if (!mysqli_query($conn, $deleteQuery)) {
            echo "Error while deleting from  " . mysqli_error($conn);
        }
    
    
    // Redirect to the main page after deletion
    header("Location: mod.php");
    exit();
} else {
    echo "ID not specified for deletion.";
}

mysqli_close($conn);
?>