<!-- Content Row -->
<div class="row content">
    <div class="load">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- listing -->
    <div class="col-md-12">
        <!-- DataTales Example -->
        <a href="<?= base_url('c_master/siswa') ?>" class="btn btn-danger mb-1">
            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar
                    <?= $title ?>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="data" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Lembaga</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7"><b>Total:</b></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end listing -->


    <!-- Modal -->
    <div class="modal fade" id="modal-pembayaran-detail" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="modal-pembayaran-detailTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-pembayaran-detailTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    Invoice
                                    <strong id="created_at"></strong>
                                    <span class="float-right"> <strong>Status:</strong> <span class="badge badge-success">Terbayar</span> </span>

                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h6 class="mb-3">Dari:</h6>
                                            <div>
                                                <strong>NURULIMAN ALHASANAH</strong>
                                            </div>
                                            <div>Alamat: Jl.Leuwiliang Km. 3, Kampung Sawah Kulon, Leuwiliang, Barengkok, Kec. Leuwiliang, Bogor, Jawa Barat 16640</div>
                                            <div>Phone: 02516626799</div>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6 class="mb-3">Kepada:</h6>
                                            <div>
                                                <strong id="siswa_name"></strong>
                                            </div>
                                            <div id="siswa_address"></div>
                                            <div id="siswa_phone"></div>
                                        </div>



                                    </div>

                                    <div class="table-responsive-sm">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nama Pembayaran</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-pembayaran">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">

                                        </div>

                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-sm table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right">
                                                            <strong>Grand Total</strong>
                                                        </td>
                                                        <td class="text-right">
                                                            <strong id="grand_total"></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    showLoad();

    $(document).on("click.ev", ".btn-lihat", function (e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        let code = $this.attr("data-code");
        let siswa_name = $this.attr("data-siswa-name");
        let siswa_phone = $this.attr("data-siswa-phone");
        let siswa_address = $this.attr("data-siswa-address");
        setTimeout(() => {
            hideLoad();
            $.ajax({
                type: "get",
                url: "<?= $riwayat_pembayaran_detail ?>",
                data: {
                    pembayaran_id: id
                },
                dataType: "json",
                success: function (res) {
                    let data = res.data;
                    loadContent(data, "#tbody-pembayaran");
                }
            });
            $('#modal-pembayaran-detail').modal('show');
            $('#modal-pembayaran-detailTitle').text('Detail Pembayaran ' + code);
            $('#siswa_name').text(siswa_name);
            $('#siswa_phone').text(siswa_phone);
            $('#siswa_address').text(siswa_address);
        }, 1000);
    });

    function loadContent(data, attr) {
        $(attr).html("");
        let grand_total = 0;
        $.each(data, function (index, dt) {
            index += 1;
            grand_total+=parseInt(dt.amount);
            let rows = `<tr>
                            <td width="50">`+index+`</td>
                            <td><b>[`+dt.attribute_type_name+`]</b> `+dt.attribute_name+`</td>
                            <td class="text-right">`+formatCurrency(dt.amount)+`</td>
                        </tr>`;
            $(attr).append(rows);
        });
        $('#grand_total').text(formatCurrency(grand_total));
    }


    // data
    let table = $("#data").DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searchDelay": 500,

        "ajax": {
            "url": "<?= $data; ?>",
            "type": "POST",
            "data": function (data) {
                data.siswa_id = "<?= $siswa_id ?>"
            }
        },
        "fnInitComplete": function () {
            this.fnAdjustColumnSizing(true);
            hideLoad();
        },
        "autoWidth": true,
        "columns": [
            {
                "data": "no"
            },
            {
                "data": "code"
            },
            {
                "data": "siswa_name"
            },
            {
                "data": "kelas_name"
            },
            {
                "data": "tahun_ajaran_name"
            },
            {
                "data": "lembaga_name"
            },
            {
                "data": "created_at"
            },
            {
                "data": "amount",
                "render": function (data, type, row) {
                    return '<b>' + formatCurrency(data) + '</b>';
                }
            },
            {
                "data": "id"
            }
        ],

        "columnDefs": [
            {
                "targets": [0, 8],
                "orderable": true,
                "searchable": false,
                "className": "text-center",
                "fixedColumns": true,
            },
            {
                "targets": 8,
                "className": "text-center",
                "fixedColumns": true,
                "render": function (data, type, row) {
                    return `<button type="button" data-id="`+row.id+`" data-code="`+row.code+`" data-siswa-name="`+row.siswa_name+`" data-siswa-phone="`+row.siswa_phone+`" data-siswa-address="`+row.siswa_address+`"  class="btn btn-sm btn-info btn-lihat">
                        <i class="fa fa-fw fa-eye"></i> Lihat
                    </button>`;
                }
            },
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(7).footer()).html(
                formatCurrency(pageTotal)
            );
        }
    });
    // end data
</script>