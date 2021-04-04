<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="color:#996433;">
                <div class="col-lg-6">
                    <h4>Kegiatan: <?= $kegiatan['nama'] ?></h4>
                    <h4>Pencacah: <?= $mitra['nama_lengkap'] ?></h4>
                </div>
                <div class="col-lg-6" align=right>
                    <h4>Keterangan
                        <h6>1 : Sangat buruk</h6>
                        <h6>5 : Sangat baik</h6>
                    </h4>

                </div>
            </div>

            <table class="table table-borderless table-hover">
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
                                <?php for ($i = 1; $i < 6; $i++) : ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-nilai-input" type="checkbox" <?php $value = $i; ?> <?= check_nilai($kegiatan['id'], $mitra['id_mitra'], $k['id'], $value); ?> data-kegiatan_id="<?= $kegiatan['id']; ?>" data-id_mitra="<?= $mitra['id_mitra']; ?>" data-kriteria="<?= $k['id']; ?>" data-nilai="<?= $value; ?>">
                                        <label class="form-check-label">&nbsp;&nbsp;<?= $i ?></label>
                                    </div>
                                <?php endfor; ?>
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