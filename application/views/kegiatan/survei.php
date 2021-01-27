<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('mitra', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMitraModal">Add New Survei</a>

            <table class="table table-bordered table-striped" id="mydata">
                <thead>
                    <tr align=center>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Kuota Pengawas</th>
                        <th scope="col">Kuota Pencacah</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($survei as $s) : ?>
                        <tr align=center>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['start']; ?></td>
                            <td><?= $s['finish']; ?></td>
                            <td><?= $s['k_pengawas']; ?></td>
                            <td><?= $s['k_pencacah']; ?></td>
                            <td>

                                <a href="<?= base_url('kegiatan/tambahpengawas/') . $s['id']; ?>" class="badge badge-success">tambah pengawas</a>
                                <a href="<?= base_url('kegiatan/tambahpencacah/') . $s['id']; ?>" class="badge badge-info">tambah pencacah</a>
                                <a href="" class="badge badge-primary">edit</a>
                                <a href="<?= base_url('kegiatan/deletesensus/') . $s['id']; ?>" class="badge badge-danger">delete</a>
                            </td>

                            <?php $now = (time()); ?>
                            <?php if ($now < strtotime($s['start'])) : ?>
                                <td><a class="badge badge-warning">belum mulai</a></td>
                            <?php elseif ($now > strtotime($s['finish'])) : ?>
                                <td><a class="badge badge-danger">selesai</a></td>
                            <?php else : ?>
                                <td><a class="badge badge-primary">sedang berjalan</a></td>
                            <?php endif; ?>
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


<!-- Modal -->
<div class="modal fade" id="newMitraModal" tabindex="-1" role="dialog" aria-labelledby="newMitraModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMitraModalLabel">Add New Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/mitra') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ID_mitra" name="ID_mitra" placeholder="ID Mitra">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="No. Whatsapp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_tsel" name="no_tsel" placeholder="No. Telkomsel">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan_utama" name="pekerjaan_utama" placeholder="Pekerjaan Utama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kompetensi" name="kompetensi" placeholder="Kompetensi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bahasa" name="bahasa" placeholder="Bahasa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>