<?php
header('Content-Type: application/json');
include '../koneksi.php';

$data = [];
$no = 1;

$q = mysqli_query($koneksi,"SELECT * FROM tb_penerimaan");

while($r = mysqli_fetch_assoc($q)){
    $data[] = [
        'no'=>$no++,
        'kode_penerimaan'=>$r['kode_penerimaan'],
        'sub_akun'=>$r['sub_akun'],
        'nama'=>$r['nama'],
        'akun_harta'=>$r['akun_harta'],
        'akun_pendapatan'=>$r['akun_pendapatan'],
        'apbs'=>$r['akun_apbs'],
        'terikat'=>$r['terikat'],
        'keterangan'=>$r['keterangan'],
        'status'=>$r['status']
    ];
}

echo json_encode(['data'=>$data]);