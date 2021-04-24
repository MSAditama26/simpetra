<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="color:#996433;">
                <div class="col-lg-6">
                    <h2>Mitra: <?= $id_mitra['id_mitra']; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg">
                    <div id="chart_div"></div>
                </div>
            </div>

            <br>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Status</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">


                    <?php $i = 1; ?>
                    <?php foreach ($details as $d) : ?>
                        <tr align=center>
                            <td><?= $d['nama']; ?></td>
                            <td><?= date('d F Y', $d['start']); ?></td>
                            <td><?= date('d F Y', $d['finish']); ?></td>
                            <?php $now = (time()); ?>
                            <?php if ($now < $d['start']) : ?>
                                <td><a class="badge badge-warning">belum mulai</a></td>
                            <?php elseif ($now > $d['finish']) : ?>
                                <td><a class="badge badge-danger">selesai</a></td>
                            <?php else : ?>
                                <td><a class="badge badge-primary">sedang berjalan</a></td>
                            <?php endif; ?>
                            <td><a href="<?= base_url('kegiatan/details_nilai_perkegiatan/') . $id_mitra['id_mitra'] . '/' . $d['id'] ?>" class="badge badge-primary">Lihat nilai</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <br>
        </div>

    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gantt']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('string', 'Resource');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');

            <?php foreach ($details as $d) : ?>
                data.addRows([

                    ['<?= $d['nama'] ?>', '<?= $d['nama'] ?>', '<?= $d['jenis_kegiatan'] ?>',
                        new Date(<?= date('Y, n-1, j', $d['start']); ?>), new Date(<?= date('Y, n-1, j', $d['finish']); ?>), null, 0, null
                    ]

                ]);

            <?php endforeach; ?>


            var options = {
                gantt: {
                    trackHeight: 30
                }
            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->