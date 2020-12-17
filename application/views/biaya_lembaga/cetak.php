<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @page {
            margin: 30px 15px;
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-left {
            text-align: left;
        }
        
        .text-center {
            text-align: center;
        }
        
        .table-border {
            border-collapse: collapse;
        }
        
        .table-border tr,
        .table-border tr td,
        .table-border tr th {
            border: 1px solid #dddddd;
            padding: 8px;
        }
        
        th {
            font-weight: bold;
            text-align: left!important;
        }
    </style>
</head>

<body>
    <table width="100%" class="table-border">
        <tr>
            <th width="100%" align="center">
                <h2><?= $title ?></h2>
            </th>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <th>No</th>
                        <th>Attribute Name</th>
                        <th>Attribute Tipe</th>
                        <th>Harga</th>
                    </tr>
                    <?php foreach ($biaya_lembaga_detail as $key => $bld) {?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $bld['name'] ?></td>
                            <td><?= $bld['attribute_type_name'] ?></td>
                            <td><?= number_format($bld['amount']) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>