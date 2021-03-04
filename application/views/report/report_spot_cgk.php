<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report SPOT CGK</title>
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
        <p class="center"><?= $spot['spot_number'] ?></p>

        <table width="100%">
            <tr>
                <td width="20%" style="font-size:10pt;">TANGGAL</td>
                <td style="font-size:10pt;">:&nbsp;<?= $spot_date ?></td>
            </tr>
         </table>

         <table width="100%" class="mt">
            <tr>
                <td style="font-size:10pt;">PENJUAL :</td>
                <td style="font-size:10pt;">PEMBELI :</td>
            </tr>
            <tr>
                <td class="fs" width="50%"><?= $spot['company_name'] ?></td>
                <td class="fs" width="50%"><?= $spot['mitra_name'] ?></td>
            </tr>
            <tr>
                <td class="fs" width="50%"><?= $spot['address_c'] ?></td>
                <td class="fs" width="50%"><?= $spot['address_m'] ?></td>
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
                        if($spot['product_name'] == 'CPO')
                        {
                            echo "CRUDE PALM OIL (CPO)";
                        }elseif($spot['product_name'] == 'CGK')
                        {
                            echo "CANGKANG (CGK)";
                        }elseif($spot['product_name'] == 'PK')
                        {
                            echo "PALM KERNEL (PK)";
                        }else{
                            echo "no product name ..";
                        }
                    ?>
                </td>
                <td width="15%">± <?= number_format($spot['quantity'], 0, ',', '.') ?></td>
                <td width="9%"><?= $spot['unit'] ?></td>
                <td width="21%">Rp.<?= number_format($spot['unit_price'], 2, ',', '.'); ?></td>
                <td width="30%">Rp.<?= number_format($spot['quantity'] * $spot['unit_price'], 2, ',', '.'); ?></td>
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
                <th width="17%" style="text-align: right;">PPN <?php if($spot['ppn'] == "on"){echo "10";}else{echo "0";} ?> %</th>
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

        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
        <table cellpadding="0" cellspacing="0" style="width:470.65pt; border:0.50pt solid #ffffff; border-collapse:collapse;">
            <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">JANGKA WAKTU</span></p>
                    </td>
                    <td style="width:8.8pt; border-right:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:139.45pt; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:10pt;"><span style="font-family:Calibri;"><?= $leki_date ?> - <?= $lekf_date ?></span></p>
                        <br>
                    </td>
                </tr>
                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">SYARAT PENYERAHAN</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['sp_notes'] ?></span></p>
                        <br>
                    </td>
                </tr>

                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">CARA PEMBAYARAN</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:139.45pt; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <ul style="margin-top:5pt; padding-left:0pt;" type="disc">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">DP ADALAH SEBESAR <?= $spot['cp_dp'] ?> % TANGGAl <?= $cp_dp_date ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['cp_notes'] ?></span></p>

                        </ul>
                        <!-- <br> -->
                    </td>
                </tr>
                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">KUALITAS</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <ul style="margin-top:0pt; padding-left:0pt;" type="disc">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- FFA MAX <?= $spot['k_ffa_max'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- KADAR KOTORAN <?= $spot['k_dirt_level'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- KADAR AIR <?= $spot['k_water_level'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- RENDEMEN <?= $spot['k_rendemen'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"><?= $spot['k_notes'] ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"></span></p>

                        </ul>

                    </td>
                </tr>
            
                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">PEMBAYARAN&nbsp;</span></p>
                    </td>
                    <td style="width:8.8pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['an_rek_c'] ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['bank_name_c'] ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">A/C NO: <?= $spot['norek_company'] ?> (IDR)</span></p>
             
                    </td>
                </tr>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:200%; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
        <table width="100%">
                <tr>
                    <td style="text-align: center; font-size:10pt;">
                        PENJUAL
                    </td>
                    <td style="text-align: center; font-size:10pt;">
                        PEMBELI
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size:10pt;">
                        <?= $spot['company_name'] ?>
                    </td>
                    <td style="text-align: center; font-size:10pt;">
                        <?= $spot['mitra_name'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:214.6pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffffff;">
                        <p style="margin-top:0pt; margin-bottom:60pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                    </td>
                    <td style="width:259.7pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffffff;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:214.6pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffffff;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['ttd_c'] ?></span></p>
                    </td>
                    <td style="width:259.7pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffffff;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;"><?= $spot['ttd_m'] ?></span></p>
                    </td>
                </tr>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>   
</body></html>
