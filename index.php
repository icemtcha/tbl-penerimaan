<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Penerimaan</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            background: #f5f6fa;
        }

        .panel-heading {
            background: #1F4E79 !important;
            color: #fff !important;
        }

        th {
            background: #1F4E79 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Data Penerimaan</div>
            <div class="panel-body">

                <button id="uploadPenerimaan" class="btn btn-success btn-sm">
                    Upload Penerimaan
                </button>

                <button id="downloadFormat" class="btn btn-info btn-sm">
                    Download Format
                </button>

                <br><br>

                <table id="tabel" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Sub Akun</th>
                            <th>Nama</th>
                            <th>Akun Harta</th>
                            <th>Akun Pendapatan</th>
                            <th>APBS</th>
                            <th>Terikat</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let table;

        $(document).ready(function() {

            loadData();

            function loadData() {
                if (table) table.destroy();

                table = $('#tabel').DataTable({
                    ajax: './function/get_data_penerimaan.php',
                    columns: [{
                            data: 'no'
                        },
                        {
                            data: 'kode_penerimaan'
                        },
                        {
                            data: 'sub_akun'
                        },
                        {
                            data: 'nama'
                        },
                        {
                            data: 'akun_harta'
                        },
                        {
                            data: 'akun_pendapatan'
                        },
                        {
                            data: 'apbs'
                        },
                        {
                            data: 'terikat'
                        },
                        {
                            data: 'keterangan'
                        },
                        {
                            data: 'status'
                        }
                    ]
                });
            }

            // 🔹 UPLOAD
            $('#uploadPenerimaan').click(function() {

                Swal.fire({
                    title: 'Upload Excel',
                    html: `<input type="file" id="file" accept=".xls,.xlsx">`,
                    showCancelButton: true,
                    confirmButtonText: 'Upload',
                    preConfirm: () => {
                        let file = document.getElementById('file').files[0];
                        if (!file) {
                            Swal.showValidationMessage('Pilih file dulu');
                        }
                        return file;
                    }
                }).then(res => {

                    if (res.isConfirmed) {

                        let fd = new FormData();
                        fd.append('file', res.value);

                        Swal.fire({
                            title: 'Uploading...',
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });

                        fetch('./function/upload_penerimaan.php', {
                                method: 'POST',
                                body: fd
                            })
                            .then(r => r.text())
                            .then(r => {
                                if (r.startsWith('success')) {
                                    Swal.fire('Berhasil', r.replace('success: ', ''), 'success')
                                        .then(() => loadData());
                                } else {
                                    Swal.fire('Gagal', r.replace('error: ', ''), 'error');
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error', 'Upload gagal', 'error');
                            });

                    }

                });

            });

            // 🔹 DOWNLOAD FORMAT
            $('#downloadFormat').click(function() {

                Swal.fire({
                    title: 'Download Format?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Download'
                }).then(res => {

                    if (res.isConfirmed) {

                        fetch('./function/dwn_format_penerimaan.php')
                            .then(res => res.blob())
                            .then(blob => {

                                let url = window.URL.createObjectURL(blob);
                                let a = document.createElement('a');

                                a.href = url;
                                a.download = 'Format Upload Penerimaan.xlsx';

                                document.body.appendChild(a);
                                a.click();
                                a.remove();

                                window.URL.revokeObjectURL(url);

                            })
                            .catch(() => {
                                Swal.fire('Error', 'Gagal download', 'error');
                            });

                    }

                });

            });

        });
    </script>

</body>

</html>