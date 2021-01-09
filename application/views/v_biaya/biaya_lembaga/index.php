<style>
.form-check-input{
    cursor:pointer;
}

table.scroll tbody {
    height: 250px;
    overflow-y: auto;
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
                        <form action="<?= $simpan ?>" method="POST" id="form-biaya-lembaga">
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
                                    <div class="alert alert-info">Note: <br>
                                        - Gunakan fitur <b>Centang dan Tidak Centang</b> untuk mengatur attribute yang di butuhkan.
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="accordion" id="accordionBiayaKomite">
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingBiayaKomite">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseBiayaKomite" aria-expanded="true" aria-controls="collapseBiayaKomite">
                                                            <i class="fa fa-cog fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Atur Biaya Komite</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseBiayaKomite" class="collapse show" aria-labelledby="headingBiayaKomite" data-parent="#accordionBiayaKomite">
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Harga</th>
                                                                        <th>C/TC</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-attribute-komite"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="accordion" id="accordionBiayaSemester">
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingBiayaSemester">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseBiayaSemester" aria-expanded="true" aria-controls="collapseBiayaSemester">
                                                            <i class="fa fa-cog fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Atur Biaya Semester</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseBiayaSemester" class="collapse show" aria-labelledby="headingBiayaSemester" data-parent="#accordionBiayaSemester">
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered scroll">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Harga</th>
                                                                        <th>C/TC</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-attribute-semester"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="accordion" id="accordionBiayaLainnya">
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingBiayaLainnya">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseBiayaLainnya" aria-expanded="true" aria-controls="collapseBiayaLainnya">
                                                            <i class="fa fa-cog fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Atur Biaya Lainnya</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseBiayaLainnya" class="collapse show" aria-labelledby="headingBiayaLainnya" data-parent="#accordionBiayaLainnya">
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered scroll">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Harga</th>
                                                                        <th>C/TC</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-attribute-lainnya"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input type="hidden" name="list-attribute-temp" id="list-attribute-temp">
                                    <!-- <textarea name="list-attribute-temp" id="list-attribute-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
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

    $(document).ready(function(){
        $start = $('#accordionBiayaKomite, #accordionBiayaSemester, #accordionBiayaLainnya');
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
        let form = $('#form-biaya-lembaga');
        $('#btn-lanjutkan').prop('disabled', true).css('cursor', 'not-allowed');
        $.ajax({
            url: "<?= $get ?>?id=" + id,
            method: 'get',
            dataType: 'json',
            success: function(data){
                let dt = data.biaya_lembaga;
                hideLoad();
                scrollUp('#form-biaya-lembaga');
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
                DATA = dt.biaya_lembaga_detail;
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
        let form = $('#form-biaya-lembaga');
        
        $('#form-biaya-lembaga').find('.form-required').each(function(){
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
                    url: "<?= $get_biaya_lembaga ?>",
                    data: {
                        tahun_ajaran_id:tahun_ajaran_id,
                        lembaga_id:lembaga_id
                    },
                    dataType: "json",
                    success: function (data) {
                        DATA = data.biaya_lembaga;
                        form.find('[name=id]').val(data.id);
                        if (!data.is_isset) {
                            loadDataChild(DATA);
                        }else{
                            let msg = 'Data biaya lembaga tahun <b>'+data.tahun_ajaran_name+'</b> & lembaga <b>'+data.lembaga_name+'</b> sudah pernah di input. <br> Silahkan di check kembali!  ';
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


    $(document).on("click.ev", ".btn-hapus-item", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.splice(i-1, 1);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 1000);
    });


    function loadDataChild(_DATA){
        if (_DATA) {
            $('#list-attribute').removeClass('d-none');
            // use komite
            $('#list-attribute-komite').html("");
            $.each(_DATA.komite, function (index, data) { 
                index+=1;
                data.is_checked = 1;
                let rows = `<tr>
                                <td>`+index+`</td>
                                <td>`+data.name+`</td>
                                <td width="250"><input type="number" value="`+data.amount+`" class="form-control form-control-sm change-price-item-komite" data-id="`+index+`"></td>
                                <td align="center">
                                    <div class="form-check">
                                        <input class="form-check-input set_attr_komite" type="checkbox" value=""  data-id="`+index+`" checked disabled>
                                    </div>
                                </td>
                            </tr>`
                $('#list-attribute-komite').append(rows);
            });
            // use semester
            $('#list-attribute-semester').html("");
            $.each(_DATA.semester, function (index, data) { 
                index+=1;
                let checked = (data.is_checked == 1) ? 'checked' : '';
                let rows = `<tr>
                                <td>`+index+`</td>
                                <td>`+data.name+`</td>
                                <td width="250"><input type="number" value="`+data.amount+`" class="form-control form-control-sm change-price-item-semester" data-id="`+index+`"></td>
                                <td align="center">
                                    <div class="form-check">
                                        <input class="form-check-input set_attr_semester" type="checkbox" value="" data-id="`+index+`" `+checked+`>
                                    </div>
                                </td>
                            </tr>`
                $('#list-attribute-semester').append(rows);
            });
            // use lainnya
            $('#list-attribute-lainnya').html("");
            $.each(_DATA.lainnya, function (index, data) { 
                index+=1;
                let checked = (data.is_checked == 1) ? 'checked' : '';
                let rows = `<tr>
                                <td>`+index+`</td>
                                <td>`+data.name+`</td>
                                <td width="250"><input type="number" value="`+data.amount+`" class="form-control form-control-sm change-price-item-lainnya" data-id="`+index+`"></td>
                                <td align="center">
                                    <div class="form-check">
                                        <input class="form-check-input set_attr_lainnya" type="checkbox" value=""  data-id="`+index+`" `+checked+`>
                                    </div>
                                </td>
                            </tr>`
                $('#list-attribute-lainnya').append(rows);
            });
        }
        $('#list-attribute-temp').val(JSON.stringify(_DATA));
    }

    // change use komite
    $(document).on("keyup.ev", ".change-price-item-komite", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        let value = $(this).val();
        $.each(DATA.komite, function (index, data) { 
            data.amount = value;
        });
        showLoad();
        setTimeout(() => {
            $('#list-attribute-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });

    // change use semester
    $(document).on("keyup.ev", ".change-price-item-semester", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.semester[i-1].amount = $(this).val();
        showLoad();
        setTimeout(() => {
            $('#list-attribute-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });

    // change use lainnya
    $(document).on("keyup.ev", ".change-price-item-lainnya", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.lainnya[i-1].amount = $(this).val();
        showLoad();
        setTimeout(() => {
            $('#list-attribute-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 600);
    });


    // change active semester
    $(document).on("change.ev", ".set_attr_semester", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.semester[i-1].is_checked = (this.checked) ? 1 : 0;
        showLoad();
        setTimeout(() => {
            $('#list-attribute-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 300);
    });

    // change active lainnya
    $(document).on("change.ev", ".set_attr_lainnya", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.lainnya[i-1].is_checked = (this.checked) ? 1 : 0;
        showLoad();
        setTimeout(() => {
            $('#list-attribute-temp').val(JSON.stringify(DATA));
            loadDataChild(DATA);
            hideLoad();
        }, 300);
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
      resetForm("#form-biaya-lembaga");
      $('#list-attribute-komite').html("");
      $('#list-attribute-semester').html("");
      $('#list-attribute-lainnya').html("");
      $('#list-attribute').addClass('d-none');
    })
    // reset
</script>