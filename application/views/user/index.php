<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <?php if ($user['role_id'] == 5) : ?>

        <div class="row">
            <div class="col-lg-2 mb-5" align=center>
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100" height="100">
                <hr>
                <p class="card-text"><small class="text-muted">User since <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
            <div class="col-lg-5 mb-5">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align=center>

                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <th>ID Mitra</th>
                            <td><?= $mitra['ID_mitra']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $mitra['nama_lengkap']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Panggilan</th>
                            <td><?= $mitra['nama_panggilan']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $mitra['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $mitra['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td><?= $mitra['no_hp']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-lg-5 mb-5">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align=center>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>No. Whatsapp</th>
                            <td><?= $mitra['no_wa']; ?></td>
                        </tr>
                        <tr>
                            <th>No. Telkomsel</th>
                            <td><?= $mitra['no_tsel']; ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Utama</th>
                            <td><?= $mitra['pekerjaan_utama']; ?></td>
                        </tr>
                        <tr>
                            <th>Kompetensi</th>
                            <td><?= $mitra['kompetensi']; ?></td>
                        </tr>
                        <tr>
                            <th>Bahasa</th>
                            <td><?= $mitra['bahasa']; ?></td>
                        </tr>
                        <tr>
                            <th>Rata-rata Nilai</th>
                            <td><?= $mitra['nilai']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    <?php else : ?>


        <div class="card mb-3 col-lg-6">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100" height="100">
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">User since
                                <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->