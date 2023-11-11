<?php
include("db.php");
session_start();
$loginOK = false;

if (isset($_POST['matricule']) && isset($_POST['pwd'])) {
    $matricule = $_POST['matricule'];
    $pwd = $_POST['pwd'];

    // Prepare and execute a SELECT statement using a prepared statement
    $stmt = $conn->prepare("SELECT * FROM compte WHERE matricule = :matricule");
    $stmt->bindParam(':matricule', $matricule);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data && $pwd === $data['pwd']) { // Basic string comparison for password
        $loginOK = true;
        if ($data['prev'] == 'administrateur') {
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Administrateur/index.php?phase=totale");
        } elseif ($data['prev'] == 'operateur-preparation') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Preparation/index.php");
        } elseif ($data['prev'] == 'controle-greggio') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Controle-Greggio/index.php");
        }		elseif ($data['prev'] == 'controle-preparation') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Controle-Preparation/creation.php");
        }elseif ($data['prev'] == 'chef-teinture') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Chef-Teinture/index.php");
        }elseif ($data['prev'] == 'controle-finissage') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Controle-Finissage/index.php");
        }elseif ($data['prev'] == 'operateur-sfaldina') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Sfaldina/index.php");
        } elseif ($data['prev'] == 'operateur-teinture') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Teinture/index.php");
        } elseif ($data['prev'] == 'operateur-essorage') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Essorage/index.php");
        } elseif ($data['prev'] == 'operateur-sechoire') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Sechoire/index.php");
        } elseif ($data['prev'] == 'operateur-rameuse') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Rameuse/index.php");
		} elseif ($data['prev'] == 'operateur-spazzolato') {
			$_SESSION['nom'] = $data['nom'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id_compte'] = $data['id_compte'];
            header("Location: Spazzolato/index.php");
        } else {
            // Additional processing for other roles
        }
    } else {
       header("Location: error.html"); // Redirect to an error page
    }
}


$conn = null; // Close the PDO connection
?>
