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

                            <?php if ($nilai == NULL) : ?>
                                <td>0</td>
                            <?php else : ?>
                                <td><?= (int) $nilai['nilai'] ?></td>
                            <?php endif; ?>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    <?php else : ?>
        <div class="card col-lg-6">
            <div class="row">
                <div class="col-lg-2 mt-2" align=center>
                    <hr>
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100" height="100">
                    <hr>

                </div>
                <div class="col-lg-10 mt-2">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr align=center>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Since</th>
                                <td><?= date('d F Y', $user['date_created']); ?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    <?php endif; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->