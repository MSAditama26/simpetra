<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('mitra', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Add New User</a>

            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($alluser as $as) : ?>
                        <tr align=center>
                            <td><?= $as['name']; ?></td>
                            <td><?= $as['email']; ?></td>
                            <td><?= $as['role']; ?></td>
                            <?php if ($as['is_active'] == '1') : ?>
                                <td><i class="fas fa-check" style="color:yellowgreen" title="Active"></i>
                                </td>
                            <?php else : ?>
                                <td><i class="fas fa-times" style="color:red" title="Nonactive"></i>
                                </td>
                            <?php endif; ?>
                            <td><?= date('d F Y', $as['date_created']); ?></td>
                            <td>
                                <?php if ($as['is_active'] == '1') : ?>
                                    <a href="<?= base_url('admin/deactivated/') . $as['id']; ?>" class="badge badge-danger">deactivated?</a>
                                <?php else : ?>
                                    <a href="<?= base_url('admin/activated/') . $as['id']; ?>" class="badge badge-success">activated?</a>
                                <?php endif; ?>
                                <a> | </a>
                                <a href=" <?= base_url('admin/deleteuser/') . $as['id']; ?>" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/alluser') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Role</option>
                            <?php foreach ($role as $r) : ?>
                                <?php if ($r['id'] < 5) : ?>
                                    <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="seksi_id" id="seksi_id" class="form-control">
                            <option value="">Select Seksi</option>
                            <?php foreach ($seksi as $s) : ?>
                                <?php if ($s['id'] < 5) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
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