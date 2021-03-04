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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-3 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-info rounded">
                                    <i class="fe-aperture avatar-title font-22 text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $ltc ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">LTC</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->

                <div class="col-md-3 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-primary rounded">
                                    <i class="fe-command avatar-title font-22 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $stc ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">STC</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->

                <div class="col-md-3 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-warning rounded">
                                    <i class="fe-stop-circle avatar-title font-22 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $spot ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">SPOT</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->

                <div class="col-md-3 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-success rounded">
                                    <i class="mdi mdi-text-box-multiple-outline avatar-title font-22 text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $invoice ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Invoice</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-danger rounded">
                                    <i class="mdi mdi-layers-outline avatar-title font-22 text-danger"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $product ?></span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Product</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->

                <div class="col-md-4 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-secondary rounded">
                                    <i class="mdi mdi-briefcase-check-outline avatar-title font-22 text-secondary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $mitra ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Mitra</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->

                <div class="col-md-4 col-xl-3">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-soft-info rounded">
                                    <i class="mdi mdi-poll avatar-title font-22 text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $company ?></span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Company</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Summary STC in LTC</h4>

                            <div id="cardCollpase5" class="collapse pt-3 show">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal LTC</th>
                                                <th>No LTC</th>
                                                <th>Kuantitas Awal</th>
                                                <th>Kuantitas Akhir</th>
                                                <th>Total STC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($count_stc as $c) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= date('d-m-Y', strtotime($c['ltc_date'])) ?></td>
                                                <td><?= $c['ltc_number'] ?></td>
                                                <td><?= number_format($c['initial_quantity'], 0, ',', '.') ?></td>
                                                <td><?= number_format($c['quantity'], 0, ',', '.') ?></td>
                                                <td><?= $c['total'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end table responsive-->
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->