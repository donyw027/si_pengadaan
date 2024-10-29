<!DOCTYPE html>
<html lang="en">

<!--  -->

<head>
    <meta charset="UTF-8">
    <title>Data Permintaan Pengadaan</title>
    <link rel="icon" href="xto.ico">
    <style>
        @media print {

            body {


                -webkit-print-color-adjust: exact;
            }
        }

        body {
            font-family: Arial, sans-serif;

        }

        .header {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
        }

        .title {
            margin-left: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body style="font-size: 10pt;">
    <!-- Header dengan Logo -->
    <div class="header">
        <img src="<?= base_url('assets/img/xto.png'); ?>" width="100px" height="100px" alt="">
        <div class="title">
            <h2>Data Permintaan Pengadaan</h2>
            <h3>Yayasan Diannanda</h3>
            <p>Request ID: <?= $request->request_id; ?></p>
        </div>
    </div>
    <hr>

    <!-- Tabel Data Pengadaan -->
    <h3>Detail Data Pengadaan</h3>
    <table class="table">
        <tr>
            <th>Tanggal Pengajuan Unit</th>
            <td> <?= $request->tgl_pengajuan; ?></td>
        </tr>
        <tr>
            <th>Diajukan Oleh</th>
            <td> <?= $request->user_request; ?></td>
        </tr>
        <tr>
            <th>Tanggal Pengadaan</th>
            <td> <?= $pengadaan->tgl_pengadaan; ?></td>
        </tr>
        <tr>
            <th>Status Pengadaan</th>
            <td> <?= $pengadaan->status_pengadaan; ?></td>
        </tr>
        <tr>
            <th>Unit</th>
            <td> <?= $request->unit; ?></td>
        </tr>

        <tr>
            <th>Total Estimasi Harga</th>
            <td> Rp. <?= number_format($request->total_estimasi_harga, 0, ',', '.') ?></td>
        </tr>
    </table>

    <!-- Tabel Item Request -->
    <h3>Item yang Diajukan</h3>
    <table class="table">
        <thead>
            <tr style="background-color: bisque;">
                <th style="width: 50px;">Kategori</th>
                <th>Nama Item</th>
                <!-- <th>Spesifikasi</th> -->
                <th style="width: 30px;">qty</th>
                <th style="width: 140px;">Estimasi Harga</th>
                <th style="width: 140px;">Sub Estimasi Harga</th>
                <!-- <th>Alasan Permintaan</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($request_item as $item) : ?>
                <tr>
                    <td><?= $item->kategori ?></td>
                    <td><?= $item->nama_item ?></td>
                    <!-- <td><?= $item->spesifikasi ?></td> -->
                    <td><?= $item->qty ?></td>
                    <td>Rp. <?= number_format($item->estimasi_harga, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($item->sub_estimasi_harga, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Log</h3>
    <table class="table">
        <thead>
            <tr style="background-color: bisque;">
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action By</th>
                <!-- <th>Alasan Permintaan</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($decision_log as $item) : ?>
                <tr>
                    <td><?= $item->tgl ?></td>
                    <td>
                        <?php
                        if ($item->status == 'Pending Yayasan') { ?>
                            Approve Pengajuan TU
                        <?php } elseif ($item->status == 'ACC Yayasan') { ?>
                            Approve Yayasan
                        <?php } else { ?>
                            Konfirmasi Penerimaan
                        <?php } ?>
                    </td>

                    <td><?= $item->nama_user ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>

    <br>
    <table>
        <tr>
            <td style="width: 650px;"></td>
            <td>TTD.
                <br><br><br><br><br><br><br><br>
                ______________________
            </td>
        </tr>
    </table>
</body>

</html>
<script>
    window.print();
</script>