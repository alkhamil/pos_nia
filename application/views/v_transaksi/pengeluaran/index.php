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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lembaga_id" class="label-required">Lembaga</label>
                                        <select name="lembaga_id" id="lembaga_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Lembaga" required>
                                        </select>
                                        <input type="hidden" name="lembaga_id_temp">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="total_saldo" class="">Total Saldo</label>
                                        <span class="form-control" name="total_saldo" id="total_saldo"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-white">.</label>
                                        <button id="btn-lanjutkan" class="btn btn-block btn-info btn-lanjutkan">Ambil Dana</button>
                                    </div>
                                </div>

                                <div class="col-md-12 d-none" id="list-attribute">
                                    <hr>
                                    <div class="card shadow border-0">
                                        <div class="card-header bg-info">
                                            <h6 class="mb-0 text-center">
                                                <strong class="text-white">Form Pengeluaran </strong>
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="penerima" class="col-sm-2 col-form-label label-required">Nama Penerima</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="penerima" class="form-control" id="penerima" placeholder="Nama Penerima" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tipe_kebutuhan" class="col-sm-2 col-form-label label-required">Tipe Kebutuhan</label>
                                                    <div class="col-sm-10">
                                                        <select name="tipe_kebutuhan" id="tipe_kebutuhan" class="form-control" style="width: 100%" data-placeholder="Pilih Tipe" required>
                                                        </select>
                                                        <input type="hidden" name="tipe_kebutuhan_temp">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kebutuhan_detail_id" class="col-sm-2 col-form-label label-required">Kebutuhan Detail</label>
                                                    <div class="col-sm-10">
                                                        <select name="kebutuhan_detail_id" id="kebutuhan_detail_id" class="form-control" style="width: 100%" data-placeholder="Pilih Detail Kebutuhan" required>
                                                        </select>
                                                        <input type="hidden" name="kebutuhan_detail_id_temp">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="desc" class="col-sm-2 col-form-label label-required">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="desc" id="desc" class="form-control" cols="3" required readonly></textarea>
                                                        <input type="hidden" name="desc_temp">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nominal" class="col-sm-2 col-form-label label-required">Nominal</label>
                                                    <div class="col-sm-10">
                                                        <span class="form-control" id="nominal1"></span>
                                                        <input type="hidden" name="nominal" class="form-control" id="nominal" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sisa_saldo" class="col-sm-2 col-form-label">Sisa Saldo</label>
                                                    <div class="col-sm-10">
                                                        <span class="form-control" id="sisa_saldo"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id">
                                                <input type="hidden" name="t_biaya_kebutuhan_id" id="t_biaya_kebutuhan_id">
                                                <!-- <textarea name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                                <button type="submit" id="submit" class="btn btn-block btn-info">
                                                    Cairkan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
    let saldo = null;
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
      $('#total_saldo').append("<strong>Rp. "+ formatCurrency(saldo)+"</strong>");
      $('#sisa_saldo').append("<strong>Rp. "+ formatCurrency(saldo)+"</strong>");
      $('#btn-lanjutkan').prop('disabled', false).css('cursor', 'pointer'); 
    }).on("select2:unselect", function(e){
      lembaga_id = null;
    }).on('change',function () { 
      $('#total_saldo').empty();
      $('#sisa_saldo').html('');
      $('#list-attribute').addClass('d-none');
     });

    let biaya_kebutuhan_id = null;
    let lanjut = true;
    $(document).on("click.ev", ".btn-lanjutkan", function(e) {
        e.preventDefault();
        showLoad();
        let form = $('#form-pengeluaran');
        $('#btn-lanjutkan').prop('disabled', true).css('cursor', 'not-allowed');
        $('#form-pengeluaran').find('.form-required').each(function(){
            let value = $(this).val();
            if (value == null) {
                lanjut=false;
            }else{
                lanjut=true;
            }
        });

        if (lanjut) {
            setTimeout(() => {
                $('#submit').prop('disabled', false).css('cursor', 'pointer');
                $.ajax({
                    type: "get",
                    url: "<?= $get_biaya_kebutuhan ?>",
                    data: {
                        lembaga_id:lembaga_id
                    },
                    dataType: "json",
                    success: function (data) {
                        if(data !== null ){
                            DATA = data;

                            if (!data.is_isset) {
                                loadDataChild(DATA);
                                biaya_kebutuhan_id = data.id
                            }
                            hideLoad();
                        } else {
                            let msg = 'Data kebutuhan di lembaga ini belum tersedia!';
                            Swal.fire({
                                title: 'Data tidak tersedia!',
                                text: msg,
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                            $('#btn-lanjutkan').prop('disabled', false).css('cursor', 'pointer');
                            hideLoad();
                        }
                    },
                });
            }, 1000);
        }else{
            Swal.fire('Oopss!', 'Kolom tidak boleh kosong!', 'warning')
            hideLoad();
        }
    });

    function loadDataChild(_DATA){
        if (_DATA) {
            $('#list-attribute').removeClass('d-none');
        }
        $('#tahun_ajaran_id').val(_DATA.tahun_ajaran_id);
        $('#t_biaya_kebutuhan_id').val(_DATA.id);   
    }

    let name = null;
    let tipe_kebutuhan = [{id: '',text: 'Pilih Tipe'},{id: "PRIMARY",text: "PRIMARY"},{id: "SECONDARY",text: "SECONDARY"}];
    $("#tipe_kebutuhan").select2({
        data: tipe_kebutuhan
    }).on("select2:select", function(e) {
      let data = e.params.data;
      name = data.text;   
    }).on('change',function () { 
      $('#kebutuhan_detail_id').empty();
      $('#desc').val('');
      $('#nominal1').html('');
      $('#nominal').val('');
      $('#sisa_saldo').html('<strong>Rp. '+formatCurrency(saldo)+'</strong>');
    });
    //kebutuhan detail
    $("#kebutuhan_detail_id").select2({
        ajax: {
            url: "<?php echo $get_kebutuhan_detail ?>",
            delay: 100,
            data: function(params) {
                var query = {
                    q: params.term,
                    type: 'public',
                    biaya_id : biaya_kebutuhan_id,
                    tipe: name
                }
                return query;
            },
            dataType: 'json',
            processResults: function(data) {  
                let items = [];
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                    let tempData = {
                        id: data[i].id,
                        text: data[i].name,
                        desc: data[i].desc,
                        amount: data[i].amount,
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
        let desc = data.desc;
        let amount = data.amount;
        let jumlah = saldo - amount;
        $('#desc').val($('#desc').val() + desc);
        $('#nominal1').html('<strong>Rp. '+formatCurrency(amount)+'</strong>');
        $('#nominal').val($('#nominal').val() + amount);
        $('#sisa_saldo').html('<strong>Rp. '+formatCurrency(jumlah)+'</strong>');
    }).on("select2:unselect", function(e){
        kelas_id = null;  
        $('#sisa_saldo').html('<strong>Rp. '+formatCurrency(saldo)+'</strong>');
    }).on('change',function () { 
        $('#desc').val('');
        $('#nominal1').html('');
        $('#nominal').val('');
        $('#sisa_saldo').html('<strong>Rp. '+formatCurrency(saldo)+'</strong>');
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
</script>