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
                        <form action="<?= $simpan ?>" method="POST" id="form-tahun-ajaran">
                            <div class="row">
                                <input type="hidden" name="id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="label-required">Tahun Ajaran</label>
                                        <input type="text" class="form-control form-required" name="name" id="name" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active" class="label-required">Status</label>
                                        <select name="is_active" id="is_active"style="width: 100%" class="form-control" data-placeholder="Choose Status" required>
                                            <option value="1">AKTIF</option>
                                            <option value="0">TIDAK AKTIF</option>
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
                                <th>Tahun Ajaran</th>
                                <th>Status</th>
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
    cek_tahun_ajaran();
    $("select[name=is_active]").select2();
    

    // edit Lembaga
    $(document).on("click.ev", ".btn-edit", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        let dataTarget = $('#accordionExample .card-header button').attr('data-target');
        let form = $('#form-tahun-ajaran');
      
        $.ajax({
            url: "<?= $get ?>?id=" + id,
            method: 'get',
            dataType: 'json',
            success: function(data){
                let dt = data.tahun_ajaran;
                hideLoad();
                scrollUp('#form-tahun-ajaran');
                if(!$(dataTarget).hasClass('show')) {
                    $('#accordionExample .card-header button').click()
                }
                form.find('[name=id]').val(dt.id);
                form.find('[name=name]').val(dt.name);
                form.find('[name=is_active]').val(dt.is_active).trigger('change');
            }
      });
    });
    // end edit Lembaga

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
          "data": "is_active",
          "render" : function(data, type, row){
              return (data=='0'||data==0) ? '<div class="badge badge-danger">Tidak Aktif</div>' : '<div class="badge badge-success">Aktif</div>';
          }
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
            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit">
                        <i class="fa fa-fw fa-edit"></i> Edit
                    </button>`;
          }
        },
      ],
    });
    // end data
    //cek tahun_ajaran
    function cek_tahun_ajaran() { 
        $.ajax({
            type: "get",
            url: "<?= $cek_tahun ?>",
            dataType: "json",
            success: function (data) {
                if(data){
                    $('#name').val(data);
                }
            }
        });
    };
    //end tahun_ajaran
    // reset
    function resetForm(formEl) {
      $(formEl).trigger("reset");
      $(formEl).find('[type=hidden]').val('');
      $(formEl).find('select').val('').trigger('change');
    }

    $("#reset").click(function() {
      resetForm("#form-tahun-ajaran");
      cek_tahun_ajaran();
    })
    // reset
</script>