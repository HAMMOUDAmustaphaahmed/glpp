<?php
// Obtenez la date actuelle au format Y-m-d (année-mois-jour)
$currentDate = date("d-m-y");

// Définissez le nom du fichier avec "pilotage_essorage" suivi de la date actuelle
$filename = "Pilotage_greggio_" . $currentDate . ".xls";
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
article,
fournisseur,
lotfournisseur,
lotinterne,
facture,
datearrivage,
machine,
lfa1,
lfa2,
lfa3,
poids,
largeur,
dispo_test,
testteinture,
note,
date_control


FROM `greggio` s

WHERE 1=1";






if (!empty($filter1)) {
    $query .= " AND facture LIKE '%$filter1%'";
}
if (!empty($filter2)) {
    $query .= " AND lotfournisseur LIKE '%$filter2%'";
}
if (!empty($filter3)) {
    $query .= " AND article LIKE '%$filter3%'";
}
if (!empty($filter4)) {
    $query .= " AND fournisseur LIKE '%$filter4%'";
}
if (!empty($Date)) {
    $query .= " AND datearrivage LIKE '%$Date%'";
}
if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND datearrivage BETWEEN '$startDate' AND '$endDate'";
}
$query .= " ORDER BY datearrivage DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Erreur MySQL : ' . mysqli_error($conn));
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

$headers = array("Article", "Fournisseur","Lot Fournisseur", "Lot Interne","Facture", "Date Arrivage", "Machine", "LFA (1 fil)","LFA (2 fils)", "LFA (3 fils)", "Poids", "Largeur","Dispo Test", "Test Teinture",  "Note","Date Controle" );

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
