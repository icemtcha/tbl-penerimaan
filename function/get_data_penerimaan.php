<?php
header('Content-Type: application/json');
include '../koneksi.php';

$data = [];
$no = 1;

$q = mysqli_query($koneksi,"SELECT * FROM tbl_jenis_penerimaan ORDER BY id ASC");

while($r = mysqli_fetch_assoc($q)){
    $data[] = [
        'no'=>$no++,
        'kode_penerimaan'=>$r['kd_penerimaan'],
        'sub_akun'=>$r['subakun_pendapatan'],
        'nama'=>$r['nama'],
        'akun_harta'=>$r['akun_harta'],
        'akun_pendapatan'=>$r['akun_pendapatan'],
        'apbs'=>$r['akun_pendapatan_apbs'],
        'terikat'=>$r['akun_pendapatan_terikat'],
        'keterangan'=>$r['keterangan'],
        'status'=>$r['status']
    ];
}

echo json_encode(['data'=>$data]);