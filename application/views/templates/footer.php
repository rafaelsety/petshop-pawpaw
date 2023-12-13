            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">

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

            <script>
                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }

                    })
                })

                $(document).ready(function() {
                    $('tfoot').hide()

                    $(document).keypress(function(event) {
                        if (event.which == '13') {
                            event.preventDefault();
                        }
                    })

                    $('#input_barang').on('keyup', function() {

                        if ($(this).val() == '') reset()
                        else {
                            const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                            $.ajax({
                                url: url_get_all_barang,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    kode_barang: $(this).val()
                                },
                                success: function(data) {
                                    $('input[name="input_barang"]').val(data.kd_produk)
                                    $('input[name="nama_barang"]').val(data.nama_produk)
                                    $('input[name="kode_barang"]').val(data.kd_produk)
                                    $('input[name="harga_barang"]').val(data.harga)
                                    $('input[name="jumlah"]').val(1)
                                    $('input[name="satuan"]').val(data.jenis_hewan)
                                    $('input[name="max_hidden"]').val(data.stok)
                                    $('input[name="jumlah"]').prop('readonly', false)
                                    $('button#tambah').prop('disabled', false)

                                    $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())

                                    $('input[name="jumlah"]').on('keydown keyup change blur', function() {
                                        $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
                                    })
                                }
                            })
                        }
                    })

                    $(document).on('click', '#tambah', function(e) {
                        const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                        const data_keranjang = {
                            nama_barang: $('input[name="nama_barang"]').val(),
                            kode_barang: $('input[name="kode_barang"]').val(),
                            harga_barang: $('input[name="harga_barang"]').val(),
                            jumlah: $('input[name="jumlah"]').val(),
                            satuan: $('input[name="satuan"]').val(),
                            sub_total: $('input[name="sub_total"]').val(),
                        }

                        if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
                            alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))
                        } else {
                            $.ajax({
                                url: url_keranjang_barang,
                                type: 'POST',
                                data: data_keranjang,
                                success: function(data) {
                                    if ($('input[name="nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
                                    reset()

                                    $('table#keranjang tbody').append(data)
                                    $('tfoot').show()

                                    $('#total').html('<strong>' + hitung_total() + '</strong>')
                                    $('input[name="total_hidden"]').val(hitung_total())
                                }
                            })
                        }

                    })


                    $(document).on('click', '#tombol-hapus', function() {
                        $(this).closest('.row-keranjang').remove()

                        $('option[value="' + $(this).data('nama-barang') + '"]').show()

                        if ($('tbody').children().length == 0) $('tfoot').hide()
                    })

                    $('button[type="submit"]').on('click', function() {
                        $('input[name="kode_barang"]').prop('disabled', true)
                        $('select[name="nama_barang"]').prop('disabled', true)
                        $('input[name="harga_barang"]').prop('disabled', true)
                        $('input[name="jumlah"]').prop('disabled', true)
                        $('input[name="sub_total"]').prop('disabled', true)
                    })

                    function hitung_total() {
                        let total = 0;
                        $('.sub_total').each(function() {
                            total += parseInt($(this).text())
                        })

                        return total;
                    }

                    function reset() {
                        $('#input_barang').val('')
                        $('input[name="nama_barang"]').val('')
                        $('input[name="kode_barang"]').val('')
                        $('input[name="harga_barang"]').val('')
                        $('input[name="jumlah"]').val('')
                        $('input[name="sub_total"]').val('')
                        $('input[name="jumlah"]').prop('readonly', true)
                        $('button#tambah').prop('disabled', true)
                    }
                })
            </script>

            </body>

            </html>