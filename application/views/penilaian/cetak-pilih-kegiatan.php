<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>

                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">


                    <?php $i = 1; ?>
                    <?php foreach ($kegiatan as $k) : ?>
                        <tr align=center>
                            <td><?= $k['nama']; ?></td>
                            <td><?= date('d F Y', $k['start']); ?></td>
                            <td><?= date('d F Y', $k['finish']); ?></td>
                            <td>
                                <a href="<?= base_url('penilaian/pilihmitra/') . $k['id']; ?>" class="badge badge-primary">Pilih mitra</a>
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