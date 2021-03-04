<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Invoice</li>
                                <li class="breadcrumb-item active">Re-print Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Re-print Invoice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo">
                                            <img src="<?= base_url() ?>/assets/images/logo_msal_transparat.gif" alt=""
                                                height="22">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <h4 class="m-0 d-print-none">INVOICE (BILLING)</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="mt-1">
                                    <b><?= $company['company_name'] ?></b>
                                    <address class="mt-1">
                                        <?= $company['address_c'] ?>
                                        <p>NPWP : <?= $company['npwp_company'] ?></p>
                                    </address>
                                </div>

                            </div><!-- end col -->
                            <div class="col-8">
                                <div class="mt-3 float-right">
                                    <p class="m-b-10"><strong>Invoice Date : </strong> <span
                                            class="float-right"><?= $invoice_date ?></span></p>
                                    <p class="m-b-10"><strong>Invoice No :</strong> <span class="float-right">
                                            <span>&emsp;&emsp;<?= $print['invoice_number'] ?></span></span></p>
                                    <?php if ($print['sp_stc'] == 3) {
                                    ?>
                                    <p class="m-b-10"><strong>Payment :&emsp;&emsp;</strong> <span
                                            class="float-right">DP <?= $print['dp_persen'] ?>
                                            % <?= $product['product_name'] ?></span></p>
                                    <?php
                                    } else {
                                    } ?>
                                    <p class="m-b-10"><strong>Due Date : </strong> <span
                                            class="float-right"><?= $due_date ?></span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Kepada Yth :</h6>
                                <b><?= $mitra['mitra_name'] ?></b>
                                <address>
                                    <?= $mitra['address_m'] ?>
                                    <p>NPWP : <?= $mitra['npwp_mitra'] ?></p>
                                </address>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-1 table-centered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th style="width: 10%">Quantity</th>
                                                <th style="width: 7%">UoM</th>
                                                <th style="width: 13%">Price&nbsp;Value</th>
                                                <th style="width: 18%" class="text-right">Net Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <?php
                                                        if ($product['product_name'] == 'CPO') {
                                                            echo "CRUDE PALM OIL (CPO)";
                                                        } elseif ($product['product_name'] == 'CGK') {
                                                            echo "CANGKANG (CGK)";
                                                        } elseif ($product['product_name'] == 'PK') {
                                                            echo "PALM KERNEL (PK)";
                                                        } else {
                                                            echo "no product name ..";
                                                        }
                                                        ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php if ($print['sp_stc'] == 1) {
                                                    } else {
                                                        if ($print['qty'] == NULL) {
                                                        } else {
                                                            echo number_format($print['qty'], 0, ',', '.');
                                                        }
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if ($print['sp_stc'] == 1) {
                                                    } else {
                                                        echo $print['unit'];
                                                    } ?>
                                                <td>
                                                    <?php if ($print['sp_stc'] == 1) {
                                                    } else {
                                                        if ($print['price'] == NULL) {
                                                        } else {
                                                            echo "Rp. " . number_format($print['price'], 2, ',', '.');
                                                        }
                                                    } ?>
                                                </td>
                                                <td class="text-right">Rp.
                                                    <?= number_format($print['net_sales'], 2, ',', '.'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6 mt-5">
                                <div class="clearfix">
                                    <p>Terbilang : <?= $terbilang ?> Rupiah</p>

                                    <h6 class="mt-4">Message :</h6>
                                    <?= $print['message'] ?>

                                    <h6 class="mt-4">Alamat Rekening :</h6>
                                    <?= $company['norek_company'] ?> (<?= $company['bank_name_c'] ?>) <br>
                                    a/n <?= $company['an_rek_c']  ?>

                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-right">
                                    <p>
                                        <b>SUB-TOTAL :</b>&emsp;&emsp;&emsp;&emsp;&emsp;<span
                                            class="float-right mr-2"><?= number_format($print['net_sales'], 2, ',', '.'); ?></span>
                                    </p>
                                    <?php if ($print['sp_stc'] == 3) {
                                    ?>
                                    <p><b>UANG MUKA :</b> <span
                                            class="float-right mr-2"><?= number_format($print['uang_muka'], 2, ',', '.'); ?></span>
                                    </p>
                                    <?php
                                    } else {
                                    } ?>
                                    <p><b>DPP :</b> <span
                                            class="float-right mr-2"><?= number_format($print['dpp'], 2, ',', '.'); ?></span>
                                    </p>
                                    <p><b>PPN
                                            <?php
                                            if ($print['ppn'] > '0') {
                                                echo '10';
                                            } else {
                                                echo '0';
                                            } ?> % :</b> <span
                                            class="float-right mr-2"><?= number_format($print['ppn'], 2, ',', '.'); ?></span>
                                    <p><b>TOTAL :</b></p>
                                    <h3>Rp. <?= number_format($print['total'], 2, ',', '.'); ?></h3><br><br>

                                    <p class="mt-5 mb-5">Jakarta, <?= $print['invoice_date'] ?></p><br><br>
                                    <p class="float-center ml-3"><?= $company['ttd_c'] ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <p class="mt-5">NB : - Pembayaran dengan Cheque / Giro Bilyet dianggap sah setelah uang
                            diterima
                            dalam
                            rekening kami <br>&emsp;&emsp;- Harap Cheque / Giro Bilyet ditujukan atas nama
                            perusahaan
                            kami</p>

                        <div class="mt-2 mb-1">
                            <div class="text-right d-print-none">
                                <a href="<?= base_url('Invoice') ?>"
                                    class="btn btn-info waves-effect waves-light">Back</a>
                                <button onclick="window.print()" class="btn btn-danger waves-effect waves-light"><i
                                        class="mdi mdi-printer mr-1"></i>
                                    Print</button>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->