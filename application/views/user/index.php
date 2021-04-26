<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <?php if ($user['role_id'] == 5) : ?>

        <div class="card shadow" style="background-color: #ecd8c6; ">
            <div class=" row">
                <div class="col-lg-2 mb-2 mt-2" align=center>
                    <br>
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100" height="100">
                    <hr>
                    <p class="card-text"><small class="text-muted">User since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
                <div class="col-lg-5 mb-2 mt-2">
                    <table class="table table-borderless" style="background-color: #ecd8c6; color:#996433;">
                        <thead>
                            <tr align=center>

                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <th>ID Mitra</th>
                                <td><?= $mitra['id_mitra']; ?></td>
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

                <div class="col-lg-5 mb-2 mt-2">
                    <table class="table table-borderless" style="background-color: #ecd8c6; color:#996433;">
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
                                <th>Nilai</th>
                                <td><a href="<?= base_url('kegiatan/details_mitra_kegiatan/') . $mitra['id_mitra']; ?>" class="badge badge-primary">Pilih kegiatan</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php else : ?>
        <div class="card shadow col-lg-6" style="background-color: #ecd8c6; color:#996433;">
            <div class="row">
                <div class="col-lg-2 mt-2" align=center>
                    <hr>
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100" height="100">
                    <hr>

                </div>
                <div class="col-lg-10 mt-2">
                    <table class="table table-borderless" style="background-color: #ecd8c6; color:#996433;">
                        <thead>
                            <tr align=center>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td><?= $user['nama']; ?></td>
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