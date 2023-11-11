<?php
set_time_limit(60);
// Obtenez la date actuelle au format Y-m-d (année-mois-jour)
$currentDate = date("d-m-y");

// Définissez le nom du fichier avec "pilotage_essorage" suivi de la date actuelle
$filename = "Pilotage_Sfaldina_" . $currentDate . ".xls";
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=" . $filename);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../Classes/PHPExcel.php';

include("db.php");

$filter1 = isset($_GET['filterInput']) ? $_GET['filterInput'] : '';
$filter2 = isset($_GET['filterColor']) ? $_GET['filterColor'] : '';
$filter3 = isset($_GET['filterArticle']) ? $_GET['filterArticle'] : '';
$filter4 = isset($_GET['filterEtat']) ? $_GET['filterEtat'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$Date = isset($_GET['Date']) ? $_GET['Date'] : '';

$query = "SELECT DISTINCT
 s.operateur,
 s.etat,
 s.dispo,
 s.sub,
 s.article,
 s.couleur,
 p.poids_dispo,
 p.poids_reel,
 p.metrage_dispo,
 p.date_heur_pesage,
 ROUND(IF(s.date_debut_sfaldina != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(s.date_debut_sfaldina) - UNIX_TIMESTAMP(p.date_heur_pesage)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(p.date_heur_pesage)) / 3600), 0) AS temps_attente,
 s.date_debut_sfaldina,
 s.date_fin_sfaldina,
 ROUND(IF(s.date_fin_sfaldina != '0000-00-00 00:00:00',
(UNIX_TIMESTAMP(s.date_fin_sfaldina) - UNIX_TIMESTAMP(s.date_fin_sfaldina)) / 3600,
(UNIX_TIMESTAMP(NOW() + INTERVAL 1 HOUR) - UNIX_TIMESTAMP(s.date_fin_sfaldina)) / 3600), 0) AS duree_heures,
 s.nb_chariots,
 s.num_chariot
FROM `sfaldina` s
LEFT JOIN `preparation` p ON s.dispo = p.dispo AND s.sub = p.sub
WHERE 1=1";






if (!empty($filter1)) {
    $query .= " AND s.dispo LIKE '%$filter1%'";
}
if (!empty($filter2)) {
    $query .= " AND s.couleur LIKE '%$filter2%'";
}
if (!empty($filter3)) {
    $query .= " AND s.article LIKE '%$filter3%'";
}
if (!empty($filter4)) {
    $query .= " AND s.etat LIKE '%$filter4%'";
}
if (!empty($Date)) {
    $query .= " AND s.date_fin_sfaldina LIKE '%$Date%'";
}
if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND s.date_fin_sfaldina BETWEEN '$startDate' AND '$endDate'";
}
$query .= " ORDER BY s.date_debut_sfaldina DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Erreur MySQL : ' . mysqli_error($conn));
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

$headers = array("Operateur", "Etat","Dispo", "Sub", "Article", "Couleur", "Poids Dispo", "Poids Reel", "Metrage Dispo", "Date Pesage","Temps d'Attente", "Date Debut Sfaldina",  "Date Fin Sfaldina","Durée", "Nombre Chariots", "Numero Chariot" );

for ($i = 0; $i < count($headers); $i++) {
    $sheet->setCellValueByColumnAndRow($i, 1, $headers[$i]);
    // Centrer les en-têtes
    $sheet->getStyleByColumnAndRow($i, 1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
}

$rowNumber = 2;
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $index => $value) {
        $columnIndex = array_search($index, array_keys($row));
        $sheet->setCellValueByColumnAndRow($columnIndex, $rowNumber, $value);
        // Centrer les données dans les cellules
        $sheet->getStyleByColumnAndRow($columnIndex, $rowNumber)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }
    $rowNumber++;
}

// Ajuster automatiquement la taille des colonnes
$columnIndex = 0;
foreach ($headers as $header) {
    $sheet->getColumnDimensionByColumn($columnIndex)->setAutoSize(true);
    $columnIndex++;
}

// Ajuster automatiquement la taille des lignes
$rowIndex = 1;
while ($rowIndex <= $rowNumber) {
    $sheet->getRowDimension($rowIndex)->setRowHeight(-1);
    $rowIndex++;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$filename = "exported_data.xls";
$objWriter->save('php://output');

mysqli_close($conn);
?>
