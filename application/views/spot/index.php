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
                                <li class="breadcrumb-item active">Spot</li>
                            </ol>
                        </div>
                        <h4 class="page-title">SPOT</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-8">
                                                <form action="<?= base_url('Spot') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-9 col-lg-4">
                                                            <select name="filter" id="category" class="form-control">
                                                                <option selected disabled>- Select company - </option>
                                                                <?php foreach ($company as $c) : ?>
                                                                <option value="<?= $c['id_company'] ?>">
                                                                    <?= $c['company_name'] ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-3 col-lg-2">
                                                            <button type="submit"
                                                                class="btn btn-warning btn-sm">filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-4 col-lg-5">
                                                <button class="btn btn-success btn-sm float-right" data-toggle="modal"
                                                    data-target="#modalSpot"><i
                                                        class="mdi mdi-plus"></i>Add&nbsp;SPOT</button>
                                            </div>
                                        </div>
                                        <p class="mb-3 mt-1">Filter : <?= $filtered ?></p>

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
                                                        <?php if ($s['invoice_spot'] == 0) {
                                                            ?>
                                                        <div class="row">
                                                            <?= anchor('Spot/editSpot/' . $s['id_spot'] . '/' . $s['id_product'], '<button class="btn btn-sm btn-warning ml-1"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>')  ?>
                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus LTC?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Spot/deleteSpot/<?= $s['id_spot'] ?>';
                                                                        }
                                                                    })" class="btn btn-sm btn-danger ml-1">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </button>
                                                        </div>
                                                        <?php
                                                            } else {
                                                                echo "<h2><span class='badge badge-success'><i class='mdi mdi-text-box-check-outline'></i></span></h2>";
                                                            } ?>
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

    <!-- modal add spot -->
    <div class="modal fade" id="modalSpot" tabindex="-1" aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New spot</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Spot/addSpot') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-1 col-6">
                                <label for="">Penjual</label>
                                <select name="id_company" id="id_company" class="form-control" required>
                                    <option value="" selected disabled>- Pilih penjual -</option>
                                    <?php foreach ($company as $c) : ?>
                                    <option value="<?= $c['id_company'] ?>"><?= $c['company_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Pembeli</label>
                                <select name="id_mitra" id="id_mitra" class="form-control" required>
                                    <option value="" selected disabled>- Pilih pembeli -</option>
                                    <?php foreach ($mitra as $m) : ?>
                                    <option value="<?= $m['id_mitra'] ?>"><?= $m['mitra_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-6">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" id="spot_date" name="spot_date"
                                    placeholder="Alamat Mitra" required>
                            </div>
                            <div class="form-group mt-1 mb-1 col-6">
                                <label for="">Jenis Produk</label>
                                <select name="id_product" id="id_product" class="form-control" required>
                                    <option value="" selected disabled>- Pilih produk -</option>
                                    <?php foreach ($produk as $p) : ?>
                                    <option value="<?= $p['id_product'] ?>"><?= $p['product_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Kuantitas</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Kuantitas" required>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Satuan</label>
                                <select name="unit" id="unit" class="form-control" required>
                                    <option value="" selected disabled>- Pilih satuan -</option>
                                    <option value="GR">GR</option>
                                    <option value="KG">KG</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Harga Satuan</label>
                                <input type="number" class="form-control" id="unit_price" name="unit_price"
                                    placeholder="Harga satuan" required>
                            </div>
                            <div class="custom-control custom-checkbox mt-4 ml-2">
                                <input type="checkbox" name="ppn" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">PPN</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>