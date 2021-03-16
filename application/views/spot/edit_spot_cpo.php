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
                                        <form action="<?= base_url('Spot/updateSpot') ?>" method="POST">
                                            <input type="hidden" name="id_spot" value="<?= $spot['id_spot'] ?>">
                                            <input type="hidden" name="id_product" value="<?= $spot['id_product'] ?>">
                                            <h4 class="header-title mb-2">Form SPOT CPO</h4>
                                            <div class="row">
                                                <!-- Credit/Debit Card box-->
                                                <div class="border col-lg-12 col-12 p-3 mb-2 rounded">

                                                    <div class="row">
                                                        <div class="form-group mb-1 col-6">
                                                            <label for="">Penjual</label>
                                                            <select name="id_company" id="id_company" class="form-control" required>
                                                                <option value="<?= $spot['id_company'] ?>" selected>
                                                                    <?= $spot['company_name'] ?></option>
                                                                <option value="" disabled></option>
                                                                <?php foreach ($company as $c) : ?>
                                                                    <option value="<?= $c['id_company'] ?>">
                                                                        <?= $c['company_name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-1 col-6">
                                                            <label for="">Pembeli</label>
                                                            <select name="id_mitra" id="id_mitra" class="form-control" required>
                                                                <option value="<?= $spot['id_mitra'] ?>" selected>
                                                                    <?= $spot['mitra_name'] ?>
                                                                </option>
                                                                <option value="" disabled></option>
                                                                <?php foreach ($mitra as $m) : ?>
                                                                    <option value="<?= $m['id_mitra'] ?>">
                                                                        <?= $m['mitra_name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group mt-1 mb-1 col-6">
                                                            <label for="">Tanggal</label>
                                                            <input type="date" class="form-control" id="spot_date" name="spot_date" placeholder="Alamat Mitra" value="<?= $spot['spot_date'] ?>" required>
                                                        </div>
                                                        <div class="form-group mt-1 mb-1 col-6">
                                                            <label for="">Jenis Produk</label>
                                                            <select name="id_product" id="id_product" class="form-control bg-light" required disabled>
                                                                <option value="<?= $spot['id_product'] ?>" selected disabled>
                                                                    <?= $spot['product_name'] ?>
                                                                </option>
                                                                <option value="" disabled></option>
                                                                <?php foreach ($produk as $p) : ?>
                                                                    <option value="<?= $p['id_product'] ?>">
                                                                        <?= $p['product_name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="form-group mb-1 col-6">
                                                            <label for="">Kuantitas</label>
                                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $spot['quantity'] ?>" required>
                                                        </div>
                                                        <div class="form-group mb-1 col-6">
                                                            <label for="">Satuan</label>
                                                            <select name="unit" id="unit" class="form-control" required>
                                                                <option value="<?= $spot['unit'] ?>" selected>
                                                                    <?= $spot['unit'] ?>
                                                                </option>
                                                                <option value="" disabled></option>
                                                                <option value="GR">GR</option>
                                                                <option value="KG">KG</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="form-group mb-1 col-6">
                                                            <label for="">Harga Satuan</label>
                                                            <input type="number" class="form-control" id="unit_price" name="unit_price" value="<?= $spot['unit_price'] ?>">
                                                        </div>
                                                        <div class="custom-control custom-checkbox mt-4 ml-2">
                                                            <input type="checkbox" name="ppn" class="custom-control-input" id="customCheck6" <?php if ($spot['ppn'] == 'on') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                            <label class="custom-control-label" for="customCheck6">PPN</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="border col-lg-12 col-12 p-3 mb-3 rounded">

                                                    <div class="row mt-1">
                                                        <div class="col-lg-2 col-12">
                                                            <div class="form-group">
                                                                <label for="card-number">Jangka Waktu</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group">
                                                                <input type="date" name="leki_date" id="card-number" class="form-control" style="width: 150px;" value="<?= $spot['leki_date'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-1 mt-1 mx-sm-2">
                                                            <p style="width: 50px;">s/d</p>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group ml-1">
                                                                <input type="date" name="lekf_date" id="card-number" class="form-control" style="width: 150px;" value="<?= $spot['lekf_date'] ?>">
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
                                                            <textarea class="form-control" name="sp_notes" id="example-textarea" rows="3" placeholder="Write some note.."><?= $spot['sp_notes'] ?></textarea>
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
                                                                    <input type="number" name="cp_dp" id="card-number" class="form-control" value="<?= $spot['cp_dp'] ?>">
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
                                                                    <input type="date" name="cp_dp_date" id="card-number" class="form-control" style="width: 150px;" value="<?= $spot['cp_dp_date'] ?>">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="cp_notes" id="example-textarea" rows="3" placeholder="Write some note.."><?= $spot['cp_notes'] ?></textarea>
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
                                                                    <input type="text" name="k_ffa_max" id="card-number" class="form-control" value="<?= $spot['k_ffa_max'] ?>">
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
                                                                    <input type="text" name="k_mi_max" id="card-number" class="form-control" value="<?= $spot['k_mi_max'] ?>">
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
                                                                <input type="text" name="k_dobi_min" id="card-number" class="form-control" value="<?= $spot['k_dobi_min'] ?>">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="k_notes" id="example-textarea" rows="3" placeholder="Write some note.."><?= $spot['k_notes'] ?></textarea>
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
                                                                    <input type="text" name="pfp_ffa1" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pfp_ffa1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min1" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pfp_min1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp1" id="card-number" class="form-control" value="<?= $spot['pfp_rp1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn1" class="custom-control-input" id="customCheck1" <?php if ($spot['pfp_ppn1'] == 'on') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
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
                                                                    <input type="text" name="pfp_ffa2" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pfp_ffa2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min2" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pfp_min2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp2" id="card-number" class="form-control" value="<?= $spot['pfp_rp2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn2" class="custom-control-input" id="customCheck2" <?php if ($spot['pfp_ppn2'] == 'on') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
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
                                                                    <input type="text" name="pfp_ffa3" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pfp_ffa3'] ?>">
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
                                                                    <input type="text" name="pdb_md1" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_md1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min1" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_min1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp1" id="card-number" class="form-control" value="<?= $spot['pdb_rp1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn1" class="custom-control-input" id="customCheck3" <?php if ($spot['pdb_ppn1'] == 'on') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
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
                                                                    <input type="text" name="pdb_md2" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_md2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min2" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_min2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp2" id="card-number" class="form-control" value="<?= $spot['pdb_rp2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn2" class="custom-control-input" id="customCheck4" <?php if ($spot['pdb_ppn2'] == 'on') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
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
                                                                    <input type="text" name="pdb_md3" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_md3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min3" id="card-number" class="form-control" style="width: 65px;" value="<?= $spot['pdb_min3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp3" id="card-number" class="form-control" value="<?= $spot['pdb_rp3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn3" class="custom-control-input" id="customCheck5" <?php if ($spot['pdb_ppn3'] == 'on') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
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
                                                            <textarea class="form-control" name="mip_notes" id="example-textarea" rows="3" placeholder="Write some note.."><?= $spot['mip_notes'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-2">
                                                            <label for="">Lainya</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="mip_lainya" id="example-textarea" rows="3" placeholder="Write some note.."><?= $spot['mip_lainya'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-6">
                                                            <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                                <i class="mdi mdi-arrow-left"></i> Back to Data Spot
                                                            </a>
                                                        </div> <!-- end col -->
                                                        <div class="col-6">
                                                            <div class="text-sm-right">
                                                                <button type="submit" class="btn btn-success">SAVE</button>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                </div>

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