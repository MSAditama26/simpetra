<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('Pegawai', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPegawaiModal">Add New Pegawai</a>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Unit Kerja</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($pegawai as $p) : ?>
                        <tr align=center>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nip']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['email']; ?></td>
                            <td><?= $p['jabatan']; ?></td>
                            <td><?= $p['unit_kerja']; ?></td>
                            <td>
                                <a href="<?= base_url('master/deletepegawai/') . $p['nip']; ?>" class="badge badge-danger">delete</a>
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


<!-- Modal -->
<div class="modal fade" id="newPegawaiModal" tabindex="-1" role="dialog" aria-labelledby="newPegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPegawaiModalLabel">Add New Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/pegawai') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="Unit Kerja">
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