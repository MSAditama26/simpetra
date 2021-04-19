<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $kegiatan['nama']; ?>-<?= $mitra['nama_lengkap']; ?>-Laporan Penilaian Kinerja</title>
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

        /* .container {
            width: 50%;
            margin: auto;
        } */
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">

        <h2 align="center">Laporan Penilaian Kinerja Mitra</h2>
        <h3 align="left">Kegiatan : <?= $kegiatan['nama']; ?> <br> Nama : <?= $mitra['nama_lengkap']; ?></h3>



        <div style="width:50%; margin:auto;">
            <canvas id="myChart" width="200" height="200"></canvas>
        </div>

        <br>


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
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['konversi']; ?></td>
                    </tr>
                    <?php $i++; ?>

                <?php endforeach; ?>

            </tbody>

        </table>



        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: [
                        <?php
                        if (count($penilaian) > 0) {
                            foreach ($penilaian as $data) {
                                echo "'" . $data['nama'] . "',";
                            }
                        }
                        ?>
                    ],
                    datasets: [{
                        label: 'Kinerja Mitra',
                        data: [<?php
                                if (count($penilaian) > 0) {
                                    foreach ($penilaian as $data) {

                                        echo $data['konversi'] . ", ";
                                    }
                                }
                                ?>],
                        fill: true,
                        backgroundColor: 'rgba(179, 209, 255, 0.4)',
                        borderColor: 'rgb(0, 102, 255)',
                        pointBackgroundColor: 'rgb(0, 102, 255)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }]
                },
                options: {
                    elements: {
                        line: {
                            borderWidth: 3
                        }
                    },
                    scales: {
                        r: {
                            ticks: {
                                display: false,
                                maxTicksLimit: 5,
                            },
                            angleLines: {
                                display: false
                            },
                            min: 50,
                            max: 90
                        }
                    }

                },
            });
        </script>

    </section>
</body>

</html>

<script>
    window.print();
</script>