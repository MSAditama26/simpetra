<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <h5>Mitra : <?= $mitra['nama_lengkap']; ?></h5>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#editDataMitraModal">Edit</a>
    <a href="<?= base_url('master/deletemitra/') . $mitra['id']; ?>" class="btn btn-danger mb-3">Delete</a>

    <div class="row">
        <div class="col-lg-6 mb-5">
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
                    <tr>
                        <th>No. Whatsapp</th>
                        <td><?= $mitra['no_wa']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-6 mb-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align=center>

                    </tr>
                </thead>
                <tbody>
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
                        <th>Status</th>
                        <?php if ($mitra['is_active'] == '1') : ?>
                            <td><i class="fas fa-check" style="color:yellowgreen" title="OK"></i>
                            </td>
                        <?php else : ?>
                            <td><i class="fas fa-times" style="color:red" title="Suspended"></i>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th>Total Nilai</th>
                        <td><?= $mitra['nilai']; ?></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>



</div>
<!-- End of Main Content -->