<?php
// Declaramos la librería
require __DIR__ . "../../vendor/autoload.php";
require_once "../settings/conexion.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id = $_GET['c'];
$query = $pdo->query("SELECT * FROM computadora WHERE id_c = $id");
$data = $query->fetch(\PDO::FETCH_ASSOC);

$id_c = $data['usuario_id'];
$cons = $pdo->query("SELECT * FROM users WHERE id = $id_c");
$datau = $cons->fetch(\PDO::FETCH_ASSOC);

$ns = htmlspecialchars_decode($data['ns']); 
$id = htmlspecialchars_decode($data['id_c']);
$marca = htmlspecialchars_decode($data['marca']);
$modelo = htmlspecialchars_decode($data['modelo']);
$procesador = htmlspecialchars_decode($data['procesador']);
$ram = htmlspecialchars_decode($data['ram']);
$almacenamiento = htmlspecialchars_decode($data['almacenamiento']);
$usuario = htmlspecialchars_decode($datau['name']);

$spread = new Spreadsheet();
$spread
    ->getProperties()
    ->setCreator("??")
    ->setLastModifiedBy('??')
    ->setTitle('??')
    ->setSubject('??')
    ->setDescription('??')
    ->setKeywords('??')
    ->setCategory('??');
$activeWorksheet = $spread->getActiveSheet();

// Asignamos los valores de las celdas
$activeWorksheet->setCellValue('A1', 'ID Computadora:');
$activeWorksheet->setCellValue('B1', 'Numero de serie:');
$activeWorksheet->setCellValue('C1', 'Marca:');
$activeWorksheet->setCellValue('D1', 'Modelo:');
$activeWorksheet->setCellValue('E1', 'Procesador:');
$activeWorksheet->setCellValue('F1', 'RAM:');
$activeWorksheet->setCellValue('G1', 'Almacenamiento:');
$activeWorksheet->setCellValue('H1', 'Usuario:');

$activeWorksheet->setCellValue('A2', $id);
$activeWorksheet->setCellValue('B2', "$ns");
$activeWorksheet->setCellValue('C2', $marca);
$activeWorksheet->setCellValue('D2', $modelo);
$activeWorksheet->setCellValue('E2', $procesador);
$activeWorksheet->setCellValue('F2', $ram);
$activeWorksheet->setCellValue('G2', $almacenamiento);
$activeWorksheet->setCellValue('H2', $usuario);

$fileName = "$ns.xlsx";
# Crear un "escritor"
$writer = new Xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');

$writer->save('php://output');
?>