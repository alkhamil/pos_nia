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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="accordion" id="accordionRiwayatPembayaran">
                            <?php if (count($data) > 0) { ?>
                                <?php foreach ($data as $key => $item) { ?>
                                    <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                        <div class="card-header bg-info" id="headingRiwayatPembayaran<?= $key ?>">
                                            <h6 class="mb-0">
                                                <button class="btn btn-success btn-circle btn-sm btn-change" type="button" data-toggle="collapse" data-target="#collapseRiwayatPembayaran<?= $key ?>" aria-expanded="true" aria-controls="collapseRiwayatPembayaran<?= $key ?>">
                                                    <i class="fa fa-eye-slash fa-fw"></i>
                                                </button>
                                                <strong class="ml-2 text-white">Code : <?= $item->code ?></strong>
                                                <strong class="float-right text-white">Tanggal : <?= date('d-M-Y', strtotime($item->created_at)) ?> / Total : <?= number_format($item->amount) ?></strong>
                                            </h6>
                                        </div>

                                        <div id="collapseRiwayatPembayaran<?= $key ?>" class="collapse <?= ($key==0) ? 'show' : '' ?> " aria-labelledby="headingRiwayatPembayaran<?= $key ?>" data-parent="#accordionRiwayatPembayaran">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                            <div class="card-header bg-info" id="heading">
                                                                <h6 class="m-0 text-center">
                                                                    <strong class="text-white">Komite</strong>
                                                                </h6>
                                                            </div>

                                                            <div class="card-body">
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Harga</th>
                                                                            <th>Terbayar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($item->pembayaran['komite'] as $key => $komite) {  ?>
                                                                            <?php if ((int)$komite['is_checkout'] == 1) { ?>
                                                                                <tr>
                                                                                    <td><?= $key+1 ?></td>
                                                                                    <td><?= $komite['attribute_name'] ?></td>
                                                                                    <td><span class="badge badge-info"><?= number_format($komite['amount']) ?></span></td>
                                                                                    <td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                            <div class="card-header bg-info" id="heading">
                                                                <h6 class="m-0 text-center">
                                                                    <strong class="text-white">Semester</strong>
                                                                </h6>
                                                            </div>

                                                            <div class="card-body">
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Harga</th>
                                                                            <th>Terbayar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($item->pembayaran['semester'] as $key => $semester) {  ?>
                                                                            <?php if ((int)$semester['is_checkout'] == 1) { ?>
                                                                                <tr>
                                                                                    <td><?= $key+1 ?></td>
                                                                                    <td><?= $semester['attribute_name'] ?></td>
                                                                                    <td><span class="badge badge-info"><?= number_format($semester['amount']) ?></span></td>
                                                                                    <td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card shadow border-top-0 border-left-0 border-right-0 border-bottom border-white">
                                                            <div class="card-header bg-info" id="heading">
                                                                <h6 class="m-0 text-center">
                                                                    <strong class="text-white">Lainnya</strong>
                                                                </h6>
                                                            </div>

                                                            <div class="card-body">
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Harga</th>
                                                                            <th>Terbayar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($item->pembayaran['lainnya'] as $key => $lainnya) {  ?>
                                                                            <?php if ((int)$lainnya['is_checkout'] == 1) { ?>
                                                                                <tr>
                                                                                    <td><?= $key+1 ?></td>
                                                                                    <td><?= $lainnya['attribute_name'] ?></td>
                                                                                    <td><span class="badge badge-info"><?= number_format($lainnya['amount']) ?></span></td>
                                                                                    <td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php }else { ?>
                                <h3 class="text-center">Data tidak ditemukan :(</h3>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end listing -->
</div>


<script>
    showLoad();

    setTimeout(() => {
        hideLoad();
    }, 1000);
    $(document).ready(function(){
        $start = $('#accordionRiwayatPembayaran');
        // Add minus icon for collapse element which is open by default
        $start.find(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-eye").removeClass("fa-eye-slash");
        });
        // Toggle plus minus icon on show hide of collapse element
        $start.find(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
        });
    });
</script>