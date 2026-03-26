<?php
require_once '../vendor/autoload.php';
include '../koneksi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!isset($_FILES['file'])) {
    echo "error: file tidak ditemukan";
    exit;
}

$sheet = IOFactory::load($_FILES['file']['tmp_name'])->getActiveSheet();
$rows  = $sheet->toArray(null, true, true, false);

// header excel (lowercase biar aman)
$header = array_map(fn($h)=>strtolower(trim($h)), array_shift($rows));
$map = array_flip($header);

$sukses = 0;
$gagal  = 0;

foreach($rows as $row){

    $kode = $row[$map['kode penerimaan']] ?? '';
    if(!$kode) continue;

    $sub   = $row[$map['sub akun penerimaan']] ?? '';
    $nama  = $row[$map['nama']] ?? '';
    $harta = $row[$map['akun harta']] ?? '';
    $pend  = $row[$map['akun pendapatan']] ?? '';
    $apbs  = $row[$map['akun pendapatan apbs']] ?? '';
    $ikat  = $row[$map['pendapatan terikat']] ?? '';
    $ket   = $row[$map['keterangan']] ?? '';
    $status= $row[$map['status']] ?? 'Aktif';

    $sql = "INSERT INTO tbl_jenis_penerimaan
    (kd_penerimaan, subakun_pendapatan, nama, akun_harta,
    akun_pendapatan, akun_pendapatan_apbs, akun_pendapatan_terikat,
    keterangan, status, date_created, date_modified)
    VALUES
    ('$kode','$sub','$nama','$harta','$pend','$apbs','$ikat',
    '$ket','$status',NOW(),NOW())
    ON DUPLICATE KEY UPDATE
    subakun_pendapatan='$sub',
    nama='$nama',
    akun_harta='$harta',
    akun_pendapatan='$pend',
    akun_pendapatan_apbs='$apbs',
    akun_pendapatan_terikat='$ikat',
    keterangan='$ket',
    status='$status',
    date_modified=NOW()";

    if(mysqli_query($koneksi,$sql)){
        $sukses++;
    } else {
        $gagal++;
    }
}

echo "success: $sukses data berhasil diproses";