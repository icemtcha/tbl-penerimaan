<?php
ob_start();

require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

$spreadsheet = new Spreadsheet();
$ws = $spreadsheet->getActiveSheet();
$ws->setTitle('Format Penerimaan');

$headers = [
    'No',
    'Kode Penerimaan',
    'Sub Akun Penerimaan',
    'Nama',
    'Akun Harta',
    'Akun Pendapatan',
    'Akun Pendapatan APBS',
    'Pendapatan Terikat',
    'Keterangan',
    'Status'
];

$colWidths = [6,20,22,30,18,20,22,22,25,12];
$cols = range('A','J');

foreach ($headers as $i => $h) {
    $col = $cols[$i];
    $ws->setCellValue($col.'1', $h);
    $ws->getColumnDimension($col)->setWidth($colWidths[$i]);

    $ws->getStyle($col.'1')->applyFromArray([
        'font'=>[
            'bold'=>true,
            'color'=>['rgb'=>'FFFFFF'],
            'name'=>'Arial',
            'size'=>10
        ],
        'fill'=>[
            'fillType'=>Fill::FILL_SOLID,
            'startColor'=>['rgb'=>'1F4E79']
        ],
        'alignment'=>[
            'horizontal'=>Alignment::HORIZONTAL_CENTER,
            'vertical'=>Alignment::VERTICAL_CENTER
        ],
        'borders'=>[
            'allBorders'=>[
                'borderStyle'=>Border::BORDER_THIN,
                'color'=>['rgb'=>'AAAAAA']
            ]
        ]
    ]);
}

$ws->getRowDimension(1)->setRowHeight(22);

for ($row=2;$row<=11;$row++) {
    foreach ($cols as $col) {

        $ws->setCellValue($col.$row,'');

        $style=[
            'font'=>['name'=>'Arial','size'=>10],
            'borders'=>[
                'allBorders'=>[
                    'borderStyle'=>Border::BORDER_THIN,
                    'color'=>['rgb'=>'AAAAAA']
                ]
            ]
        ];

        if($row%2==0){
            $style['fill']=[
                'fillType'=>Fill::FILL_SOLID,
                'startColor'=>['rgb'=>'EBF3FB']
            ];
        }

        $ws->getStyle($col.$row)->applyFromArray($style);
    }
}

if (ob_get_length()) {
    ob_end_clean();
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Format_Upload_Penerimaan.xlsx"');
header('Cache-Control: no-cache');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;