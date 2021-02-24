<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <h2>Kegiatan: <?= $kegiatan['nama']; ?></h2>
                    <h2>Pencacah: <?= $pencacah ?></h2>
                </div>
                <div class="col-lg-6">
                    <h3>Keterangan:
                        <h5>1 : Sangat buruk</h5>
                        <h5>5 : Sangat baik</h5>
                    </h3>

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
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" <?php $value = 1; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" <?php $value = 2; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" <?php $value = 3; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" <?php $value = 4; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" <?php $value = 5; ?> <?= check_nilai($pengawas, $kegiatan['id'], $pencacah, $k['id'], $value); ?> data-pengawas="<?= $pengawas; ?>" data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $pencacah; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                    <label class="form-check-label">5</label>
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