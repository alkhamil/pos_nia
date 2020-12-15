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
                        <form action="<?= $simpan ?>" method="POST" id="form-siswa">
                            <div class="row">
                                <input type="hidden" name="id">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nis" class="label-required">NIS</label>
                                        <input type="text" class="form-control form-required" name="nis" id="nis" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="label-required">Nama Siswa</label>
                                        <input type="text" class="form-control form-required" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="label-required">Telepon</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-required" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthday" class="label-required">Tanggal Lahir</label>
                                        <input type="text" class="form-control form-required" name="birthday" id="birthday" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lembaga_id" class="label-required">Lembaga</label>
                                        <select name="lembaga_id" id="lembaga_id" class="form-control" style="width: 100%" data-placeholder="Choose Lembaga" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">
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
                                <th>Nama</th>
                                <th>Lembaga</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
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
    check_nis();

    function check_nis(){
      $.ajax({
        type: "get",
        url: "<?= $nis ?>",
        dataType: "json",
        success: function (data) {
          if (data) {
            $('#nis').val(data);
          }
        }
      });
    }

    $("#birthday").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minDate: '06/01/2013',
      maxDate: '06/30/2015',
      locale : {
          format : 'YYYY-MM-DD'
      }
    }).on('apply.daterangepicker', function (ev, picker) {
      let startDate = picker.startDate.format('YYYY-MM-DD');
      $(this).val(startDate);
    });

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
    }).on("select2:unselect", function(e){
    });

    // edit Lembaga
    $(document).on("click.ev", ".btn-edit", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        let dataTarget = $('#accordionExample .card-header button').attr('data-target');
        let form = $('#form-siswa');
      
        $.ajax({
            url: "<?= $get ?>?id=" + id,
            method: 'get',
            dataType: 'json',
            success: function(data){
                let dt = data.siswa;
                hideLoad();
                scrollUp('#form-siswa');
                if(!$(dataTarget).hasClass('show')) {
                    $('#accordionExample .card-header button').click()
                }
                form.find('[name=id]').val(dt.id);
                form.find('[name=nis]').val(dt.nis);
                form.find('[name=name]').val(dt.name);
                form.find('[name=phone]').val(dt.phone);
                form.find('[name=birthday]').val(dt.birthday);

                let opt_lembaga = new Option(dt.lembaga_name, dt.lembaga_id, true, true);
                form.find('[name=lembaga_id]').append(opt_lembaga).trigger('change');
            }
      });
    });
    // end edit Lembaga

    // hapus Lembaga
    $(document).on("click.ev", ".btn-hapus", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        setTimeout(() => {
            Swal.fire({
                title: 'Anda yakin ingin hapus?',
                text: "Data ini akan hilang permanent",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= $hapus ?>?id=" + id,
                        method: 'get',
                        dataType: 'json',
                        success: function(data){
                            if (data.type == 'success') {
                                Swal.fire('Terhapus!', data.msg, 'success')
                            }else {
                                Swal.fire('Gagal!', data.msg, 'warning')
                            }
                            hideLoad();
                            table.ajax.reload();
                        }
                    });
                }else{
                    hideLoad();
                }
                check_nis();
            });
        }, 1000);
      
        
    });
    // end hapus Lembaga

    


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
          "data": "name"
        },
        {
          "data": "lembaga_name"
        },
        {
          "data": "birthday"
        },
        {
          "data": "phone"
        },
        {
          "data": "id"
        }
      ],
      
      "columnDefs": [
        {
          "targets": [0, 5], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
        {
          "targets": 5,
          "className": "text-center",
          "fixedColumns": true,
          "render": function(data, type, row) {
            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit">
                        <i class="fa fa-fw fa-edit"></i> Edit
                    </button>
                    <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-hapus">
                        <i class="fa fa-fw fa-trash"></i> Hapus
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
      $(formEl).find('select').val('').trigger('change');
    }

    $("#reset").click(function() {
      resetForm("#form-siswa");
      check_nis();
    })
    // reset
</script>