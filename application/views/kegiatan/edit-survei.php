<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6" style="color:#996433;">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $survei['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start" class="col-sm-3 col-form-label">Start</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" id="start" name="start" value="<?= date('d F Y', $survei['start']); ?>">
                        <?= form_error('start', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="finish" class="col-sm-3 col-form-label">Finish</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" id="finish" name="finish" value="<?= date('d F Y', $survei['finish']); ?>">
                        <?= form_error('finish', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="k_pengawas" class="col-sm-3 col-form-label">Kuota Pengawas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="k_pengawas" name="k_pengawas" value="<?= $survei['k_pengawas']; ?>">
                        <?= form_error('k_pengawas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="k_pencacah" class="col-sm-3 col-form-label">Kuota Pencacah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="k_pencacah" name="k_pencacah" value="<?= $survei['k_pencacah']; ?>">
                        <?= form_error('k_pencacah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

            </form>
        </div>

    </div>



</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->