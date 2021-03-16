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
                                            <h4 class="header-title mb-2">Edit Form STC CGK</h4>
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
                                                                    <input type="text" name="s_ffa_max" id="card-number" class="form-control" value="<?= $stc['s_ffa_max'] ?>" \>
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->

                                                        <div class="row col-6 mt-2 ml-2">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">Kadar Kotoran</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="text" name="s_dirt_level" id="card-number" class="form-control" value="<?= $stc['s_dirt_level'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="row col-6 mt-2">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">Kadar Air</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="text" name="s_water_level" id="card-number" class="form-control" value="<?= $stc['s_water_level'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <div class="row col-6 mt-2 ml-2">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="card-number">Rendemen</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group ml-1">
                                                                    <input type="text" name="s_rendemen" id="card-number" class="form-control" value="<?= $stc['s_rendemen'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-0">
                                                                <div class="form-group">
                                                                    <label for="card-number"><b>%</b></label>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Notes</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="s_notes" id="example-textarea" rows="3"><?= $stc['s_notes'] ?></textarea>
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