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
                                <li class="breadcrumb-item active">Edit Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Invoice</h4>
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
                        <form action="<?= base_url('Invoice/updateInvoiceStc') ?>" method="POST">
                            <input type="hidden" name="id_invoice" id="" value="<?= $contract['id_invoice'] ?>">
                            <input type="hidden" name="" id="k_ltc" value="<?= $quantity_ltc['quantity'] ?>">
                            <input type="hidden" name="" id="saldo" value="">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-1">
                                        <b><?= $contract['company_name'] ?></b>
                                        <address class="mt-1">
                                            <?= $contract['address_c'] ?>
                                            <p>NPWP : <?= $contract['npwp_company'] ?></p>
                                        </address>
                                    </div>

                                </div><!-- end col -->
                                <div class="col-8">
                                    <div class="mt-3 float-right">
                                        <p class="m-b-10"><strong>Invoice Date : </strong> <span
                                                class="float-right"><input type="text" name="invoice_date"
                                                    class="text-right" onfocus="(this.type='date')"
                                                    onblur="(this.type='text')"
                                                    value="<?= $contract['invoice_date'] ?>"></span></p>
                                        <p class="m-b-10"><strong>Invoice No :</strong> <span class="float-right">
                                                <span>&emsp;&emsp;<?= $contract['invoice_number'] ?></span></span></p>
                                        <?php if ($contract['sp_stc'] == 3) {
                                        ?>
                                        <p class="m-b-10"><strong>Payment :&emsp;&emsp;</strong> <span
                                                class="float-right">DP <input type="text" name="dp_persen"
                                                    id="dp_persen" class="text-right" style="width:25px;"
                                                    value="<?= $contract['dp_persen'] ?>">
                                                % <?= $contract['product_name'] ?></span></p>
                                        <?php
                                        } else {
                                        ?>
                                        <input type="hidden" id="dp_persen" name="dp_persen" class="text-right"
                                            style="width:25px;" value="<?= $contract['dp_persen'] ?>">
                                        <?php
                                        } ?>

                                        <p class="m-b-10"><strong>Due Date : </strong> <span class="float-right"><input
                                                    type="text" name="due_date" class="text-right"
                                                    onfocus="(this.type='date')" onblur="(this.type='text')"
                                                    value="<?= $contract['due_date'] ?>">
                                            </span></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <h6>Kepada Yth :</h6>
                                    <b><?= $contract['mitra_name'] ?></b>
                                    <address>
                                        <?= $contract['address_m'] ?>
                                        <p>NPWP : <?= $contract['npwp_mitra'] ?></p>
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
                                                    <th style="width: 10%">UoM</th>
                                                    <th style="width: 10%">Price Value</th>
                                                    <th style="width: 10%" class="text-right">Net Sales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <?php
                                                            if ($contract['product_name'] == 'CPO') {
                                                                echo "CRUDE PALM OIL (CPO)";
                                                            } elseif ($contract['product_name'] == 'CGK') {
                                                                echo "CANGKANG (CGK)";
                                                            } elseif ($contract['product_name'] == 'PK') {
                                                                echo "PALM KERNEL (PK)";
                                                            } else {
                                                                echo "no product name ..";
                                                            }
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <?php if ($contract['sp_stc'] == 1) {
                                                    ?><td><input type="hidden" id="qty" name="qty"
                                                            value="<?= $contract['qty'] ?>" style="width:100px;">
                                                    </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <td><input type="number" id="qty" name="qty" style="width:100px;"
                                                            value="<?= $contract['qty'] ?>" required></td>
                                                    <?php
                                                    } ?>
                                                    <?php if ($contract['sp_stc'] == 1) {
                                                    ?><td><input type="hidden" name="unit"
                                                            value="<?= $contract['unit'] ?>" style="width:50px;"></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <td><input type="text" name="unit" style="width:50px;"
                                                            value="<?= $contract['unit'] ?>" readonly></td>
                                                    <?php
                                                    } ?>
                                                    <?php if ($contract['sp_stc'] == 1) {
                                                    ?><td><input type="hidden" id="price" name="price"
                                                            value="<?= $contract['price'] ?>" style="width:100px;">
                                                    </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <td><input type="number" name="price" id="price"
                                                            style="width:100px;" value="<?= $contract['price'] ?>"
                                                            required>
                                                    </td>
                                                    <?php
                                                    } ?>
                                                    <td class="text-right">
                                                        <input type="text"
                                                            style="border: none; width:100px; text-align: right;"
                                                            id="net_sales" name="net_sales"
                                                            value="<?= $contract['net_sales'] ?>" readonly>
                                                    </td>
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
                                        <p>Terbilang : <input type="text" style="border:none; width:420px;"
                                                id="terbilang" name="terbilang" value="<?= $terbilang ?>" readonly>
                                        </p>

                                        <h6 class="mt-4">Message :</h6>
                                        <textarea style="border: none; width:230px;" name="message" id="" rows="2">
                                    <?= $contract['stc_number'] ?>
                                    </textarea>

                                        <h6 class="mt-4">Alamat Rekening :</h6>
                                        <?= $contract['norek_company'] ?> (<?= $contract['bank_name_c'] ?>) <br>
                                        a/n <?= $contract['an_rek_c']  ?>

                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <p>
                                            <b>SUB-TOTAL :</b><span class="float-right mr-2">
                                                <input type="text" style="border:none; width:100px; text-align:right;"
                                                    id="sub_total" value="<?= $contract['net_sales'] ?>"
                                                    readonly></span>
                                        </p>
                                        <?php if ($contract['sp_stc'] == 3) {
                                        ?>
                                        <p><b>UANG MUKA :</b> <span class="float-right mr-2">
                                                <input type="text" name="uang_muka"
                                                    style="border:none; width:100px; text-align:right;" id="dp"
                                                    value="<?= $contract['uang_muka'] ?>" readonly></span>
                                        </p>
                                        <?php
                                        } else {
                                        ?>
                                        <input type="hidden" name="uang_muka"
                                            style="border:none; width:100px; text-align:right;" id="dp"
                                            value="<?= $contract['uang_muka'] ?>" readonly></span>
                                        <?php
                                        } ?>
                                        <p><b>DPP :</b> <span class="float-right mr-2">
                                                <input type="text" name="dpp"
                                                    style="border:none; width:100px; text-align:right;" id="dpp"
                                                    value="<?= $contract['dpp'] ?>" readonly></span></p>
                                        <p><b>PPN
                                                <?php if ($contract['ppn'] > 0) {
                                                    echo '10';
                                                ?><input type="hidden" name="ppn_on" id="ppn" value="10">
                                                <?php
                                                } else {
                                                    echo '0';
                                                ?><input type="hidden" name="ppn_on" id="ppn" value="0">
                                                <?php
                                                } ?> % :</b> <span class="float-right mr-2">
                                                <input type="text" style="border:none; width:100px; text-align:right;"
                                                    id="jml_ppn" name="ppn" value="<?= $contract['ppn'] ?>"
                                                    readonly></span>
                                        <p><b>TOTAL :</b></p>
                                        <h3>Rp. <input type="text" name="total" style="border:none; width:150px;"
                                                id="total" value="<?= $contract['total'] ?>" readonly></h3>

                                        <p class="mt-5 mb-5">Jakarta, <?= $contract['invoice_date']  ?></p><br>
                                        <p class="float-center ml-3"><?= $contract['ttd_c'] ?></p>
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
                                        class="btn btn-secondary waves-effect waves-light">Back</a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->