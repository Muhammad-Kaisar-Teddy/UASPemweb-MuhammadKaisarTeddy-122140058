<?php
include 'Koneksi.php';
include 'MatakuliahController.php';

$controller = new MatakuliahController();

// Tambah data
$controller->addMatakuliah('MK001', 'Pemrograman Web', 'Dr. Budi Santoso');

// Baca data
$matakuliah = $controller->getMatakuliah();
foreach ($matakuliah as $mk) {
    echo "Kode: " . $mk['kode'] . " - Nama MK: " . $mk['namamk'] . " - Pengampu: " . $mk['pengampu'] . "<br>";
}

// Update data
$controller->updateMatakuliah('MK001', 'Pemrograman Web Lanjutan', 'Dr. Andi Subakti');

// Hapus data
$controller->deleteMatakuliah('MK001');
?>