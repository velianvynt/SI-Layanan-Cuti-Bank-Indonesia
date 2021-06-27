<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cuti</title>
    <link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css"> -->
</head>

<body onload="javascript:window.print()">
    <div class="container">
        <table style="width: 100%;">
            <tr>
                <td>
                    <img src="assets/images/logo-BI.png" width="80px">
                </td>
                <td>
                    <h4 style="font-family:Arial, Helvetica, sans-serif">BANK INDONESIA PROVINSI BENGKULU</h4>
                    <!-- <p>Jl. Mawar No. 6 Nusa Indah, Bengkulu</p> -->
                </td>
            </tr>
        </table>

        <hr class="line-title" style="border: 1px solid black">

        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">DAFTAR CUTI</h4>
        <br>

        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th style="padding: 3px; text-align: center;">No</th>
                <th style="padding: 3px; text-align: center;">NIP</th>
                <th style="padding: 3px; text-align: center;">Nama</th>
                <th style="padding: 3px; text-align: center;">Jenis Cuti</th>
                <th style="padding: 3px; text-align: center;">Tanggal Mulai Cuti</th>
                <th style="padding: 3px; text-align: center;">Tanggal Akhir Cuti</th>
                <th style="padding: 3px; text-align: center;">Status</th>
            </tr>

            <?php $no = 1; ?>
            <?php foreach ($list as $h) : ?>
                <tr>
                    <td style="padding: 4px; text-align: center;"><?= $no++ ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['nip'] ?></td>
                    <td style="padding: 4px;"><?= $h['pgw_nama'] ?></td>
                    <td style="padding: 4px;"><?= $h['jenis_cuti'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['tanggal_mulai'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['tanggal_akhir'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table style="width: 100%;">
            <tr>
                <td>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding: 80px 0 50px 70%;">Bengkulu, <?= date('d M Y') ?></h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 77%;">Admin</h5>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>