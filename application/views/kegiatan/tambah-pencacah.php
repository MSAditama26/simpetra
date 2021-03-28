<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('tambah-pencacah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div>
                <div class="row" style="color:#996433;">
                    <div class="col-lg-6">
                        <h2><?= $kegiatan['nama']; ?></h2>
                    </div>
                    <div class="col-lg-6" align=right>
                        <h2>Alokasi = <?= $kuota['kegiatan_id']; ?> / <?= $kegiatan['k_pencacah']; ?></h2>
                    </div>

                </div>

                <form method="post" action="">
                    <table class="table table-borderless table-hover" id="mydata">
                        <thead style="background-color: #996433; color:#f9f2ec;">
                            <tr align=center>
                                <th scope="col">#</th>
                                <th scope="col">ID Mitra</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kompetensi</th>
                                <th scope="col">Rata-rata Nilai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #ecd8c6; color: #996433;">
                            <?php $i = 1; ?>
                            <?php foreach ($pencacah as $p) : ?>
                                <tr align=center>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-pencacah-input" type="checkbox" <?= check_pencacah($kegiatan['id'], $p['ID_mitra']); ?> data-kegiatan="<?= $kegiatan['id']; ?>" data-pencacah="<?= $p['ID_mitra']; ?>">
                                        </div>
                                    </td>
                                    <td><?= $p['ID_mitra']; ?></td>
                                    <td><?= $p['nama_lengkap']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['kompetensi']; ?></td>
                                    <td> Dalam pengembangan </td>

                                    <td>
                                        <a href="<?= base_url('kegiatan/details_kegiatan_mitra/') . $p['ID_mitra']; ?>" class="badge badge-primary">details kegiatan yang diikuti</a>
                                    </td>

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