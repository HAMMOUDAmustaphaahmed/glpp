<?php




// Liste des premières variables
$premieresVariables = "01Y
04K
085
088
089
096
12N
38H
4CI
51H
54E
63E
72K
793
86A
900
904
94L
96G
979
B2Z
BR4
C73
CDI
CTQ
D56
EM5
EG9
GA2
I1X
I9W
J67
J68
J70
J74
L0X
NKH
P0V
P1V
P7X
"; // (Votre liste complète ici)

// Divisez les listes en tableaux

$premieresVariablesArray = explode("\n", $premieresVariables);

// Créez les lignes pour le fichier texte
$lines = "";
foreach ($premieresVariablesArray as $premiereVariable) {
    
        $line = "('$premiereVariable','standard' ),";
        $lines .= $line;
    
}

// Créez un nom de fichier unique
$filename = "output_" . date("Y-m-d_H-i-s") . ".txt";

// Enregistrez les lignes dans un fichier texte
file_put_contents($filename, $lines);

// Téléchargez le fichier texte
header("Content-disposition: attachment; filename=$filename");
header("Content-type: text/plain");
readfile($filename);

// Supprimez le fichier texte après téléchargement
unlink($filename);
?>
