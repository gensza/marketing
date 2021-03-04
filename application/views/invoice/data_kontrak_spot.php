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
                                <li class="breadcrumb-item active">Data SPOT</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data SPOT</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-lg-3">
                                                <form action="<?= base_url('Invoice/pilih_kontrak') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <select name="filter" id="category" class="form-control">
                                                                <option selected disabled>- Select No SPOT - </option>
                                                                <?php foreach ($spot_filter as $s) : ?>
                                                                <option value="<?= $s['id_spot'] ?>">
                                                                    <?= $s['spot_number'] ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <input type="hidden" name="contract" value="3">
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-sm">filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <p class="mb-3 mt-1">Filter : <?= $filtered ?></p>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-6">
                                                <form action="<?= base_url('Invoice/date_filter') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <input placeholder="Filter tgl" onfocus="(this.type='date')"
                                                                onblur="(this.type='text')" class="form-control"
                                                                name="date_1" type="text" id="date" required />
                                                        </div>
                                                        <div class="col-0">
                                                            s/d
                                                        </div>
                                                        <div class="col-5">
                                                            <input placeholder="Filter tgl" onfocus="(this.type='date')"
                                                                onblur="(this.type='text')" class="form-control"
                                                                name="date_2" type="text" id="date" required />
                                                        </div>
                                                        <input type="hidden" name="contract" value="3">
                                                        <div class="col-1">
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-sm">filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <p class="mb-3 mt-1">Filter :
                                                    <?php if ($date_1 == NULL and $date_2 == NULL) {
                                                        echo "no filter detected ..";
                                                    } else {
                                                        echo date('d-m-Y', strtotime($date_1)) . ' s/d ' . date('d-m-Y', strtotime($date_2));
                                                    } ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                Data Table
                                            </div>

                                        </div>

                                        <table id="basic-datatable" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal SPOT</th>
                                                    <th>No SPOT</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Kuantitas SPOT</th>
                                                    <th>Penjual</th>
                                                    <th>Pembeli</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($data_spot as $d) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date('d-m-Y', strtotime($d['spot_date'])) ?></td>
                                                    <td><?= $d['spot_number'] ?></td>
                                                    <td><?= $d['product_name'] ?></td>
                                                    <td><?= $d['quantity'] ?></td>
                                                    <td><?= $d['company_name'] ?></td>
                                                    <td><?= $d['mitra_name'] ?></td>
                                                    <td>
                                                        <?= anchor('Invoice/viewInvoiceSpot/' . $d['id_spot'], '<button class="btn btn-sm btn-danger">Add&nbsp;Invoice</button>') ?>
                                                    </td>
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