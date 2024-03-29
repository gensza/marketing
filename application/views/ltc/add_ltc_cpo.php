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
                            </ol>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?= base_url('Ltc/saveLtc') ?>" method="POST">
                                            <h4 class="header-title mb-2">Form LTC CPO</h4>
                                            <div class="row">
                                                <!-- Credit/Debit Card box-->
                                                <div class="border col-lg-6 col-12 p-3 mb-3 rounded">

                                                    <div class="row mt-1">
                                                        <div class="col-lg-2 col-12">
                                                            <div class="form-group">
                                                                <label for="card-number">Jangka Waktu</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group">
                                                                <input type="date" name="leki_date" id="card-number" class="form-control" style="width: 150px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-1 mt-1 mx-sm-2">
                                                            <p style="width: 50px;">s/d</p>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group ml-1">
                                                                <input type="date" name="lekf_date" id="card-number" class="form-control" style="width: 150px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-2 col-3">
                                                            <div class="form-group">
                                                                <label for="card-number">Syarat Penyerahan</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10 col-9">
                                                            <textarea class="form-control" name="sp_notes" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline mt-3">
                                                        <input type="radio" class="custom-control-input" checked>
                                                        <label class="custom-control-label font-15 font-weight-bold" for="BillingOptRadio1">Cara Pembayaran</label>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="row col-6">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">DP</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="number" name="cp_dp" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row col-lg-6 col-12">
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">Tanggal DP</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="form-group mx-sm-4">
                                                                    <input type="date" name="cp_dp_date" id="card-number" class="form-control" style="width: 150px;">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="cp_notes" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline mt-3">
                                                        <input type="radio" class="custom-control-input" checked>
                                                        <label class="custom-control-label font-15 font-weight-bold" for="BillingOptRadio1">Kualitas</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="row col-6 mt-2">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">FFA&nbsp;Max</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="text" name="k_ffa_max" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->

                                                        <div class="row col-6 mt-2 ml-3">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">M&I&nbsp;MAX</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="text" name="k_mi_max" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label for="card-number">DOBI&nbsp;MIN</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-10">
                                                            <div class="form-group">
                                                                <input type="text" name="k_dobi_min" id="card-number" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="k_notes" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline mt-3">
                                                        <input type="radio" class="custom-control-input" checked>
                                                        <label class="custom-control-label font-15 font-weight-bold" for="BillingOptRadio1">Persyaratan</label>
                                                    </div>
                                                    <h4 class="header-title mt-2">FFA PENALTY</h4>
                                                    <div class="row">
                                                        <div class="row col-12 mt-2">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">FFA</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_ffa1" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min1" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp1" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn1" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">PPN</label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="row col-12 mt-2">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">FFA</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_ffa2" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min2" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp2" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn2" class="custom-control-input" id="customCheck2">
                                                                    <label class="custom-control-label" for="customCheck2">PPN</label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="row col-12 mt-2">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">FFA</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_ffa3" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-
                                                                        </b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-5">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>Pembeli berhak
                                                                            menolak/menerima dengan negosiasi ulang

                                                                        </b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <h4 class="header-title mt-2">DOBI PENALTY</h4>
                                                    <div class="row">
                                                        <div class="row col-12 mt-2">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">MUTU DOBI</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_md1" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min1" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp1" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn1" class="custom-control-input" id="customCheck3">
                                                                    <label class="custom-control-label" for="customCheck3">PPN</label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">MUTU DOBI</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_md2" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min2" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp2" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn2" class="custom-control-input" id="customCheck4">
                                                                    <label class="custom-control-label" for="customCheck4">PPN</label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-lg-1 col-2">
                                                                <div class="form-group">
                                                                    <label for="card-number">MUTU DOBI</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_md3" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min3" id="card-number" class="form-control" style="width: 65px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp3" id="card-number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn3" class="custom-control-input" id="customCheck5">
                                                                    <label class="custom-control-label" for="customCheck5">PPN</label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <h4 class="header-title mt-2">M&I PENALTY</h4>
                                                    <div class="row mt-2">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="mip_notes" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-2">
                                                            <label for="">Lainya</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="mip_lainya" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end Credit/Debit Card box-->

                                                <div class="col-lg-6 col-12">
                                                    <div class="border p-3 mt-lg-0 rounded">
                                                        <h4 class="header-title mb-3">Detail LTC CPO</h4>

                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Penjual :</td>
                                                                        <td><?= $company['company_name'] ?></td>
                                                                        <input type="hidden" name="id_company" value="<?= $id_company ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pembeli : </td>
                                                                        <td><?= $mitra_name['mitra_name'] ?></td>
                                                                        <input type="hidden" name="id_mitra" value="<?= $id_mitra ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal :</td>
                                                                        <td><?= date('d-m-Y', strtotime($ltc_date)) ?>
                                                                        </td>
                                                                        <input type="hidden" name="ltc_date" value="<?= $ltc_date ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>jenis Produk : </td>
                                                                        <td><?= $product_type['product_name'] ?></td>
                                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kuantitas : </td>
                                                                        <td><?= number_format($quantity, 0, ',', '.') ?>
                                                                        </td>
                                                                        <input type="hidden" name="quantity" value="<?= $quantity ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Harga Satuan&nbsp;: </td>
                                                                        <td>Rp.
                                                                            <?php if ($unit_price == NULL) {
                                                                                echo 0;
                                                                            } else {
                                                                                echo number_format($unit_price, 2, ',', '.');
                                                                            } ?>
                                                                        </td>
                                                                        <input type="hidden" name="unit_price" value="<?= $unit_price ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Satuan : </td>
                                                                        <td><?= $unit ?></td>
                                                                        <input type="hidden" name="unit" value="<?= $unit ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <td>PPN :</td>
                                                                        <td><?php if ($ppn == 'on') {
                                                                                echo "10 %";
                                                                            } ?></td>
                                                                        <input type="hidden" name="ppn" value="<?= $ppn ?>">
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Pembayaran&nbsp;:</th>
                                                                        <th><?= $company['norek_company'] . ' a/n ' . $company['an_rek_c'] ?>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end table-responsive -->
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-6">
                                                            <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                                <i class="mdi mdi-arrow-left"></i> Back to Data LTC
                                                            </a>
                                                        </div> <!-- end col -->
                                                        <div class="col-6">
                                                            <div class="text-sm-right">
                                                                <button type="submit" class="btn btn-success">
                                                                    SAVE</button>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                </div> <!-- end col -->

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->

    </div> <!-- content -->