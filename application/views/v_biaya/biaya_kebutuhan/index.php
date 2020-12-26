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
                        <form action="<?= $simpan ?>" method="POST" id="form-biaya-kebutuhan">
                            <div class="row">
                                <input type="hidden" name="id">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tahun_ajaran_id" class="label-required">Tahun Ajaran</label>
                                        <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Tahun" required>
                                        </select>
                                        <input type="hidden" name="tahun_ajaran_id_temp">
                                    </div>
                                </div>
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
                                        <label class="text-white">.</label>
                                        <button id="btn-lanjutkan" class="btn btn-block btn-info btn-lanjutkan">Lanjutkan</button>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="list-attribute">
                                    <hr>
                                    <table class="table table-sm table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Tipe</th>
                                                <th>Deskripsi</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-kebutuhan-data"></tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input type="hidden" name="list-kebutuhan-temp" id="list-kebutuhan-temp">
                                    <!-- <textarea name="list-kebutuhan-temp" id="list-kebutuhan-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                    <button type="submit" id="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                    <button type="reset" id="reset" class="btn btn-danger">
                                        Reset
                                    </button>
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
                                <th>Tahun Ajaran</th>
                                <th>Lembaga</th>
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
    showLoad();
    $('#submit').prop('disabled', true).css('cursor', 'not-allowed');

    $(document).on('click.ev', '.dropdown-attribute', function (e) {
        e.stopPropagation();
    });

    let tahun_ajaran_id = null;
    $("#tahun_ajaran_id").select2({
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
        }
      }
    }).on("select2:select", function(e) {
      let data = e.params.data;
      tahun_ajaran_id = data.id;
    }).on("select2:unselect", function(e){
      tahun_ajaran_id = null;
    });

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
      lembaga_id = data.id;
    }).on("select2:unselect", function(e){
      lembaga_id = null;
    });

    // edit Lembaga
    $(document).on("click.ev", ".btn-lihat", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        let dataTarget = $('#accordionExample .card-header button').attr('data-target');
        let form = $('#form-biaya-kebutuhan');
        $('#btn-lanjutkan').prop('disabled', true).css('cursor', 'not-allowed');
        $.ajax({
            url: "<?= $get ?>?id=" + id,
            method: 'get',
            dataType: 'json',
            success: function(data){
                let dt = data.biaya_kebutuhan;
                hideLoad();
                scrollUp('#form-biaya-kebutuhan');
                $('#submit').prop('disabled', false).css('cursor', 'pointer');
                $('#edit-attribute').removeClass('d-none');

                if(!$(dataTarget).hasClass('show')) {
                    $('#accordionExample .card-header button').click()
                }
                form.find('[name=id]').val(dt.id);
                let opt_tahun_ajaran = new Option(dt.tahun_ajaran_name, dt.tahun_ajaran_id, true, true);
                form.find('[name=tahun_ajaran_id]').append(opt_tahun_ajaran).trigger('change');
                form.find('[name=tahun_ajaran_id]').prop('disabled', true);
                form.find('[name=tahun_ajaran_id_temp]').val(dt.tahun_ajaran_id);

                let opt_lembaga = new Option(dt.lembaga_name, dt.lembaga_id, true, true);
                form.find('[name=lembaga_id]').append(opt_lembaga).trigger('change');
                form.find('[name=lembaga_id]').prop('disabled', true);
                form.find('[name=lembaga_id_temp]').val(dt.lembaga_id);
                DATA = dt.biaya_kebutuhan_detail;
                loadDataChild(DATA)
            }
      });
    });
    // end edit Lembaga

    // hapus Lembaga
    let DATA = [];
    let lanjut = true;
    $(document).on("click.ev", ".btn-lanjutkan", function(e) {
        e.preventDefault();
        showLoad();
        let form = $('#form-biaya-kebutuhan');
        
        $('#form-biaya-kebutuhan').find('.form-required').each(function(){
            let value = $(this).val();
            if (value == null || value == '') {
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
                        tahun_ajaran_id:tahun_ajaran_id,
                        lembaga_id:lembaga_id
                    },
                    dataType: "json",
                    success: function (data) {
                        DATA = data.biaya_kebutuhan;
                        form.find('[name=id]').val(data.id);
                        if (!data.is_isset) {
                            loadDataChild(DATA);
                        }else{
                            let msg = 'Data biaya kebutuhan tahun <b>'+data.tahun_ajaran_name+'</b> & lembaga <b>'+data.lembaga_name+'</b> sudah pernah di input. <br> Silahkan di check kembali!  ';
                            Swal.fire('Oopss!', msg, 'warning')
                        }
                        hideLoad();
                    }
                });
            }, 1000);
        }else{
            Swal.fire('Oopss!', 'Kolom tidak boleh kosong!', 'warning')
            hideLoad();
        }
    });


    function loadDataChild(_DATA){
        $('#list-kebutuhan-temp').val(JSON.stringify(_DATA));
        console.log(_DATA);
        if (_DATA) {
            $('#list-attribute').removeClass('d-none');
            // use komite
            $('#list-kebutuhan-data').html("");
            $.each(_DATA, function (index, data) { 
                index+=1;
                let type = (data.type == 'PRIMARY') ? `<div class="badge badge-primary">Primary</div>` : `<div class="badge badge-warning">Secondary</div>`;
                let rows = `<tr>
                                <td>`+index+`</td>
                                <td>`+data.name+`</td>
                                <td>`+type+`</td>
                                <td>`+data.desc+`</td>
                                <td width="250"><input type="number" value="`+data.amount+`" class="form-control form-control-sm change-price-item" data-id="`+index+`"></td>
                            </tr>`
                $('#list-kebutuhan-data').append(rows);
            });
        }
        
    }
    
    // change price
    $(document).on("change.ev", ".change-price-item", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA[i-1].amount = $(this).val();
        showLoad();
        setTimeout(() => {
            $('#list-kebutuhan-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });
    
    // end hapus Lembaga

    $(document).on("click.ev", ".btn-cetak", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        setTimeout(() => {
            Swal.fire({
                title: 'Cetak data ini?',
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
                check_nis();
            });
        }, 1000);    
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
          "data": "tahun_ajaran_name"
        },
        {
          "data": "lembaga_name"
        },
        {
          "data": "id"
        }
      ],
      
      "columnDefs": [
        {
          "targets": [0, 3], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
        {
          "targets": 3,
          "className": "text-center",
          "fixedColumns": true,
          "render": function(data, type, row) {
            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-lihat">
                        <i class="fa fa-fw fa-eye"></i> Lihat
                    </button>
                    <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-cetak">
                        <i class="fa fa-fw fa-print"></i> Cetak
                    </button>`;
          }
        },
      ],
    });
    // end data

    // reset
    function resetForm(formEl) {
      $(formEl).trigger("reset");
      $(formEl).find('[type=hidden]').val('');
      $(formEl).find('select').empty().trigger('change')
      $(formEl).find('select').prop('disabled', false);
      $('#btn-lanjutkan').prop('disabled', false).css('cursor', 'pointer');
      $('#submit').prop('disabled', true).css('cursor', 'not-allowed');
      $('#edit-attribute').addClass('d-none');
    }

    $("#reset").click(function() {
      resetForm("#form-biaya-kebutuhan");
      $('#list-attribute-komite').html("");
      $('#list-attribute-semester').html("");
      $('#list-attribute-lainnya').html("");
      $('#list-attribute').addClass('d-none');
    })
    // reset
</script>