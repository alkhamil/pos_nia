<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    
    <style>
    .invoice-box {
        max-width: 100%;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.heading td {
        background: #eaeaea;
        border-bottom: 1px solid #000;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title" colspan="">
                                <img src="<?= base_url('assets/img/logo.png') ?>" style="width:50">
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="2">
                    Nomor: <?= $code ?><br>
                    Tanggal: <?= $tanggal ?><br>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Nama Penerima : <?= $receive_name ?><br>
                                Pemberi Izin : <?= $approval_name ?> <br>
                                Tahun Ajaran : <?= $tahun_name ?><br>
                                Lembaga : <?= $lembaga_name ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td class="text-center" style="width: 25%;">
                    Nama
                </td>
                <td class="text-center" style="width: 25%;">
                    Type
                </td>
                <td class="text-center" style="width: 30%;">
                    Deskripsi
                </td>
                <td class="text-center" style="width: 20%;">
                    Harga
                </td>
            </tr>
            <tr class="item">
                <td>[<b><?= $kebutuhan_name ?></b>]</td>
                <td><?= $kebutuhan_type ?></td>
                <td><?= $desc?></td>
                <td>Rp. <?= number_format($amount) ?></td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>
                   Total: <?= number_format($amount) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">Terbilang</td>
                <td colspan="2"><b><em>"<?= ucfirst(terbilang($amount)) ?>"</em></b></td>
            </tr>
        </table>
    </div>
</body>
</html>