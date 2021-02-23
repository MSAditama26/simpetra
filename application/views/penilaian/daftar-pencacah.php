<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <h1>Kegiatan: <?= $nama_kegiatan['nama']; ?></h1>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="mydata">
                <thead>
                    <tr align=center>

                        <th scope="col">ID Mitra</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php $i = 1; ?>
                    <?php foreach ($kegiatan as $k) : ?>
                        <tr align=center>
                            <td><?= $k['ID_mitra']; ?></td>
                            <td><?= $k['nama_lengkap']; ?></td>
                            <td>
                                <a href="<?= base_url('penilaian/isi_nilai/') . $pengawas . '/' . $k['kegiatan_id'] . '/' . $k['ID_mitra']; ?>" class="badge badge-primary">Isi nilai</a>
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