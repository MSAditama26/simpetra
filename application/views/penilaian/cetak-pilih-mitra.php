<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('penilaian', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="color:#996433;">
                <div class="col-lg-6">
                    <h2>Kegiatan: <?= $kegiatan['nama']; ?></h2>
                </div>
            </div>

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
                                <a href="<?= base_url('penilaian/download/') . $kegiatan['id'] . '/' . $m['id_mitra'] ?>" class="fa fa-fw fa-download text-success" target="_blank"></a><span> </span><a href="<?= base_url('penilaian/download/') . $kegiatan['id'] . '/' . $m['id_mitra'] ?>" class="badge badge-success" target="_blank"> Download hasil penilaian</a>
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