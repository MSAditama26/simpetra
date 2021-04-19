<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('hitung', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="row" align=center style="color:#996433;">
                <div class="col-sm">
                    <a href="<?= base_url('ranking/data_awal/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Data Awal</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/utility/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Utility</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/nilai_akhir/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Nilai Akhir</a>
                </div>
            </div>
            <hr>

            <h3 style="color: #996433;">Tabel Nilai Akhir</h3>
            <table class="table table-borderless table-hover">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th>Ranking</th>
                        <th>Mitra</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($id_mitra as $col) : ?>
                        <tr align=center>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $col->nama_lengkap; ?>
                            </td>
                            <td>
                                <?= number_format($col->bobot, 4); ?>
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