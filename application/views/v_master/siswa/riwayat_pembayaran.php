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
        <div class="accordion mb-2" id="accordionFilterPembayaran">
            <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                <div class="card-header bg-info" id="headingFilter">
                    <h6 class="mb-0">
                        <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                            <i class="fa fa-plus fa-fw"></i>
                        </button>
                        <strong class="ml-2 text-white">Filter Pencarian</strong>
                    </h6>
                </div>

                <div id="collapseFilter" class="collapse" aria-labelledby="headingFilter" data-parent="#accordionFilterPembayaran">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="filter_tahun_ajaran_id" id="filter_tahun_ajaran_id" class="form-control form-control-sm" style="width: 100%" data-placeholder="Filter Tahun Ajaran">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="filter_lembaga_id" id="filter_lembaga_id" class="form-control form-control-sm" style="width: 100%" data-placeholder="Filter Lembaga">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="filter_kelas_id" id="filter_kelas_id" class="form-control form-control-sm" style="width: 100%" data-placeholder="Filter Kelas">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-primary btn-block btn-filter">
                                        Simpan Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar
                    <?= $title ?>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-striped table-sm" id="data" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Lembaga</th>
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
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal-pembayaran-detailTitle"></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="container">
                            <div class="card shadow border-0">
                                <div class="card-header border-0">
                                    Bukti Pembayaran
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-center"><strong><i>Terbilang : <span id="terbilang"></span></i></strong></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" target="_blank" id="btn-cetak-bukti" class="btn btn-info">
                        <i class="fa fa-print"></i> Cetak Bukti Pembayaran
                    </a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    showLoad();

    $(document).ready(function(){
        $start = $('#accordionFilterPembayaran');
        // Add minus icon for collapse element which is open by default
        $start.find(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        // Toggle plus minus icon on show hide of collapse element
        $start.find(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });

    // FILTER
    let filter_tahun_ajaran_id = null;
    $("#filter_tahun_ajaran_id").select2({
        allowClear: true,
        ajax: {
            url: "<?php echo $select_tahun_ajaran ?>",
            delay: 100,
            dataType: 'json',
            processResults: function(data) {   
                let items = [];
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                    let tempData = {
                        id: data[i].id,
                        text: data[i].name,
                        data: data[i]
                    }
                    items.push(tempData)
                    }
                }
                return {
                    results: items
                };
                console.log(items);
            }
        }
    }).on("select2:select", function(e) {
        let data = e.params.data;
        filter_tahun_ajaran_id = data.id;
        loadData();
    }).on("select2:unselect", function(e){
        filter_tahun_ajaran_id = null; 
        loadData();  
    });

    let filter_lembaga_id = null;
    $("#filter_lembaga_id").select2({
        allowClear: true,
        ajax: {
            url: "<?php echo $select_lembaga ?>",
            delay: 100,
            dataType: 'json',
            processResults: function(data) {   
                let items = [];
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                    let tempData = {
                        id: data[i].id,
                        text: data[i].name,
                        data: data[i]
                    }
                    items.push(tempData)
                    }
                }
                return {
                    results: items
                };
                console.log(items);
            }
        }
    }).on("select2:select", function(e) {
        let data = e.params.data;
        filter_lembaga_id = data.id;
        loadData();
    }).on("select2:unselect", function(e){
        filter_lembaga_id = null;         
        filter_lembaga_name = null;  
        loadData();       
    });

    let filter_kelas_id = null;
    $("#filter_kelas_id").select2({
        allowClear: true,
        ajax: {
            url: "<?php echo $select_kelas ?>",
            delay: 100,
            dataType: 'json',
            processResults: function(data) {   
                let items = [];
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                    let tempData = {
                        id: data[i].id,
                        text: data[i].name,
                        data: data[i]
                    }
                    items.push(tempData)
                    }
                }
                return {
                    results: items
                };
                console.log(items);
            }
        }
    }).on("select2:select", function(e) {
        let data = e.params.data;
        filter_kelas_id = data.id;
        loadData();
    }).on("select2:unselect", function(e){
        filter_kelas_id = null;  
        loadData();       
    });

    $(document).on("click.ev", ".btn-filter",  function() {
        loadData();
    });

    function loadData() { 
        showLoad();
        setTimeout(() => {
            table.ajax.reload();
            hideLoad();
        }, 800);
    }

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
            let link = "<?= $cetak ?>" + "?id=" + id;
            $('#btn-cetak-bukti').attr('href', link);
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
        $('#terbilang').text(terbilang(grand_total));
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
                data.siswa_id = "<?= $siswa_id ?>";
                data.filter_tahun_ajaran_id = filter_tahun_ajaran_id;
                data.filter_lembaga_id = filter_lembaga_id;
                data.filter_kelas_id = filter_kelas_id;
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
                "data": "created_at"
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
                "data": "amount",
                "render": function (data, type, row) {
                    return formatCurrency(data);
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