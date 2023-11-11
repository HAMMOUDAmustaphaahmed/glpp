<?php
set_time_limit(60);
// Obtenez la date actuelle au format Y-m-d (année-mois-jour)
$currentDate = date("d-m-y");

// Définissez le nom du fichier avec "pilotage_essorage" suivi de la date actuelle
$filename = "Pilotage_Preparation_" . $currentDate . ".xls";
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=" . $filename);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../Classes/PHPExcel.php';

include("db.php");

$filter1 = isset($_GET['filterInput']) ? $_GET['filterInput'] : '';
$filter2 = isset($_GET['filterColor']) ? $_GET['filterColor'] : '';
$filter3 = isset($_GET['filterArticle']) ? $_GET['filterArticle'] : '';
$filter4 = isset($_GET['filterFournisseur']) ? $_GET['filterFournisseur'] : '';
$filter5 = isset($_GET['filterCabb']) ? $_GET['filterCabb'] : '';
$filter6 = isset($_GET['filterTraitement']) ? $_GET['filterTraitement'] : '';
$filter7 = isset($_GET['filterGreggio']) ? $_GET['filterGreggio'] : '';
$filter8 = isset($_GET['filterNote']) ? $_GET['filterNote'] : '';
$filter9 = isset($_GET['filterSemaine']) ? $_GET['filterSemaine'] : '';


$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$Date = isset($_GET['Date']) ? $_GET['Date'] : '';

$query = "SELECT DISTINCT
operateur,
dispo,
sub,
article,
couleur,
fournisseur,
cabb,
type_traitement,
numero_lot,
poids_dispo,
poids_reel,
metrage_dispo,
poids_theorique,
date_heur_pesage,
semaine,
note,
groupe
FROM `preparation` s
WHERE 1=1";

if (!empty($filter1)) {
    $query .= " AND dispo LIKE '%$filter1%'";
}
if (!empty($filter2)) {
    $query .= " AND couleur LIKE '%$filter2%'";
}
if (!empty($filter3)) {
    $query .= " AND article LIKE '%$filter3%'";
}
if (!empty($filter4)) {
    $query .= " AND fournisseur LIKE '%$filter4%'";
}
if (!empty($filter5)) {
    $query .= " AND cabb LIKE '%$filter5%'";
}
if (!empty($filter6)) {
    $query .= " AND type_traimenet LIKE '%$filter6%'";
}
if (!empty($filter7)) {
    $query .= " AND numero_lot LIKE '%$filter7%'";
}
if (!empty($filter8)) {
    $query .= " AND note LIKE '%$filter8%'";
}
if (!empty($filter9)) {
    $query .= " AND semaine LIKE '%$filter9%'";
}
if (!empty($Date)) {
    $query .= " AND date_heur_pesage LIKE '%$Date%'";
}
if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND date_heur_pesage BETWEEN '$startDate' AND '$endDate'";
}
$query .= " ORDER BY date_heur_pesage DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Erreur MySQL : ' . mysqli_error($conn));
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

$headers = array("Operateur", "Dispo", "Sub", "Article", "Couleur", "fournisseur","cabb","type_traitement","numero_lot","Poids Dispo", "Poids Reel", "Metrage Dispo","poids_theorique", "Date Pesage","Semaine","Note", "Groupe" );

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
