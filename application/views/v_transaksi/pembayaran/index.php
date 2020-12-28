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
                        <form action="<?= $simpan ?>" method="POST" id="form-pembayaran">
                            <div class="row">
                                <input type="hidden" name="id">
                                <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lembaga_id" class="label-required">Lembaga</label>
                                        <select name="lembaga_id" id="lembaga_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Lembaga" required>
                                        </select>
                                        <input type="hidden" name="lembaga_id_temp">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="siswa_id" class="label-required">Siswa</label>
                                        <select name="siswa_id" id="siswa_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Siswa" required disabled>
                                        </select>
                                        <input type="hidden" name="siswa_id_temp">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="kelas_id" class="label-required">Kelas</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control form-required" style="width: 100%" data-placeholder="Pilih Kelas" required disabled>
                                        </select>
                                        <input type="hidden" name="kelas_id_temp">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-white">.</label>
                                        <button id="btn-lanjutkan" class="btn btn-block btn-info btn-lanjutkan">Lanjutkan</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 d-none" id="list-pembayaran">
                                    <hr>
                                    <div class="alert alert-info">Note: <br>
                                        - Gunakan fitur <b>Centang dan Tidak Centang</b> untuk mengatur attribute yang akan di bayarkan. <br>
                                        - Tekan tombol Checkout untuk memproses pembayaran.
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="accordion" id="accordionPembayaran">
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingKomite">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseKomite" aria-expanded="true" aria-controls="collapseKomite">
                                                               <i class="fa fa-plus fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Daftar Komite</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseKomite" class="collapse" aria-labelledby="headingKomite" data-parent="#accordionPembayaran">
                                                        <div class="card-body">
                                                            <table class="table table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Attribute</th>
                                                                        <th>Harga</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-pembayaran-komite"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingSemester">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseSemester" aria-expanded="true" aria-controls="collapseSemester">
                                                               <i class="fa fa-plus fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Daftar Semester</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseSemester" class="collapse" aria-labelledby="headingSemester" data-parent="#accordionPembayaran">
                                                        <div class="card-body">
                                                            <table class="table table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Attribute</th>
                                                                        <th>Harga</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-pembayaran-semester"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                    <div class="card-header bg-info" id="headingLainnya">
                                                        <h6 class="mb-0">
                                                            <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseLainnya" aria-expanded="true" aria-controls="collapseLainnya">
                                                               <i class="fa fa-plus fa-fw"></i>
                                                            </button>
                                                            <strong class="ml-2 text-white">Daftar Lainnya</strong>
                                                        </h6>
                                                    </div>

                                                    <div id="collapseLainnya" class="collapse" aria-labelledby="headingLainnya" data-parent="#accordionPembayaran">
                                                        <div class="card-body">
                                                            <table class="table table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Attribute</th>
                                                                        <th>Harga</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list-pembayaran-lainnya"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow border-0">
                                                <div class="card-header bg-info">
                                                    <h6 class="mb-0 text-center">
                                                        <strong class="text-white">Checkout</strong>
                                                    </h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive p-2" style="border:1px dashed">
                                                        <table class="table table-borderless table-condensed table-sm">
                                                            <thead class="bg-info">
                                                                <tr class="border-bottom text-white">
                                                                    <th>#</th>
                                                                    <th>Deskripsi</th>
                                                                    <th class="text-right">Harga</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <thead class="d-none" id="header-checkout-komite">
                                                                <tr class="border-bottom border-top">
                                                                    <td colspan="4"><div class="badge badge-info">[Komite]</div></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="content-checkout-komite">
                                                            
                                                            </tbody>
                                                            <thead class="d-none" id="header-checkout-semester">
                                                                <tr class="border-bottom border-top">
                                                                    <td colspan="4"><div class="badge badge-info">[Semester]</div></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="content-checkout-semester">
                                                            
                                                            </tbody>
                                                            <thead class="d-none" id="header-checkout-lainnya">
                                                                <tr class="border-bottom border-top">
                                                                    <td colspan="4"><div class="badge badge-info">[Lainnya]</div></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="content-checkout-lainnya">
                                                            
                                                            </tbody>
                                                            <tfoot id="footer-checkout">
                                                                
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <button type="submit" id="checkout" class="btn btn-success btn-block mt-2 d-none">
                                                        Checkout
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <!-- Data Biaya -->
                                    <input type="hidden" name="list-pembayaran-temp" id="list-pembayaran-temp">
                                    <!-- <textarea name="list-pembayaran-temp" id="list-pembayaran-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                    <!-- end data biaya -->

                                    <!-- Data Checkout -->
                                    <input type="hidden" name="list-checkout-temp" id="list-checkout-temp">
                                    <!-- <textarea name="list-checkout-temp" id="list-checkout-temp" class="form-control mb-2" cols="10" rows="5"></textarea> -->
                                    <!-- end data checkout -->
                                    <!-- <button type="reset" id="reset" class="btn btn-danger">
                                        Batalkan
                                    </button> -->
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
                                <div class="card-header bg-info" id="headingKomite">
                                    <h6 class="mb-0">
                                        <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseKomite" aria-expanded="true" aria-controls="collapseKomite">
                                            <i class="fa fa-plus fa-fw"></i>
                                        </button>
                                        <strong class="ml-2 text-white">Filter Pencarian</strong>
                                    </h6>
                                </div>

                                <div id="collapseKomite" class="collapse" aria-labelledby="headingKomite" data-parent="#accordionFilterPembayaran">
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
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="data" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nis</th>
                                <th>Siswa</th>
                                <th>Kelas</th>
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
    showLoad();
    $('#checkout').prop('disabled', true).css('cursor', 'not-allowed');

    $(document).ready(function(){
        $start = $('#accordionPembayaran , #accordionFilterPembayaran');
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
    
    let tahun_ajaran_id = getTahunAjaran();
    let lembaga_id = null;
    let lembaga_name = null;
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
      showLoad();
      setTimeout(() => {
        lembaga_id = data.id;
        lembaga_name = data.text;
        $('#siswa_id').prop('disabled', false);
        $('#kelas_id').prop('disabled', false);
        hideLoad();
      }, 800);
    }).on("select2:unselect", function(e){
        lembaga_id = null;
    }).on("change", function () { 
        $('#siswa_id').val('').trigger('change');
        $('#kelas_id').val('').trigger('change') ;
    });

    let siswa_id = null;
    $("#siswa_id").select2({
        ajax: {
            url: "<?php echo $select_siswa ?>",
            delay: 100, 
            dataType: 'json',
            data: function(params) {
                var query = {
                    q: params.term,
                    type: 'public',
                    id: lembaga_id
                }
                return query;
            },
            processResults: function(data) {   
                let items = [];
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                    let tempData = {
                        id: data[i].id,
                        text: data[i].name +' [ '+data[i].nis+' ]',
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
        siswa_id = data.id;
    }).on("select2:unselect", function(e){
        siswa_id = null;         
    });

    let kelas_id = null;
    $("#kelas_id").select2({
        ajax: {
            url: "<?php echo $select_kelas ?>",
            delay: 100,
            data: function(params) {
                let level = (lembaga_name == 'SMP' || lembaga_name == 'MTS') ? 1 : 2;
                var query = {
                    q: params.term,
                    type: 'public',
                    level: level
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
        kelas_id = data.id;
    }).on("select2:unselect", function(e){
        kelas_id = null;         
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
    }).on("select2:unselect", function(e){
        filter_tahun_ajaran_id = null;         
    });

    let filter_lembaga_id = null;
    let filter_lembaga_name = null;
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
        filter_lembaga_name = data.text;
    }).on("select2:unselect", function(e){
        filter_lembaga_id = null;         
        filter_lembaga_name = null;         
    });

    let filter_kelas_id = null;
    $("#filter_kelas_id").select2({
        allowClear: true,
        ajax: {
            url: "<?php echo $select_kelas ?>",
            delay: 100,
            data: function(params) {
                let level = (filter_lembaga_name == 'SMP' || filter_lembaga_name == 'MTS') ? 1 : 2;
                var query = {
                    q: params.term,
                    type: 'public',
                    level: level
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
    }).on("select2:unselect", function(e){
        filter_kelas_id = null;         
    });

    $(document).on("click.ev", ".btn-filter",  function() {
        showLoad();
        setTimeout(() => {
            table.ajax.reload();
            hideLoad();
        }, 800);
    });

    // END FILTER

    // edit Lembaga
    $(document).on("click.ev", ".btn-lihat", function(e) {
        e.preventDefault();
        showLoad();
        let $this = $(this);
        let id = $this.attr("data-id");
        let dataTarget = $('#accordionExample .card-header button').attr('data-target');
        let form = $('#form-pembayaran');
        $('#btn-lanjutkan').prop('disabled', true).css('cursor', 'not-allowed');
        $.ajax({
            url: "<?= $get ?>?id=" + id,
            method: 'get',
            dataType: 'json',
            success: function(data){
                let dt = data.biaya_lembaga;
                hideLoad();
                scrollUp('#form-pembayaran');
                $('#submit').prop('disabled', false).css('cursor', 'pointer');
                $('#edit-attribute').removeClass('d-none');

                if(!$(dataTarget).hasClass('show')) {
                    $('#accordionExample .card-header button').click()
                }
                form.find('[name=id]').val(dt.id);
                let opt_tahun_ajaran = new Option(dt.tahun_ajaran_name, dt.siswa_id, true, true);
                form.find('[name=siswa_id]').append(opt_tahun_ajaran).trigger('change');
                form.find('[name=siswa_id]').prop('disabled', true);
                form.find('[name=siswa_id_temp]').val(dt.siswa_id);

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
        let form = $('#form-pembayaran');
        
        $('#form-pembayaran').find('.form-required').each(function(){
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
                    url: "<?= $get_pembayaran_siswa ?>",
                    data: {
                        tahun_ajaran_id:tahun_ajaran_id,
                        lembaga_id:lembaga_id,
                        siswa_id:siswa_id,
                        kelas_id:kelas_id,
                    },
                    dataType: "json",
                    success: function (data) {
                        DATA = data.pembayaran;

                        if (!data.is_isset) {
                            loadDataChild(DATA);
                        }else{
                            $.each(DATA.komite, function (index, data) { 
                             data.id = data.biaya_lembaga_komite_id;
                            });
                            $.each(DATA.semester, function (index, data) { 
                                data.id = data.biaya_lembaga_semester_id;
                            });
                            $.each(DATA.lainnya, function (index, data) { 
                                data.id = data.biaya_lembaga_lainnya_id;
                            });
                            let msg = 'Siswa '+data.siswa_name+' pernah melakukan pembayaran pada tanggal '+data.tanggal+' dengan no pembayaran '+data.code+'. Apakah ingin melanjutkan?';
                            Swal.fire({
                                title: 'Transaki Pernah dilakukan!',
                                text: msg,
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Lanjutkan'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    showLoad();
                                    setTimeout(() => {
                                        loadDataChild(DATA);
                                        hideLoad();
                                    }, 800);
                                }
                            });
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

    function loadDataCheckout(checkout){
        $('#list-checkout-temp').val(JSON.stringify(checkout));
        $('#footer-checkout').html("");

        let total_komite = 0;
        if (checkout.komite) {
            if (checkout.komite.length > 0) {
                $('#header-checkout-komite').removeClass('d-none');
                $('#content-checkout-komite').html("");
                $.each(checkout.komite, function (index, dt) { 
                    index+=1;
                    total_komite+=parseInt(dt.amount);
                    let row = `<tr>
                                    <td>`+index+`</td>
                                    <td>`+dt.attribute_name+`</td>
                                    <td class="text-right">Rp. `+formatCurrency(dt.amount)+`</td>
                                    <td width="50" class="text-center">
                                        <button class="btn btn-sm btn-danger btn-circle btn-add-hapus-komite" data-id="`+index+`">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>`;
                    $('#content-checkout-komite').append(row);
                });
            }else{
                $('#header-checkout-komite').addClass('d-none');
            }
        }
        let total_semester = 0;
        if (checkout.semester) {
            if (checkout.semester.length > 0) {
                $('#header-checkout-semester').removeClass('d-none');
                $('#content-checkout-semester').html("");
                $.each(checkout.semester, function (index, dt) { 
                    index+=1;
                    total_semester+=parseInt(dt.amount);
                    let row = `<tr>
                                    <td>`+index+`</td>
                                    <td>`+dt.attribute_name+`</td>
                                    <td class="text-right">Rp. `+formatCurrency(dt.amount)+`</td>
                                    <td width="50" class="text-center">
                                        <button class="btn btn-sm btn-danger btn-circle btn-add-hapus-semester" data-id="`+index+`">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>`;
                    $('#content-checkout-semester').append(row);
                });
            }else{
                $('#header-checkout-semester').addClass('d-none');
            }
        }
        let total_lainnya = 0;
        if (checkout.lainnya) {
            if (checkout.lainnya.length > 0) {
                $('#header-checkout-lainnya').removeClass('d-none');
                $('#content-checkout-lainnya').html("");
                $.each(checkout.lainnya, function (index, dt) { 
                    index+=1;
                    total_lainnya+=parseInt(dt.amount);
                    let row = `<tr>
                                    <td>`+index+`</td>
                                    <td>`+dt.attribute_name+`</td>
                                    <td class="text-right">Rp. `+formatCurrency(dt.amount)+`</td>
                                    <td width="50" class="text-center">
                                        <button class="btn btn-sm btn-danger btn-circle btn-add-hapus-lainnya" data-id="`+index+`">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>`;
                    $('#content-checkout-lainnya').append(row);
                });
            }else{
                $('#header-checkout-lainnya').addClass('d-none');
            }
        }
        let grand_total = total_komite + total_semester + total_lainnya;

        if (grand_total > 0) {
            let footer = `<tr class="border-top">
                            <th class="text-right" colspan="2"><h5><b>Total Harga</b></h5></th>
                            <th class="text-right"><h5><b>Rp. `+formatCurrency(grand_total)+`</b></h5></th>
                            <th></th>
                        </tr>`
            $('#footer-checkout').append(footer);
            $('#checkout').removeClass('d-none');
            $('#checkout').prop('disabled', false).css('cursor', 'pointer');
        }

    }

    function loadDataChild(_DATA){
        $('#list-pembayaran-temp').val(JSON.stringify(_DATA));
        if (_DATA) {
            $('#list-pembayaran').removeClass('d-none');

            // use pem komite
            $('#list-pembayaran-komite').html("");
            $.each(_DATA.komite, function (index, data) { 
                index+=1;
                data.is_checkout = (data.is_checkout == 1) ? 1 : 0;
                show = (data.is_checkout == 1) ? 'd-none' : '';
                let rows = `<tr class="`+show+`">
                                <td>`+data.attribute_name+`</td>
                                <td><span class="badge badge-info">`+formatCurrency(data.amount)+`</span></td>
                                <td width="50">
                                    <button class="btn btn-sm btn-success btn-circle btn-add-item-komite" data-id="`+index+`">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>`;
                $('#list-pembayaran-komite').append(rows);
            });
            // use pem semester
            $('#list-pembayaran-semester').html("");
            $.each(_DATA.semester, function (index, data) { 
                index+=1;
                data.is_checkout = (data.is_checkout == 1) ? 1 : 0;
                show = (data.is_checkout == 1) ? 'd-none' : '';
                let rows = `<tr class="`+show+`">
                                <td>`+data.attribute_name+`</td>
                                <td><span class="badge badge-info">`+formatCurrency(data.amount)+`</span></td>
                                <td width="50">
                                    <button class="btn btn-sm btn-success btn-circle btn-add-item-semester" data-id="`+index+`">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>`;
                $('#list-pembayaran-semester').append(rows);
            });
            // use pem lainnya
            $('#list-pembayaran-lainnya').html("");
            $.each(_DATA.lainnya, function (index, data) { 
                index+=1;
                data.is_checkout = (data.is_checkout == 1) ? 1 : 0;
                show = (data.is_checkout == 1) ? 'd-none' : '';
                let rows = `<tr class="`+show+`">
                                <td>`+data.attribute_name+`</td>
                                <td><span class="badge badge-info">`+formatCurrency(data.amount)+`</span></td>
                                <td width="50">
                                    <button class="btn btn-sm btn-success btn-circle btn-add-item-lainnya" data-id="`+index+`">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>`;
                $('#list-pembayaran-lainnya').append(rows);
            });
        }
    }
    
    // TAMBAH ITEM
    let CHECKOUT = {};
    let CHECKOUT_KOMITE = [];
    $(document).on("click.ev", ".btn-add-item-komite", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        komite_temp = DATA.komite[i-1];
        komite_temp.is_checkout = 1;
        CHECKOUT_KOMITE.push(komite_temp);
        CHECKOUT.komite = CHECKOUT_KOMITE;
        loadDataCheckout(CHECKOUT);
        // DATA.komite.splice(i-1, 1);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });

    let CHECKOUT_SEMESTER = [];
    $(document).on("click.ev", ".btn-add-item-semester", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        semester_temp = DATA.semester[i-1];
        semester_temp.is_checkout = 1;
        CHECKOUT_SEMESTER.push(semester_temp);
        CHECKOUT.semester = CHECKOUT_SEMESTER;
        loadDataCheckout(CHECKOUT);
        // DATA.komite.splice(i-1, 1);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });

    let CHECKOUT_LAINNYA = [];
    $(document).on("click.ev", ".btn-add-item-lainnya", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        lainnya_temp = DATA.lainnya[i-1];
        lainnya_temp.is_checkout = 1;
        CHECKOUT_LAINNYA.push(lainnya_temp);
        CHECKOUT.lainnya = CHECKOUT_LAINNYA;
        loadDataCheckout(CHECKOUT);
        // DATA.komite.splice(i-1, 1);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });

    // END TAMBAH ITEM

    // HAPUS ITEM
    $(document).on("click.ev", ".btn-add-hapus-komite", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.komite[i-1].is_checkout = 0;
        CHECKOUT.komite.splice(i-1, 1);
        loadDataCheckout(CHECKOUT);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });
    $(document).on("click.ev", ".btn-add-hapus-semester", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.semester[i-1].is_checkout = 0;
        CHECKOUT.semester.splice(i-1, 1);
        loadDataCheckout(CHECKOUT);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });
    $(document).on("click.ev", ".btn-add-hapus-lainnya", function(e) {
        e.preventDefault();
        let i = parseInt($(this).attr('data-id'));
        DATA.lainnya[i-1].is_checkout = 0;
        CHECKOUT.lainnya.splice(i-1, 1);
        loadDataCheckout(CHECKOUT);
        showLoad();
        setTimeout(() => {
            loadDataChild(DATA);
            $(this).closest('tr').remove();
            hideLoad();
        }, 600);
    });
    // END HAPUS ITEM
    
    // cetak
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
            data.filter_tahun_ajaran_id = filter_tahun_ajaran_id;
            data.filter_lembaga_id = filter_lembaga_id;
            data.filter_kelas_id = filter_kelas_id;
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
          "data": "siswa_nis"
        },
        {
          "data": "siswa_name"
        },
        {
          "data": "kelas_name"
        },
        {
          "data": "amount",
          "render": function(data, type, row){
              return `<b>`+formatCurrency(data)+`</b>`
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
          "targets": [0, 7], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
        {
          "targets": 7,
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
      resetForm("#form-pembayaran");
      $('#list-pembayaran-data').html("");
      $('#list-pembayaran').addClass('d-none');
    })
    // reset
</script>