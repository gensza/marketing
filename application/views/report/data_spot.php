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
                                <li class="breadcrumb-item active">Reports</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Reports</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <ul class="nav nav-pills navtab-bg nav-justified">
                            <li class="nav-item">
                                <a href="<?= base_url('Report') ?>" class="nav-link">
                                    LTC
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Report/dataStc') ?>" class="nav-link">
                                    STC
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Report/dataSpot') ?>" class="nav-link active">
                                    SPOT
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content mt-1">

                        <table id="basic-datatable" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal SPOT</th>
                                                    <th>No Kontrak</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Kuantitas</th>
                                                    <th>Penjual</th>
                                                    <th>Pembeli</th>
                                                    <th>Status</th>
                                                    <th width="60px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($spot as $s) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date('d-m-Y', strtotime($s['spot_date'])) ?></td>
                                                    <td><?= $s['spot_number'] ?></td>
                                                    <td><?= $s['product_name'] ?></td>
                                                    <td><?= $s['quantity'] ?></td>
                                                    <td><?= $s['company_name'] ?></td>
                                                    <td><?= $s['mitra_name'] ?></td>

                                                    <?php if ($s['spot_status'] == 2) {
                                                        ?>
                                                    <td>
                                                        <h4><span class="badge badge-success">Success</span></h4>
                                                    </td>
                                                    <?php
                                                        } elseif ($s['is_active_spot'] == 0) {
                                                        ?>
                                                    <td>
                                                        <h4><span class="badge badge-danger">Deleted</span></h4>
                                                    </td>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <td></td>
                                                    <?php
                                                        } ?>
                                                    <td>
                                                    <?= anchor('Report/reportSpot/' . $s['id_spot'], '<button class="btn btn-sm btn-danger"><i
                                                    class="mdi mdi-file-pdf-outline"></i></button>', 'target = _blank')  ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->