<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>

            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMitraModal">Add New Mitra</a>

            <table class="table table-bordered table-striped" id="mydata">
                <thead>
                    <tr align=center>
                        <th scope="col">#</th>
                        <th scope="col">ID Mitra</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon/HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

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
                <h5 class="modal-title" id="newMitraModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/mitra') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
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