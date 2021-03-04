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
                                <li class="breadcrumb-item active">STC</li>
                            </ol>
                        </div>
                        <h4 class="page-title">STC</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-7 col-8">
                                                <form action="<?= base_url('Stc') ?>" method="POST">
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
                                                                class="btn btn-info btn-sm">filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-4 col-lg-5">
                                                <a href="<?= base_url('Stc/dataLtc') ?>"
                                                    class="btn btn-success btn-sm float-right"><i
                                                        class="mdi mdi-plus"></i> Add
                                                    STC</a>
                                            </div>
                                        </div>
                                        <p class="mb-3 mt-1">Filter : <?= $filtered ?></p>

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
                                                        <?php if ($s['invoice_stc'] == 0) {
                                                            ?> <div class="row">
                                                            <?= anchor('Stc/editStc/' . $s['id_stc'] . '/' . $s['id_product'], '<button class="btn btn-sm btn-warning ml-1"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>')  ?>

                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus LTC?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Stc/deleteStc/<?= $s['id_stc'] . '/' . $s['id_ltc'] . '/' . $s['quantity_stc'] ?>';
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