<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('penilaian', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th scope="col">#</th>
                        <th scope="col">ID Mitra</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($mitra as $m) : ?>
                        <tr align=center>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['id_mitra']; ?></td>
                            <td><?= $m['nama_lengkap']; ?></td>
                            <td>
                                <a href="<?= base_url('penilaian/arsip_pilihkegiatan/') . $m['id_mitra']; ?>" class="badge badge-primary">Pilih kegiatan</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->