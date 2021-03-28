<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="color:#996433;">
                <div class="col-lg-6">
                    <h4>Kegiatan: <?= $kegiatan['nama']; ?></h4>
                    <h4>Pencacah: <?= $pencacah ?></h4>
                </div>
                <div class="col-lg-6" align=right>
                    <h4>Keterangan
                        <h6>1 : Sangat buruk</h6>
                        <h6>5 : Sangat baik</h6>
                    </h4>

                </div>
            </div>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Kriteria</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">


                    <?php $i = 1; ?>
                    <?php foreach ($kriteria as $k) : ?>
                        <tr align=center>
                            <td><?= $k['nama']; ?></td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-nilai-input" type="checkbox" <?php $value = 1; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">&nbsp;&nbsp;1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-nilai-input" type="checkbox" <?php $value = 2; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">&nbsp;&nbsp;2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-nilai-input" type="checkbox" <?php $value = 3; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">&nbsp;&nbsp;3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-nilai-input" type="checkbox" <?php $value = 4; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">&nbsp;&nbsp;4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-nilai-input" type="checkbox" <?php $value = 5; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">&nbsp;&nbsp;5</label>
                                </div>
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