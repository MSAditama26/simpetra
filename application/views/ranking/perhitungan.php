<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row" style="color: #996433;">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <h4>Normalisasi Bobot Kriteria</h4>
            <table class="table table-borderless table-hover">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Nama</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Normalisasi Bobot</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($norm_bobot as $nb) : ?>
                        <tr align=center>
                            <td><?= $nb['nama']; ?></td>
                            <td><?= $nb['bobot']; ?></td>
                            <td><?= number_format((int) $nb['bobot'] / (int) $sumbobot, 3, ",", "."); ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row" style="color: #996433;">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <h4>Tabel Utility</h4>
            <table class="table table-borderless table-hover">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Nama Mitra</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Normalisasi Bobot</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($norm_bobot as $nb) : ?>
                        <tr align=center>
                            <td><?= $nb['nama']; ?></td>
                            <td><?= $nb['bobot']; ?></td>
                            <td><?= number_format((int) $nb['bobot'] / (int) $sumbobot, 3, ",", "."); ?></td>
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