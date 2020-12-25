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


