 <!-- Footer -->
 <footer class="sticky-footer" style="background-color: #e6ccb3;">
     <div class="container my-auto">
         <div class="copyright text-center my-auto" style="color:  #603f20">
             <span>Copyright &copy; MSA 2021</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

 <script src="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.js"></script>
 <script src="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>




 <script>
     $('.alert').alert().delay(2000).slideUp('slow');

     $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });


     $('.form-access-input').on('click', function() {
         const menuId = $(this).data('menu');
         const roleId = $(this).data('role');

         $.ajax({
             url: "<?= base_url('admin/changeaccess') ?>",
             type: 'post',
             data: {
                 menuId: menuId,
                 roleId: roleId
             },
             success: function() {
                 document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
             }
         });

     });

     $('.form-pencacah-input').on('click', function() {
         const kegiatanId = $(this).data('kegiatan');
         const mitraId = $(this).data('pencacah');

         $.ajax({
             url: "<?= base_url('kegiatan/changepencacah') ?>",
             type: 'post',
             data: {
                 kegiatanId: kegiatanId,
                 mitraId: mitraId
             },
             success: function() {
                 document.location.href = "<?= base_url('kegiatan/tambah_pencacah/'); ?>" + kegiatanId;
             }
         });

     });

     $('.form-pengawas-input').on('click', function() {
         const kegiatanId = $(this).data('kegiatan');
         const id = $(this).data('pengawas');

         $.ajax({
             url: "<?= base_url('kegiatan/changepengawas') ?>",
             type: 'post',
             data: {
                 kegiatanId: kegiatanId,
                 id: id
             },
             success: function() {
                 document.location.href = "<?= base_url('kegiatan/tambah_pengawas/'); ?>" + kegiatanId;
             }
         });

     });

     $('.form-nilai-input').on('click', function() {
         const kegiatanId = $(this).data('kegiatan_id');
         const mitraId = $(this).data('id_mitra');
         const kriteriaId = $(this).data('kriteria');
         const nilaiId = $(this).data('nilai');

         $.ajax({
             url: "<?= base_url('penilaian/changenilai') ?>",
             type: 'post',
             data: {
                 kegiatanId: kegiatanId,
                 mitraId: mitraId,
                 kriteriaId: kriteriaId,
                 nilaiId: nilaiId

             },
             success: function() {
                 document.location.href = "<?= base_url('penilaian/isi_nilai/'); ?>" + kegiatanId + "/" + mitraId;
             }
         });

     });
 </script>


 <script>
     $(document).ready(function() {
         $('#mydata').DataTable({
             paging: true,
             searching: false,
             ordering: true,
             pagingType: "full_numbers"
         });
     });
 </script>

 <script type="text/javascript">
     $(function() {
             $(".datepicker").datepicker({
                     format: 'yyyy-mm-dd',
                     autoclose: true,
                     todayHighlight: true,
                 }

             );
         }

     );
 </script>






 </body>

 </html>