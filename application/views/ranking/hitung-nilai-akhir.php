<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('hitung', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="row" align=center style="color:#00264d;">
                <div class="col-sm">
                    <a href="<?= base_url('ranking/data_awal/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Data Awal</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/normalized/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Normalisasi</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/utility/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Utility</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/total/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Nilai Akhir</a>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('ranking/nilai_akhir/') . $kegiatan_id ?>" class="btn btn-primary">Tabel Ranking</a>
                </div>
            </div>
            <hr>

            <h3 style="color: #00264d;">Tabel Ranking</h3>
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead style="background-color: #00264d; color:#e6e6e6;">
                        <tr align=center>
                            <th>Ranking</th>
                            <th>Mitra</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #ffffff; color: #00264d;">
                        <?php $i = 1; ?>
                        <?php foreach ($id_mitra as $col) : ?>
                            <tr align=center>
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $col->nama_lengkap; ?>
                                </td>
                                <?php $temp = 0; ?>
                                <?php foreach ($rekap as $r) : ?>
                                    <?php foreach ($r->bobot as $cell) : ?>

                                        <?php if ($col->id_mitra == $cell->id_mitra) : ?>
                                            <?php $temp = $temp + number_format($cell->ut, 4); ?>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <?php $temp++; ?>
                                <td>
                                    <?= $temp - 1; ?>
                                </td>


                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <br>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->