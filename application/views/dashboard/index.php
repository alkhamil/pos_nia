<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Lembaga Saldo -->
    <?php foreach ($lembaga as $key => $l) { ?>
        <?php 
            $border = '' ;
            switch ($l->name) {
                case 'SMP':
                    $border = 'border-left-primary';
                    break;
                case 'MTS':
                    $border = 'border-left-success';
                    break;
                case 'SMA':
                    $border = 'border-left-info';
                    break;
                case 'SMK':
                    $border = 'border-left-warning';
                    break;
                default:
                    break;
            }    
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card <?= $border ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?= $l->name ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($l->saldo) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>

<div class="row mt-2">
    <!-- listing -->
    <div class="col-md-6">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">10 Data Pembayaran Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="data-kiri" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Code</th>
                                <th>Lembaga</th>
                                <th class="text-right">Nominal</th>
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
    <!-- listing -->
    <div class="col-md-6">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">10 Data Pengeluaran Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="data-kanan" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Code</th>
                                <th>Lembaga</th>
                                <th class="text-right">Nominal</th>
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
    // data
    showLoad();
    let table_kiri = $("#data-kiri").DataTable({
      "processing": true, 
      "serverSide": true, 
      "order": [], 
      "searchDelay": 500,
      
      "ajax": {
        "url": "<?= $data_kiri; ?>",
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
          "data": "created_at"
        },
        {
          "data": "code"
        },
        {
          "data": "lembaga_name"
        },
        {
          "data": "amount",
          "render": function(data, type, row){
              return formatCurrency(data);
          }
        },
      ],
      
      "columnDefs": [
        {
          "targets": [0, 4], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
      ],
    });

    let table_kanan = $("#data-kanan").DataTable({
      "processing": true, 
      "serverSide": true, 
      "order": [], 
      "searchDelay": 500,
      
      "ajax": {
        "url": "<?= $data_kanan; ?>",
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
          "data": "created_at"
        },
        {
          "data": "code"
        },
        {
          "data": "lembaga_name"
        },
        {
          "data": "amount",
          "render": function(data, type, row){
              return formatCurrency(data);
          }
        },
      ],
      
      "columnDefs": [
        {
          "targets": [0, 4], 
          "orderable": true, 
          "searchable": false, 
          "className": "text-center",
          "fixedColumns": true,
        },
      ],
    });
    // end data
</script>



