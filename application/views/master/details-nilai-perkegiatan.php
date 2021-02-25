<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <h2>Kegiatan: <?= $kegiatan['nama']; ?></h2>
                    <h2>Mitra: <?= $ID_mitra ?></h2>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="mydata">
                <thead>
                    <tr align=center>

                        <th scope="col">Kriteria</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody>


                    <?php $i = 1; ?>
                    <?php foreach ($kriteria as $k) : ?>
                        <tr align=center>
                            <td><?= $k['nama']; ?></td>
                            <td>
                                Dalam pengembangan
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->