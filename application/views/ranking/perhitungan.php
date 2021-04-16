<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('hitung', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <h3 style="color: #996433;">Data awal</h3>
            <table class="table table-borderless table-hover">
                <thead style="background-color: #996433; color:#f9f2ec;">
                    <tr align=center>
                        <th>Mitra</th>

                        <?php foreach ($kriteria as $header) : ?>
                            <th>
                                <?= $header->nama; ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody style="background-color: #ecd8c6; color: #996433;">
                    <?php foreach ($id_mitra as $col1) : ?>
                        <tr align=center>
                            <td>
                                <?= $col1->nama_lengkap; ?>
                            </td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td>
                                    <?php foreach ($rekap as $r) : ?>
                                        <?php foreach ($r->nilai as $cell) : ?>

                                            <?php if ($row->id == $cell->kriteria_id && $col1->id_mitra == $cell->id_mitra) : ?>
                                                <?= $cell->nilai; ?>
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    <?php endforeach; ?>

                                </td>


                            <?php endforeach; ?>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->