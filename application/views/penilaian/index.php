<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <!-- statustic-card start -->
        <div class="col-12">
            <div class="card bg-c-white">
                <div class="row card-header">
                    <div class="col">
                        <h5>Pilih Survei</h5>
                    </div>
                    <div class="col col-auto text-right">

                    </div>
                </div>
                <div class="card-block">
                    <div id="survei-container" class="row justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            load_survei_terkini();
        });

        function load_survei_terkini() {
            $("#survei-container").empty();
            $.ajax({
                url: "<?= base_url() ?>penilaian/getSurveiTerkini",
                dataType: "JSON",
                global: false,
                success: function(result) {
                    if (result.length == 0) {
                        $("#survei-container").append(`
                    <h6 class='text-center text-muted font-italic'>Tidak ada jadwal survei</h6>
                    `);
                    } else {
                        for (i = 0; i < result.length; i++) {
                            $("#survei-container").append(`
                    <div class="col-sm-4">
                        <div class="card card-border-primary">
                            <div class="card-header">
                                <a href="" class="h3 card-title">` + result[i].nama + `</a>
                            </div>
                            <div class="card-block">
                                <p class="task-detail">
                                    <ul class="text-muted no-bullet" style="line-height: 1.5">
                                        <li><i class="fas fa-fw fa-clock mr-2"></i>` + result[i].start + `</li>
                                        <li><i class="fas fa-fw fa-clock mr-2"></i>` + result[i].finish + `</li>
                                        <li><i class="fas fa-fw fa-user mr-2"></i>` + result[i].k_pengawas + `</li>
                                        <li><i class="fas fa-fw fa-user mr-2"></i>` + result[i].k_pencacah + `</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    `);
                        }
                    }
                }
            });
        }
    </script>



</div>
<!-- /.container-fluid -->

</div>
<!--End of Main Content-->