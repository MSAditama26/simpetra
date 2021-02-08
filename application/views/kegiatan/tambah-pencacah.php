<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= form_error('tambah-pencacah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <h1><?= $kegiatan['nama']; ?></h1>
                </div>
                <div class="col-lg-6" align=right>
                    <button type="button" id="btn-tambah" class="btn btn-primary">Tambah</button>
                </div>
            </div>

            <form method="post" action="" id="form-tambah_pencacah">
                <table class="table table-bordered table-striped" id="mydata">
                    <thead>
                        <tr align=center>
                            <th>#</th>
                            <th scope="col">ID Mitra</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kompetensi</th>
                            <th scope="col">Rata-rata Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!empty($pencacah)) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($pencacah as $p) : ?>
                                <tr align=center>
                                    <td><input type='checkbox' class='check-item' name='ID_mitra[]' value='".$p->ID_mitra."'></td>
                                    <td><?= $p['ID_mitra']; ?></td>
                                    <td><?= $p['nama_lengkap']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['kompetensi']; ?></td>
                                    <td><?= (int) $p['nilai']; ?></td>

                                    <td>
                                        <a href="<?= base_url('kegiatan/details_kegiatan_mitra/') . $p['ID_mitra']; ?>" class="badge badge-primary">details survei yang sedang diikuti</a>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

            </form>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-all").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"


        });
        $("#btn-tambah").click(function() { // Ketika user mengklik tombol delete
            var confirm = window.confirm("Apakah Anda yakin ingin menambah data-data ini?"); // Buat sebuah alert konfirmasi

            if (confirm) // Jika user mengklik tombol "Ok"
                $("#form-tambah_pencacah").submit(); // Submit form
        });

    });
</script>