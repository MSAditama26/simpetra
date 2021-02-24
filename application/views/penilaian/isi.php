<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <h1>Penilai: <?= $user['name']; ?></h1>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="mydata">
                <thead>
                    <tr align=center>

                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php $i = 1; ?>
                    <?php foreach ($kegiatan as $k) : ?>
                        <tr align=center>
                            <td><?= $k['nama']; ?></td>
                            <td><?= date('d F Y', $k['start']); ?></td>
                            <td><?= date('d F Y', $k['finish']); ?></td>
                            <?php $now = (time()); ?>
                            <?php if ($now < $k['start']) : ?>
                                <td><a class="badge badge-warning">belum mulai</a></td>
                            <?php elseif ($now > $k['finish']) : ?>
                                <td><a class="badge badge-danger">selesai</a></td>
                            <?php else : ?>
                                <td><a class="badge badge-primary">sedang berjalan</a></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?= base_url('penilaian/daftar_pencacah/') . $pengawas . '/' . $k['kegiatan_id']; ?>" class="badge badge-info">Lihat daftar pencacah</a>
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