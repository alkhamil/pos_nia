<style>
.table-scroll {
  max-height: 250px;
  overflow: auto;
  display: inline-block;
}
.form-check-input{
    cursor:pointer;
}
</style>
<!-- Content Row -->
<div class="row content">
    <div class="load">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Form -->
    <div class="col-md-12">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-plus-circle"></i> <?= $title ?>
                    </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="<?= $simpan ?>" method="POST" id="form-pengeluaran">
                            <div class="row">
                                <input type="hidden" name="id">
                                <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lembaga_id" class="label-required">Lembaga</label>
                                        <select name="lembaga_id" id="lembaga_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Lembaga" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="total_saldo" class="">Total Saldo</label>
                                        <input type="text" class="form-control" name="total_saldo" id="total_saldo" readonly>
                                        <input type="hidden" class="form-control" name="total_saldo_temp" id="total_saldo_temp">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-white">.</label>
                                        <button id="btn-lanjutkan" class="btn btn-block btn-info btn-lanjutkan">Ambil Dana</button>
                                    </div>
                                </div>

                                <div class="col-md-12 d-none" id="list-kebutuhan">
                                    <hr>
                                    <div class="card shadow border-0">
                                        <div class="card-header bg-info">
                                            <h6 class="mb-0 text-center">
                                                <strong class="text-white">Form Pengeluaran</strong>
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="accordion" id="accordionPengeluaranLeft">
                                                        <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                            <div class="card-header bg-info" id="headingLeft">
                                                                <h6 class="mb-0">
                                                                    <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseLeft" aria-expanded="true" aria-controls="collapseLeft">
                                                                    <i class="fa fa-plus fa-fw"></i>
                                                                    </button>
                                                                    <strong class="ml-2 text-white">Daftar Kebutuhan</strong>
                                                                </h6>
                                                            </div>

                                                            <div id="collapseLeft" class="collapse show" aria-labelledby="headingLeft" data-parent="#accordionPengeluaranLeft">
                                                                <div class="card-body">
                                                                    <table class="table table-sm">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama Kebutuhan</th>
                                                                                <th>Harga</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="daftar-kebutuhan"></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="accordion" id="accordionPengeluaranRight">
                                                        <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                            <div class="card-header bg-info" id="headingRight">
                                                                <h6 class="mb-0">
                                                                    <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseRight" aria-expanded="true" aria-controls="collapseRight">
                                                                    <i class="fa fa-plus fa-fw"></i>
                                                                    </button>
                                                                    <strong class="ml-2 text-white">Anggaran Kebutuhan</strong>
                                                                </h6>
                                                            </div>

                                                            <div id="collapseRight" class="collapse show" aria-labelledby="headingRight" data-parent="#accordionPengeluaranRight">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="alert alert-warning"><b>Note: Harga dan Deskripsi dapat diubah</b></div>
                                                                            <div class="form-group">
                                                                                <label class="label-required">Nama Penerima</label>
                                                                                <input type="text" class="form-control" name="receive_name" id="receive_name" required>
                                                                            </div>
                                                                            <div id="anggaran-kebutuhan"></div>
                                                                        </div>
                                                                        <div class="col-md-12 mt-2 d-none" id="anggaran-footer">
                                                                            <table class="table table-sm">
                                                                                <tr>
                                                                                    <td class="text-right" width="70%"><b>Total Anggaran</b></td>
                                                                                    <td>:</td>
                                                                                    <td class="text-right" id="f_total_anggaran"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-right" width="70%"><b>Sisa Saldo</b></td>
                                                                                    <td>:</td>
                                                                                    <td class="text-right" id="f_sisa_saldo"></td>
                                                                                </tr>
                                                                            </table>
                                                                            <button type="submit" id="cairkan" class="btn btn-success btn-block mt-2">
                                                                                Cairkan
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <!-- Data Biaya -->
                                    <input type="hidden" name="list-pengeluaran-temp" id="list-pengeluaran-temp">
                                    <!-- <textarea name="list-pengeluaran-temp" id="list-pengeluaran-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                    <!-- end data biaya -->

                                    <!-- Data anggaran -->
                                    <input type="hidden" name="list-anggaran-temp" id="list-anggaran-temp">
                                    <!-- <textarea name="list-anggaran-temp" id="list-anggaran-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                    <!-- end data anggaran -->
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->

    <!-- listing -->
    <div class="col-md-12 mt-2">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?></h6>
            </div>
            
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="accordion" id="accordionFilterPembayaran">
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
                                                    <select name="filter_lembaga_id" id="filter_lembaga_id" class="form-control form-control-sm" style="width: 100%" data-placeholder="Filter Lembaga">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="duration" id="duration">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-info btn-block btn-filter">
                                                        Terapkan Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="data" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Pemberi Izin</th>
                                <th>Nama Penerima</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end listing -->
