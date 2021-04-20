<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="row" style="color:#996433;">
                <div class="col-lg-3">
                    <h2><?= $kegiatan['nama']; ?></h2>
                </div>
                <div class="col-lg-3">
                    <a href="<?= base_url('kegiatan/tambah_pencacah/') . $kegiatan['id'] ?>" class="btn btn-info">Tambah Pencacah</a>
                </div>
                <div class="col-lg-3">
                    <h2>Jumlah = <?= $kuota['kegiatan_id']; ?> / <?= $kegiatan['k_pencacah']; ?></h2>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('tambah-pencacah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div>


                <form method="post" action="">
                    <table class="table table-borderless table-hover" id="mydata">
                        <thead style="background-color: #996433; color:#f9f2ec;">
                            <tr align=center>
                                <th scope="col">#</th>
                                <th scope="col">ID Mitra</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #ecd8c6; color: #996433;">
                            <?php $i = 1; ?>
                            <?php foreach ($pencacah as $p) : ?>
                                <tr align=center>
                                    <td><?= $i; ?></td>
                                    <td><?= $p['id_mitra']; ?></td>
                                    <td><?= $p['nama_lengkap']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->