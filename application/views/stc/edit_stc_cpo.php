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
                                        <form action="<?= base_url('Stc/updateStc') ?>" method="POST">
                                            <input type="hidden" name="id_stc" value="<?= $stc['id_stc'] ?>">
                                            <input type="hidden" name="id_product" value="<?= $stc['id_product'] ?>">
                                            <input type="hidden" name="quantity_ltc" id="k_ltc" value="<?= $ltc['quantity'] ?>">
                                            <h4 class="header-title mb-2">Edit Form STC CPO</h4>
                                            <div class="row">
                                                <!-- Credit/Debit Card box-->

                                                <div class="border col-lg-12 col-12 p-3 mb-3 rounded">

                                                    <div class="row mt-1">
                                                        <div class="col-lg-2 col-4">
                                                            <div class="form-group">
                                                                <label for="card-number">Tanggal STC</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-6">
                                                            <div class="form-group">
                                                                <input type="date" name="stc_date" id="card-number" class="form-control" style="width: 150px;" value="<?= $stc['stc_date'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <div class="form-group">
                                                                <label for="card-number">Kuantitas STC</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-6">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="k_stc" name="quantity_stc" value="<?= $stc['quantity_stc'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
                                                    <hr class="mt-0">

                                                    <div class="row mt-1">
                                                        <div class="col-lg-2 col-12">
                                                            <div class="form-group">
                                                                <label for="card-number">Waktu Penyerahan</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group">
                                                                <input type="date" name="wp_1" id="card-number" class="form-control" style="width: 150px;" value="<?= $stc['wp_1'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-1 mt-1">
                                                            <p style="width: 50px;">s/d</p>
                                                        </div>
                                                        <div class="col-lg-4 col-5">
                                                            <div class="form-group">
                                                                <input type="date" name="wp_2" id="card-number" class="form-control" style="width: 150px;" value="<?= $stc['wp_2'] ?>">
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
                                                            <textarea class="form-control" name="sp" id="example-textarea" rows="3" placeholder="Write some note.."><?= $stc['sp'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline mt-3">
                                                        <input type="radio" class="custom-control-input" checked>
                                                        <label class="custom-control-label font-15 font-weight-bold" for="BillingOptRadio1">Pembayaran</label>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-3">
                                                            <label for="">Sistem Pembayaran</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="sp_stc" id="sp_stc" class="form-control">
                                                                <option value="<?= $stc['sp_stc'] ?>">
                                                                    <?php if ($stc['sp_stc'] == 2) {
                                                                        echo "100 %";
                                                                    } else if ($stc['sp_stc'] == 3) {
                                                                        echo "Pelunasan";
                                                                    } else {
                                                                    } ?>
                                                                </option>
                                                                <option value="" disabled></option>
                                                                <option value="1"></option>
                                                                <option value="2">100 %</option>
                                                                <option value="3">Pelunasan</option>
                                                            </select>
                                                        </div>
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
                                                                    <input type="number" name="p_dp" id="card-number" class="form-control" value="<?= $stc['p_dp'] ?>">
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
                                                                    <input type="date" name="p_t_dp" id="card-number" class="form-control" style="width: 150px;" value="<?= $stc['p_t_dp'] ?>">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="p_notes" id="example-textarea" rows="3"><?= $stc['p_notes'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline mt-3">
                                                        <input type="radio" class="custom-control-input" checked>
                                                        <label class="custom-control-label font-15 font-weight-bold" for="BillingOptRadio1">Spesifikasi</label>
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
                                                                    <input type="text" name="s_ffa_max" id="card-number" class="form-control" value="<?= $stc['s_ffa_max'] ?>">
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
                                                                    <input type="text" name="s_mi_max" id="card-number" class="form-control" value="<?= $stc['s_mi_max'] ?>">
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
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <input type="text" name="s_dobi_min" id="card-number" class="form-control" value="<?= $stc['s_dobi_min'] ?>">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="s_notes" id="example-textarea" rows="3"><?= $stc['s_notes'] ?></textarea>
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
                                                                    <input type="text" name="pfp_ffa1" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pfp_ffa1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min1" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pfp_min1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp1" id="card-number" class="form-control" value="<?= $stc['pfp_rp1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn1" class="custom-control-input" id="customCheck1" <?php if ($stc['pfp_ppn1'] == 'on') {
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
                                                                    <input type="text" name="pfp_ffa2" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pfp_ffa2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_min2" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pfp_min2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pfp_rp2" id="card-number" class="form-control" value="<?= $stc['pfp_rp2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pfp_ppn2" class="custom-control-input" id="customCheck2" <?php if ($stc['pfp_ppn2'] == 'on') {
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
                                                                    <input type="text" name="pfp_ffa3" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pfp_ffa3'] ?>">
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
                                                                    <input type="text" name="pdb_md1" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_md1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min1" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_min1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp1" id="card-number" class="form-control" value="<?= $stc['pdb_rp1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn1" class="custom-control-input" id="customCheck3" <?php if ($stc['pdb_ppn1'] == 'on') {
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
                                                                    <input type="text" name="pdb_md2" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_md2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min2" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_min2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp2" id="card-number" class="form-control" value="<?= $stc['pdb_rp2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn2" class="custom-control-input" id="customCheck4" <?php if ($stc['pdb_ppn2'] == 'on') {
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
                                                                    <input type="text" name="pdb_md3" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_md3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&emsp;-</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-3">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_min3" id="card-number" class="form-control" style="width: 65px;" value="<?= $stc['pdb_min3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%&nbsp;=&nbsp;Rp</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-5">
                                                                <div class="form-group">
                                                                    <input type="text" name="pdb_rp3" id="card-number" class="form-control" value="<?= $stc['pdb_rp3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>-/KG</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="pdb_ppn3" class="custom-control-input" id="customCheck5" <?php if ($stc['pdb_ppn3'] == 'on') {
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
                                                            <textarea class="form-control" name="mip_notes" id="example-textarea" rows="3" placeholder="Write some note.."><?= $stc['mip_notes'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-2">
                                                            <label for="">Lainya</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="mip_lainya" id="example-textarea" rows="3" placeholder="Write some note.."><?= $stc['mip_lainya'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-6">
                                                            <a href="<?= base_url('Stc') ?>" class="btn btn-secondary">
                                                                <i class="mdi mdi-arrow-left"></i> Back to STC
                                                            </a>
                                                        </div> <!-- end col -->
                                                        <div class="col-6">
                                                            <div class="text-sm-right">
                                                                <button type="submit" class="btn btn-success">
                                                                    SAVE</button>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                </div>
                                                <!-- end Credit/Debit Card box-->

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