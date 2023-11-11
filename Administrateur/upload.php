<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Vérifiez s'il y a une erreur lors du téléchargement
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Chemin de destination où vous souhaitez enregistrer le fichier
            $destination = 'F:\Movamp\mnt\var\www\CQMP\Administrateur' . $file['name'];

            // Déplacez le fichier téléchargé vers le chemin de destination
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo 'Fichier téléchargé avec succès.';
            } else {
                echo 'Erreur lors du déplacement du fichier.';
            }
        } else {
            echo 'Erreur lors du téléchargement du fichier.';
        }
    }
}
?>