</div>

<script>
    $('#submit').prop('disabled', true).css('cursor', 'not-allowed');

    $(document).ready(function(){
        $start = $('#accordionPengeluaranLeft , #accordionPengeluaranRight');
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

    let filter_start_date = moment().format('DD/MM/YYYY');
    let filter_end_date = moment().format('DD/MM/YYYY');
    $("#duration").daterangepicker({
      locale : {
          format : 'DD/MM/YYYY'
      }
    }).on('apply.daterangepicker', function (ev, picker) {
      filter_start_date = picker.startDate.format('DD/MM/YYYY');
      filter_end_date = picker.endDate.format('DD/MM/YYYY');
      loadData();
    }).on('cancel.daterangepicker', function(ev, picker) {
        filter_start_date = moment().format('DD/MM/YYYY');
        filter_end_date = moment().format('DD/MM/YYYY');
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

    let saldo = null;
    let tahun_ajaran_id = getTahunAjaran();
    let lembaga_id = null;
    $("#lembaga_id").select2({
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
                saldo: data[i].saldo,
                data: data[i]
              }
              items.push(tempData)
            }
          }
          return {
            results: items
          };
        }
      }
    }).on("select2:select", function(e) {
      let data = e.params.data;
      saldo = data.saldo;
      lembaga_id = data.id;
      showLoad();
      setTimeout(() => {
        $('#total_saldo').val(formatCurrency(saldo));
        $('#total_saldo_temp').val(saldo);
        $('#btn-lanjutkan').prop('disabled', false).css('cursor', 'pointer'); 
        hideLoad();
      }, 800);
    }).on("select2:unselect", function(e){
      lembaga_id = null;
    });

    let lanjut = true;
    let DATA = [];
    $(document).on("click.ev", ".btn-lanjutkan", function(e) {
        e.preventDefault();
        showLoad();
        let form = $('#form-pengeluaran');
        $('#form-pengeluaran').find('.form-required').each(function(){
            let value = $(this).val();
            if (value == null) {
                lanjut=false;
            }else{
                lanjut=true;
            }
        });

        if (lanjut) {
            if (saldo > 0) {
                setTimeout(() => {
                    $.ajax({
                        type: "get",
                        url: "<?= $get_kebutuhan ?>",
                        dataType: "json",
                        success: function (res) {
                            DATA = res;
                            loadDataChild(DATA);
                            hideLoad();
                        }
                    });
                }, 1000);
            }else {
                Swal.fire('Oopss!', 'Saldo lembaga tidak cukup!', 'warning')
                hideLoad();
            }
        }else{
            Swal.fire('Oopss!', 'Kolom tidak boleh kosong!', 'warning')
            hideLoad();
        }
    });

    function loadDataChild(_DATA){
        $('#list-pengeluaran-temp').val(JSON.stringify(_DATA));
        if (_DATA) {
            $('#list-kebutuhan').removeClass('d-none');
            $('#daftar-kebutuhan').html("");
            $.each(_DATA, function (index, data) { 
                index+=1;
                let show = '';
                if (data.hasOwnProperty('is_checkout')) {
                    if (data.is_checkout == 1) {
                        show = 'd-none';
                    }else {
                        show = '';
                    }
                }else {
                    show = '';
                }
                let rows = `<tr class="`+show+`">
                                <td>`+data.name+`</td>
                                <td><span class="badge badge-info">`+formatCurrency(data.amount)+`</span></td>
                                <td width="50">
                                    <button class="btn btn-sm btn-success btn-circle btn-add-kebutuhan" data-id="`+index+`">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>`;
                $('#daftar-kebutuhan').append(rows);
            });
        }
    }

    function loadDataAnggaran(_ANGGARAN){
        $('#list-anggaran-temp').val(JSON.stringify(_ANGGARAN));
        if (_ANGGARAN) {
            $('#anggaran-kebutuhan').html("");
            $('#anggaran-footer').removeClass('d-none');
            let sisa_saldo = parseInt(saldo);
            let total_anggaran = 0;
            $.each(_ANGGARAN, function (index, data) { 
                index+=1;
                let show = '';
                if (data.hasOwnProperty('is_checkout')) {
                    if (data.is_checkout == 0) {
                        show = 'd-none';
                    }else {
                        show = '';
                        sisa_saldo-=parseInt(data.amount);
                        total_anggaran+=parseInt(data.amount);
                    }
                }else {
                    show = 'd-none';
                }
                let rows = `<div class="card mb-1 `+show+`" style="border:1px dashed; border-radius:0;">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-2 label-required col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control update-amount" id="amount" value="`+data.amount+`" data-id="`+index+`">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="desc" class="col-sm-2 label-required col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea name="desc" id="desc" class="form-control update-desc" cols="7" rows="3" data-id="`+index+`">`+data.desc+`</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button class="btn ml-1 btn-sm btn-circle btn-danger btn-delete-kebutuhan" data-id="`+index+`">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                $('#anggaran-kebutuhan').append(rows);
            });

            if (sisa_saldo <= 0) {
                $('#cairkan').prop('disabled', true).css('cursor', 'not-allowed');
            }else{
                $('#cairkan').prop('disabled', false).css('cursor', 'pointer');
            }
            
            $('#f_total_anggaran').html(`<span class="badge badge-info"><h5 class="m-0">Rp. `+formatCurrency(total_anggaran)+`</h5></span>`);
            $('#f_sisa_saldo').html(`<span class="badge badge-info"><h5 class="m-0">Rp. `+formatCurrency(sisa_saldo)+`</h5></span>`);
        }
    }

    //kebutuhan detail
    $(document).on("keyup.ev", ".update-amount", function(e) {
        e.preventDefault();
        let $this = $(this);
        let i = parseInt($(this).attr('data-id'));
        DATA[i-1].amount = $this.val();
        showLoad();
        setTimeout(() => {
            loadDataAnggaran(DATA);
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });
    $(document).on("change.ev", ".update-desc", function(e) {
        e.preventDefault();
        let $this = $(this);
        let i = parseInt($(this).attr('data-id'));
        DATA[i-1].desc = $this.val();
        showLoad();
        setTimeout(() => {
            loadDataAnggaran(DATA);
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });

    $(document).on("click.ev", ".btn-add-kebutuhan", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA[i-1].is_checkout = 1;
        showLoad();
        setTimeout(() => {
            loadDataAnggaran(DATA);
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });

    $(document).on("click.ev", ".btn-delete-kebutuhan", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA[i-1].is_checkout = 0;
        showLoad();
        setTimeout(() => {
            loadDataAnggaran(DATA);
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });

    // data
    let table = $("#data").DataTable({
      "processing": true, 
      "serverSide": true, 
      "order": [], 
      "searchDelay": 500,
      
      "ajax": {
        "url": "<?= $data; ?>",
        "type": "POST",
        "data": function(data) {
          data.filter_lembaga_id = filter_lembaga_id;
          data.filter_start_date = filter_start_date;
          data.filter_end_date = filter_end_date;
        }
      },
      "fnInitComplete": function() {
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
          "data": "approval_name"
        },
        {
          "data": "receive_name"
        },
        {
          "data": "amount",
          "render": function(data, type, row){
              return `<b>Rp. `+formatCurrency(data)+`</b>`
          }
        },
        {
          "data": "created_at"
        },
        {
          "data": "id"
        }
      ],
      
      "columnDefs": [
        {
          "targets": [0, 6], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
        {
          "targets": 6,
          "className": "text-center",
          "fixedColumns": true,
          "render": function(data, type, row) {
            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-cetak">
                        <i class="fa fa-fw fa-print"></i> Cetak
                    </button>`;
          }
        },
      ],
    });
    
    $(document).on("click.ev", ".btn-cetak", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        setTimeout(() => {
            Swal.fire({
                title: 'Cetak Pembayaran ini?',
                text: "Anda akan di alihkan ke halaman baru untuk mencetak",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Cetak!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let link = "<?= $cetak ?>" +"?id="+ id;
                    window.open(link);
                    hideLoad();
                }else{
                    hideLoad();
                }
            });
        }, 1000); 
    });
    // end data 

    function getTahunAjaran(){
        let result;
        $.ajax({
            type: "get",
            async: false,
            url: "<?= $get_tahun_ajaran ?>",
            dataType: "json",
            success: function (res) {
                result = res;
                $('#tahun_ajaran_id').val(result);
            }
        });
        return result;
    }
</script>