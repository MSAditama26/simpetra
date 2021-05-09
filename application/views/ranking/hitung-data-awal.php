<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
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

            <h3 style="color: #996433;">Tabel Data Awal</h3>
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead style="background-color: #996433; color:#f9f2ec;">
                        <tr align=center>
                            <th>Mitra</th>

                            <?php foreach ($kriteria as $header) : ?>
                                <th>
                                    <?= $header->nama; ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody style="background-color: #ecd8c6; color: #996433;">
                        <?php foreach ($id_mitra as $col1) : ?>
                            <tr align=center>
                                <td>
                                    <?= $col1->nama_lengkap; ?>
                                </td>
                                <?php foreach ($kriteria as $row) : ?>
                                    <td>
                                        <?php foreach ($rekap as $r) : ?>
                                            <?php foreach ($r->nilai as $cell) : ?>

                                                <?php if ($row->id == $cell->kriteria_id && $col1->id_mitra == $cell->id_mitra) : ?>
                                                    <?= $cell->nilai; ?>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        <?php endforeach; ?>

                                    </td>


                                <?php endforeach; ?>


                            </tr>
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