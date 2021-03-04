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
                                <a href="<?= base_url('Report/dataStc') ?>" class="nav-link active">
                                    STC
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Report/dataSpot') ?>" class="nav-link">
                                    SPOT
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content mt-1">

                        <table id="basic-datatable" class="table dt-responsive w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal STC</th>
                                    <th>No STC</th>
                                    <th>No LTC</th>
                                    <th>Jenis Produk</th>
                                    <th>Kuantitas STC</th>
                                    <th>Penjual</th>
                                    <th>pembeli</th>
                                    <th width="60px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($stc as $s) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($s['stc_date'])) ?></td>
                                    <td><?= $s['stc_number'] ?></td>
                                    <td><?= $s['ltc_number'] ?></td>
                                    <td><?= $s['product_name'] ?></td>
                                    <td><?= $s['quantity_stc'] ?></td>
                                    <td><?= $s['company_name'] ?></td>
                                    <td><?= $s['mitra_name'] ?></td>
                                    <td>
                                    <?= anchor('Report/reportStc/' . $s['id_stc'], '<button class="btn btn-sm btn-danger"><i
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