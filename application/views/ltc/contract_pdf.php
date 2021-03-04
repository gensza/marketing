<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak {
            width : 100px;
            height: 100px;
            background-color: lightblue;
            margin-bottom : 50px;
        }
        .title {
            text-align: center;
            text-decoration: underline;
            line-height: 4px;
        }
        .center {
            text-align: center;
        }
        .mt {
            margin-top: 20px;
        }
        .fs {
            font-size: 10pt;
        }
        .border {
        border-width: 1px;
        border-style: solid;
        border-top-color: black;
        border-bottom-color: black;
        border-left-color: white;
        border-right-color: white;
        }
        .border2 {
        border-width: 1px;
        border-style: solid;
        border-top-color: white;
        border-bottom-color: black;
        border-left-color: white;
        border-right-color: white;
        }
        .border3 {
        border-width: 1px;
        border-style: solid;
        border-top-color: white;
        border-bottom-color: black;
        border-left-color: white;
        border-right-color: white;
        }
    </style>
</head><body>

        <p class="title">KONTRAK JUAL BELI</p>
        <p class="center"><?= $ltc['ltc_number'] ?></p>

        <table width="100%">
            <tr>
                <td width="20%">TANGGAL</td>
                <td>:&nbsp;<?= $ltc['ltc_date'] ?></td>
            </tr>
         </table>

         <table width="100%" class="mt">
            <tr>
                <td>PENJUAL :</td>
                <td>PEMBELI :</td>
            </tr>
            <tr>
                <td class="fs" width="50%"><?= $ltc['address_c'] ?></td>
                <td class="fs" width="50%"><?= $ltc['address_m'] ?></td>
            </tr>
         </table>

         <table class="border" width="100%" style="margin-top: 25px; font-size: 10pt; text-align: center;">
            <tr>
                <th width="22%">JENIS BARANG</th>
                <th width="20%">KUANTITAS</th>
                <th width="5%">UNIT</th>
                <th>HARGA SATUAN</th>
                <th>ROTAL(Rp.)</th>
            </tr>
         </table>
         <table class="border2" width="100%" style="font-size: 10pt; text-align: center;">
            <tr>
                <td width="25%">
                    <?php 
                        if($ltc['product_name'] == 'CPO')
                        {
                            echo "CRUDE PALM OIL (CPO)";
                        }elseif($ltc['product_name'] == 'CGK')
                        {
                            echo "CANGKANG (CGK)";
                        }elseif($ltc['product_name'] == 'PK')
                        {
                            echo "PALM KERNEL (PK)";
                        }else{
                            echo "no product name ..";
                        }
                    ?>
                </td>
                <td width="15%">± <?= number_format($ltc['quantity'], 0, ',', '.') ?></td>
                <td width="9%"><?= $ltc['unit'] ?></td>
                <td width="21%">Rp.<?= number_format($ltc['unit_price'], 2, ',', '.'); ?></td>
                <td width="30%">Rp.<?= number_format($ltc['quantity'] * $ltc['unit_price'], 2, ',', '.'); ?></td>
            </tr>
         </table>
         <table class="border2" width="100%" style="font-size: 10pt;">
            <tr>
                <td></td>
                <td></td>
                <th width="17%" style="text-align: right;">SEBELUM PAJAK</th>
                <td width="30%" style="text-align: center;">Rp.<?= number_format($total, 2, ',', '.'); ?></td>
            </tr>
         </table>
         <table class="border2" width="100%" style="font-size: 10pt;">
            <tr>
                <td></td>
                <td></td>
                <th width="17%" style="text-align: right;">PPN <?php if($ltc['ppn'] == "on"){echo "10";}else{echo "0";} ?> %</th>
                <td width="30%" style="text-align: center;">Rp. <?= number_format($ppn, 2, ',', '.'); ?></td>
            </tr>
         </table>
         <table class="border2" width="100%" style="font-size: 10pt;">
            <tr>
                <td></td>
                <td></td>
                <th width="17%" style="text-align: right;">SETELAH PAJAK</th>
                <td width="30%" style="text-align: center;">Rp. <?= number_format($sp, 2, ',', '.'); ?></td>
            </tr>
         </table>
         
         

</body></html>