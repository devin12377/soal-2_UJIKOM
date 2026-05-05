<?php
header('Content-Type: application/json');

require_once 'db_connection.php'; 
require_once 'dokterrepository.php';

$bulan = $_GET['bulan'] ?? date('m');
$tahun = $_GET['tahun'] ?? date('Y');

$repository = new DokterRepository($pdo);

try {
    $data = $repository->getRekapKunjungan($bulan, $tahun);
    
    echo json_encode([
        'success' => true,
        'message' => "Data laporan bulan $bulan tahun $tahun",
        'data'    => $data
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error'   => $e->getMessage()
    ]);
}