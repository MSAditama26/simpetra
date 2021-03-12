<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('survei', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSurveiModal">Add New Survei</a>

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
                            <td><?= date('d F Y', $s['start']); ?></td>
                            <td><?= date('d F Y', $s['finish']); ?></td>
                            <td><?= $s['k_pengawas']; ?></td>
                            <td><?= $s['k_pencacah']; ?></td>

                            <?php $now = (time()); ?>
                            <td>
                                <?php if ($now > $s['finish']) : ?>
                                    <a class="badge badge-secondary">tambah pengawas</a>
                                    <a class="badge badge-secondary">tambah pencacah</a>
                                <?php else : ?>
                                    <a href="<?= base_url('kegiatan/tambah_pengawas/') . $s['id']; ?>" class="badge badge-success">tambah pengawas</a>
                                    <a href="<?= base_url('kegiatan/tambah_pencacah/') . $s['id']; ?>" class="badge badge-info">tambah pencacah</a>
                                <?php endif; ?>
                                <a href="<?= base_url('kegiatan/editsurvei/') . $s['id']; ?>" class="badge badge-primary">edit</a>
                                <a href="<?= base_url('kegiatan/deletesurvei/') . $s['id']; ?>" class="badge badge-danger">delete</a>
                            </td>


                            <?php if ($now < $s['start']) : ?>
                                <td><a class="badge badge-warning">belum mulai</a></td>
                            <?php elseif ($now > $s['finish']) : ?>
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
<div class="modal fade" id="newSurveiModal" tabindex="-1" role="dialog" aria-labelledby="newSurveiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSurveiModalLabel">Add New Survei</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kegiatan/survei') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control datepicker" id="start" name="start" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control datepicker" id="finish" name="finish" placeholder="Tanggal Selesai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="k_pengawas" name="k_pengawas" placeholder="Kuota Pengawas">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="k_pencacah" name="k_pencacah" placeholder="Kuota Pencacah">
                    </div>
                    <div class="form-group">
                        <select name="seksi_id" id="seksi_id" class="form-control">
                            <option value="">Select Seksi</option>
                            <?php foreach ($seksi as $s) : ?>
                                <option value="<?= $s['id']; ?>">Seksi <?= $s['nama']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="ob" id="ob">
                            <label class="form-check-label" for="ob">
                                OB?
                            </label>
                        </div>
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