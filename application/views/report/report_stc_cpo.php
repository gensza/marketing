<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report STC CPO</title>
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
            line-height: 4px;
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
        <p class="center"><?= $stc['stc_number'] ?></p>
        <p class="center">REALISASI KE <?= $no_urut ?> ATAS KTRK.<?= $data_ltc['ltc_number'] ?></p>

        <table width="100%" style="margin-top: 30px;">
            <tr>
                <td width="20%" style="font-size:10pt;">TANGGAL</td>
                <td style="font-size:10pt;">:&nbsp;<?= $stc_date ?></td>
            </tr>
         </table>

         <table width="100%" class="mt">
            <tr>
                <td style="font-size:10pt;">PENJUAL :</td>
                <td style="font-size:10pt;">PEMBELI :</td>
            </tr>
            <tr>
                <td class="fs" width="50%"><?= $stc['company_name'] ?></td>
                <td class="fs" width="50%"><?= $stc['mitra_name'] ?></td>
            </tr>
            <tr>
                <td class="fs" width="50%"><?= $stc['address_c'] ?></td>
                <td class="fs" width="50%"><?= $stc['address_m'] ?></td>
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
                        if($stc['product_name'] == 'CPO')
                        {
                            echo "CRUDE PALM OIL (CPO)";
                        }elseif($stc['product_name'] == 'CGK')
                        {
                            echo "CANGKANG (CGK)";
                        }elseif($stc['product_name'] == 'PK')
                        {
                            echo "PALM KERNEL (PK)";
                        }else{
                            echo "no product name ..";
                        }
                    ?>
                </td>
                <td width="15%">± <?= number_format($stc['quantity_stc'], 0, ',', '.') ?></td>
                <td width="9%"><?= $data_ltc['unit'] ?></td>
                <td width="21%">Rp.<?= number_format($data_ltc['unit_price'], 2, ',', '.'); ?></td>
                <td width="30%">Rp.<?= number_format($stc['quantity_stc'] * $data_ltc['unit_price'], 2, ',', '.'); ?></td>
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
                <th width="17%" style="text-align: right;">PPN <?php if($data_ltc['ppn'] == "on"){echo "10";}else{echo "0";} ?> %</th>
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
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:10pt;"><span style="font-family:Calibri;"><?= $wp_1 ?> - <?= $wp_2 ?></span></p>
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
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['sp'] ?></span></p>
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
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">DP ADALAH SEBESAR <?= $stc['p_dp'] ?> % TANGGAL <?= $p_t_dp ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['p_notes'] ?></span></p>

                        </ul>
                        <!-- <br> -->
                    </td>
                </tr>
                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">SPESIFIKASI</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <ul style="margin-top:0pt; padding-left:0pt;" type="disc">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- FFA MAX <?= $stc['s_ffa_max'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- M & I MAX <?= $stc['s_mi_max'] ?> % </span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;">- DOBI MIN <?= $stc['s_dobi_min'] ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"><?= $stc['s_notes'] ?></span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"></span></p>

                        </ul>
                    </td>
                </tr>

                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">PERSYARATAN LAINNYA</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">FFA PENALTY</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- FFA ≥ <?= $stc['pfp_ffa1'] ?> % - <?= $stc['pfp_min1'] ?> % ADALAH Rp. <?= $stc['pfp_rp1'] ?>,-/<?= $data_ltc['unit'] ?> (<?php if($stc['pfp_ppn1'] == 'on'){echo "INCLUDE PPN 10%";}else{echo "EXCLUDE PPN 10%";} ?>)</span></p>

                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- FFA ≥ <?= $stc['pfp_ffa2'] ?> % - <?= $stc['pfp_min2'] ?> % ADALAH Rp. <?= $stc['pfp_rp2'] ?>,-/<?=  $data_ltc['unit'] ?> (<?php if($stc['pfp_ppn2'] == 'on'){echo "INCLUDE PPN 10%";}else{echo "EXCLUDE PPN 10%";} ?>)</span></p>

                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- FFA ≥ <?= $stc['pfp_ffa3'] ?> %, PEMBELI BERHAK MENOLAK / MENERIMA DENGAN NEGOSIASI ULANG</span></p>

                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">DOBI PINALTY</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- MUTU DOBI ≥ <?= $stc['pdb_md1'] ?> - <?= $stc['pdb_min1'] ?>, DIKLAIM Rp. <?= $stc['pdb_rp1'] ?>,-/<?=  $data_ltc['unit'] ?> (<?php if($stc['pdb_ppn1'] == 'on'){echo "INCLUDE PPN 10%";}else{echo "EXCLUDE PPN 10%";} ?>)</span></p>

                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- MUTU DOBI ≥ <?= $stc['pdb_md2'] ?> - <?= $stc['pdb_min2'] ?>, DIKLAIM Rp. <?= $stc['pdb_rp2'] ?>,-/<?=  $data_ltc['unit'] ?> (<?php if($stc['pdb_ppn2'] == 'on'){echo "INCLUDE PPN 10%";}else{echo "EXCLUDE PPN 10%";} ?>)</span></p>

                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">- MUTU DOBI ≥ <?= $stc['pdb_md3'] ?> - <?= $stc['pdb_min3'] ?>, DIKLAIM Rp. <?= $stc['pdb_rp3'] ?>,-/<?=  $data_ltc['unit'] ?> (<?php if($stc['pdb_ppn3'] == 'on'){echo "INCLUDE PPN 10%";}else{echo "EXCLUDE PPN 10%";} ?>)</span></p>
                        <p style="margin-top:5pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">M & I PINALTY</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"><?= $stc['mip_notes'] ?></span></p>
                    </td>
                </tr>


                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:10pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">LAINNYA</span></p>
                    </td>
                    <td style="width:8.8pt; border:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:10pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; border-bottom:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <ul style="margin-top:10pt; padding-left:0pt;" type="disc">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:Calibri;"><?= $stc['mip_lainya'] ?></span></p>
                        </ul>
                        <br>
                    </td>
                </tr>
            </table>

            <p style="font-size:10pt">
            KONTRAK JUAL BELI INI MERUPAKAN SATU KESATUAN DAN BAGIAN YANG TIDAK TERPISAHKAN DARI PERJANJIAN POKOK NO. <?= $data_ltc['ltc_number'] ?> (<?= date('d-m-Y', strtotime($data_ltc['ltc_date'])) ?>) OLEH KARENANYA KONTRAK JUAL BELI INI TUNDUK PADA SYARAT-SYARAT DAN KETENTUAN-KETENTUAN SEBAGAIMANA DIATUR DALAM PERJANJIAN POKOK           
            </p>

            <table style="margin-left: -8pt;">
                <tr style="height:24.7pt;">
                    <td style="width:139.45pt; border-top:0.75pt solid #ffffff; border-right:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">PEMBAYARAN&nbsp;</span></p>
                    </td>
                    <td style="vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">:</span></p>
                    </td>
                    <td style="width:315.25pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['an_rek_c'] ?></span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['bank_name_c'] ?></span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Calibri;">A/C NO: <?= $stc['norek_company'] ?> (IDR)</span></p>
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
                        <?= $stc['company_name'] ?>
                    </td>
                    <td style="text-align: center; font-size:10pt;">
                        <?= $stc['mitra_name'] ?>
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
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['ttd_c'] ?></span></p>
                    </td>
                    <td style="width:259.7pt; border-top:0.75pt solid #ffffff; border-left:0.75pt solid #ffffff; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffffff;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;"><?= $stc['ttd_m'] ?></span></p>
                    </td>
                </tr>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Calibri;">&nbsp;</span></p>   
</body></html>