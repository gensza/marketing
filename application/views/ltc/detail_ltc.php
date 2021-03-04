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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contract</a></li>
                                <li class="breadcrumb-item">LTC</li>
                                <li class="breadcrumb-item active">Detail LTC</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail LTC</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

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
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->

    </div> <!-- content -->

    