<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Penilaian Kinerja Mitra-<?= $kegiatan['nama']; ?>-<?= $mitra['nama_lengkap']; ?></title>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" rel="nofollow">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </>
    <style>
        @page {
            size: A4
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">



        <h2 align="center">Laporan Penilaian Kinerja Mitra</h2>
        <h3 align="left">Kegiatan : <?= $kegiatan['nama']; ?> <br> Nama : <?= $mitra['nama_lengkap']; ?></h3>

        <table class="table">
            <thead>
                <tr>

                    <th>No.</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($penilaian as $p) : ?>
                    <tr align=center>
                        <td><?= $i ?></td>
                        <td><?= $p['kriterianama']; ?></td>
                        <td>
                            <?php if ($p['nilai'] == '1') : ?>
                                50
                            <?php elseif ($p['nilai'] == '2') : ?>
                                60
                            <?php elseif ($p['nilai'] == '3') :  ?>
                                70
                            <?php elseif ($p['nilai'] == '4') : ?>
                                80
                            <?php else : ?>
                                90
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $i++; ?>

                <?php endforeach; ?>

            </tbody>

        </table>

</body>

</html>



<script>
    window.print();
</script>