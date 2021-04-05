<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('kriteria', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="row" style="color:#996433;">
                <div class="col-lg-6">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKriteriaModal">Add New Kriteria</a>
                </div>
                <div class="col-lg-6" align=right>
                    <h4>Keterangan:
                        <h4>Rentang bobot 1-100</h4>
                    </h4>

                </div>
            </div>



            <table class="table table-borderless table-hover" id="mydata">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Type</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php $i = 1; ?>
                    <?php foreach ($kriteria as $k) : ?>
                        <tr align=center>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['bobot']; ?></td>
                            <td><?= $k['type']; ?></td>
                            <td>
                                <a href="<?= base_url('ranking/editkriteria/') . $k['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('ranking/deletekriteria/') . $k['id']; ?>" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="newKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKriteriaModalLabel">Add New Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('ranking/kriteria') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kriteria">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria">
                    </div>
                    <div class="form-group">
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="max">Max</option>
                            <option value="min">Min</option>

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