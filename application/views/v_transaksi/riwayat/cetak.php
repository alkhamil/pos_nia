<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    
    <style>
    
    </style>
</head>

<body>
    <div class="invoice-boxs">
        <table cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= base_url('assets/img/logo.png') ?>" style="width:50">
                            </td>
                            
                            <td>
                                <i>Filter Berdasarkan : <br></i>
                                <?= ($tahun_ajaran_name) ? 'Tahun Ajaran: '.$tahun_ajaran_name.'<br>' : ''?>
                                <?= ($lembaga_name) ? 'Lembaga: '.$lembaga_name.'<br>' : ''?>
                                <?= ($siswa_name) ? 'Nama Siswa: '.$siswa_name.'<br>' : ''?>
                                <?= ($kelas_name) ? 'Kelas: '.$kelas_name.'<br>' : ''?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="invoice-boxs">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun Ajaran</th>
                <th>Lembaga</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
            <?php $grand_total=0; foreach ($data as $key => $item) { $grand_total+=$item['amount'] ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $item['code'] ?></td>
                    <td><?= $item['siswa_name'] ?></td>
                    <td><?= $item['kelas_name'] ?></td>
                    <td><?= $item['tahun_ajaran_name'] ?></td>
                    <td><?= $item['lembaga_name'] ?></td>
                    <td><?= date('d-M-Y', strtotime($item['created_at'])) ?></td>
                    <td  align="right"><?= number_format($item['amount']) ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="7" align="right"><b>Grand Total</b></td>
                <td align="right"><b><?= number_format($grand_total) ?></b></td>
            </tr>
        </table>
    </div>
</body>
</html>