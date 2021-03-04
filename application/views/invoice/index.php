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
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Invoice</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-7 col-8">
                                                <form action="<?= base_url('Invoice') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-9 col-lg-4">
                                                            <select name="filter" id="category" class="form-control">
                                                                <option selected disabled>- Select Company - </option>
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
                                                        class="mdi mdi-plus"></i>Add&nbsp;Invoice</button>
                                            </div>
                                        </div>
                                        <p class="mb-3 mt-1">Filter : <?= $filtered ?></p>

                                        <table id="scroll-horizontal-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Invoice</th>
                                                    <th>No Invoice</th>
                                                    <th>No kontrak</th>
                                                    <th>Jenis Kontrak</th>
                                                    <th>Sistem Pembayaran</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kuantitas</th>
                                                    <th>Total</th>
                                                    <th>Penjual</th>
                                                    <th>Pembeli</th>
                                                    <th width="100px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($invoice as $i) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $i['invoice_date'] ?></td>
                                                    <td><?= $i['invoice_number'] ?></td>
                                                    <td><?= $i['contract_number'] ?></td>
                                                    <td>
                                                        <?php if ($i['contract_type'] == 'stc') {
                                                                echo "STC";
                                                            } else {
                                                                echo "SPOT";
                                                            } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($i['sp_stc'] == 2) {
                                                                echo "<h4><span class='badge badge-info'>100 %</span></h4>";
                                                            } else if ($i['sp_stc'] == 3) {
                                                                echo "<h4><span class='badge badge-success'>Pelunasan</span></h4>";
                                                            } else {
                                                            } ?>
                                                    </td>
                                                    <td><?= $i['product_name'] ?></td>
                                                    <td><?= $i['qty'] ?></td>
                                                    <td>Rp.<?= number_format($i['total'], 2, ',', '.') ?></td>
                                                    <td><?= $i['company_name'] ?></td>
                                                    <td><?= $i['mitra_name'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <?= anchor('Invoice/rePrint/' . $i['id_invoice'] . '/' . $i['contract_type'], '<button class="btn btn-sm btn-info"><i
                                                                    class="mdi mdi-file-pdf-outline"></i></button>') ?>
                                                            <?= anchor('Invoice/editInvoice/' . $i['id_invoice'] . '/' . $i['contract_type'], '<button class="btn btn-sm btn-warning ml-1"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>') ?>
                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus Invoice?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Invoice/deleteInvoice/<?= $i['id_invoice'] ?>';
                                                                        }
                                                                    })" class="btn btn-sm btn-danger ml-1">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </button>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New Invoice</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Invoice/pilih_kontrak') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kontrak</label>
                            <select class="form-control" name="contract" id="contract" required>
                                <option value="">- select contract -</option>
                                <option value="2">STC</option>
                                <option value="3">SPOT</option>
                            </select>
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