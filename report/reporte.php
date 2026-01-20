<?php
// Declaramos la librería
require __DIR__ . "../../vendor/autoload.php";
require_once "../settings/conexion.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id = $_GET['c'];
$query = $pdo->query("SELECT * FROM computadora WHERE id_c = $id");
$data = $query->fetch(\PDO::FETCH_ASSOC);
$disp = $data['ns'];

$spread = new Spreadsheet();
$spread
->getProperties()
->setCreator("Miguel")
->setLastModifiedBy('BaulPHP')
->setTitle('Excel creado con PhpSpreadSheet')
->setSubject('Excel de prueba')
->setDescription('Excel generado como demostración')
->setKeywords('PHPSpreadsheet')
->setCategory('Categoría Excel');

$fileName="$disp.xlsx";
# Crear un "escritor"
$writer = new Xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');

$writer->save('php://output');
?>