<?php
require_once '../vendor/autoload.php';
include '../koneksi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!isset($_FILES['file'])) {
    echo "error: file tidak ada";
    exit;
}

try {
    $sheet = IOFactory::load($_FILES['file']['tmp_name'])->getActiveSheet();
    $rows  = $sheet->toArray(null, true, true, false);
} catch (Exception $e) {
    echo "error: gagal baca excel";
    exit;
}

$header = array_map('trim', array_shift($rows));

$map = array_flip($header);

$sukses = 0;

foreach($rows as $row){

    $kode   = $row[$map['Kode Penerimaan']] ?? '';
    if(!$kode) continue;

    $sub    = $row[$map['Sub Akun Penerimaan']] ?? '';
    $nama   = $row[$map['Nama']] ?? '';
    $harta  = $row[$map['Akun Harta']] ?? '';
    $pend   = $row[$map['Akun Pendapatan']] ?? '';
    $apbs   = $row[$map['Akun Pendapatan APBS']] ?? '';
    $ikat   = $row[$map['Pendapatan Terikat']] ?? '';
    $ket    = $row[$map['Keterangan']] ?? '';
    $status = $row[$map['Status']] ?? '';

    $sql = "INSERT INTO tb_penerimaan
            (kode_penerimaan,sub_akun,nama,akun_harta,akun_pendapatan,akun_apbs,terikat,keterangan,status)
            VALUES
            ('$kode','$sub','$nama','$harta','$pend','$apbs','$ikat','$ket','$status')
            ON DUPLICATE KEY UPDATE
            nama='$nama',
            sub_akun='$sub',
            akun_harta='$harta',
            akun_pendapatan='$pend',
            akun_apbs='$apbs',
            terikat='$ikat',
            keterangan='$ket',
            status='$status'";

    mysqli_query($koneksi,$sql);
    $sukses++;
}

echo "success: $sukses data masuk";