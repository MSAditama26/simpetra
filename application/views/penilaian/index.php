<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6" style="color:#996433;">
                    <h2>Penilai: <?= $user['name']; ?></h2>
                </div>
            </div>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">


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
                                <a href="<?= base_url('penilaian/daftar_pencacah/') . $k['kegiatan_id']; ?>" class="badge badge-info">Lihat daftar pencacah</a>
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