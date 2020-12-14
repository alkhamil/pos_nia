    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; POS-NIA <?= date('Y') ?></span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik keluar untuk menghapus session</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="#">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        base_url='<?= base_url(); ?>';
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
            xhrFields: {
                withCredentials: true
            },
            dataType: 'json',
            cache: false
        });
        function showToasts(type, msg) { 
            if (type == 'error') {
                iziToast.warning({
                    title: 'Error',
                    message: msg,
                    position: 'bottomRight'
                });
            }
            if (type == 'success') {
                iziToast.success({ 
                    title: 'Berhasil',
                    message: msg,
                    position: 'bottomRight'
                });
            }
        }

        let type = <?= json_encode($this->session->flashdata('msg')['type']) ?>;
        let msg = <?= json_encode($this->session->flashdata('msg')['msg']) ?>;
        if (msg) {
            showToasts(type, msg);
        }
    </script>

</body>

</html>