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
                                <li class="breadcrumb-item active">LTC</li>
                            </ol>
                        </div>
                        <h4 class="page-title">LTC</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-7 col-8">
                                                <form action="<?= base_url('Ltc') ?>" method="POST">
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
                                                                class="btn btn-primary btn-sm">filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-4 col-lg-5">
                                                <button class="btn btn-success btn-sm float-right" data-toggle="modal"
                                                    data-target="#modalLtc"><i
                                                        class="mdi mdi-plus"></i>Add&nbsp;LTC</button>
                                            </div>
                                        </div>
                                        <p class="mb-3 mt-1">Filter : <?= $filtered ?></p>
                                        <table id="basic-datatable" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal LTC</th>
                                                    <th>No LTC</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Qty Awal</th>
                                                    <th>Qty Akhir</th>
                                                    <th>Penjual</th>
                                                    <th>Pembeli</th>
                                                    <th>Status</th>
                                                    <th width="60px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($ltc as $l) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date('d-m-Y', strtotime($l['ltc_date'])) ?></td>
                                                    <td>
                                                        <?= $l['ltc_number'] ?><br>
                                                        <?= anchor('Ltc/detailLtc/' . $l['id_ltc'], '<button class="badge badge-light">detail</button>')  ?>
                                                    </td>
                                                    <td><?= $l['product_name'] ?></td>
                                                    <td><?= $l['initial_quantity'] ?></td>
                                                    <td><?= $l['quantity'] ?></td>
                                                    <td><?= $l['company_name'] ?></td>
                                                    <td><?= $l['mitra_name'] ?></td>

                                                    <?php if ($l['ltc_status'] == 1 and $l['quantity'] > 0) {
                                                        ?>
                                                    <td>
                                                        <h4><span class="badge badge-warning">In STC</span></h4>
                                                    </td>
                                                    <?php
                                                        } elseif ($l['quantity'] == 0) {
                                                        ?>
                                                    <td>
                                                        <h4><span class="badge badge-success">Completed</span></h4>
                                                    </td>
                                                    <?php
                                                        } elseif ($l['is_active_ltc'] == 0) {
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
                                                        <div class="row">
                                                            <?= anchor('Ltc/editLtc/' . $l['id_ltc'] . '/' . $l['id_product'], '<button class="btn btn-sm btn-warning ml-1"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>')  ?>
                                                            <?php if ($l['ltc_status'] == 0) {
                                                                ?>
                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus LTC?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Ltc/deleteLtc/<?= $l['id_ltc'] ?>';
                                                                        }
                                                                    })" class="btn btn-sm btn-danger ml-1">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </button>
                                                            <?php
                                                                } else {
                                                                } ?>
                                                        </div>
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

    <!-- modal add LTC -->
    <div class="modal fade" id="modalLtc" tabindex="-1" aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New LTC</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Ltc/addLtc') ?>" method="POST">
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
                                <input type="date" class="form-control" id="ltc_date" name="ltc_date"
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
                                    placeholder="Harga satuan">
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