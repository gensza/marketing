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
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Product</h4>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-between mb-3">
                                            <h4 class="header-title">Data Table</h4>
                                            <!-- <button class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modalProduct"><i class="mdi mdi-plus"></i> Add
                                                Product</button> -->
                                        </div>
                                        <table id="scroll-horizontal-datatable" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama Produk</th>
                                                    <th width="50px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($product as $p) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $p['product_name'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#modalEditProduct<?= $p['id_product'] ?>"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>
                                                            <!-- <button class="btn btn-sm btn-danger ml-1"><i
                                                                    class="mdi mdi-trash-can-outline"></i></button> -->
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

    <!-- modal add product -->
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New Product</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Product/addProduct') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Nama Produk" required>
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

    <!-- modal edit product -->
    <?php foreach ($product as $prod) : ?>
    <div class="modal fade" id="modalEditProduct<?= $prod['id_product'] ?>" tabindex="-1"
        aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Edit Product</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Product/editProduct') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Nama Product</label>
                                <input type="hidden" name="id_product" value="<?= $prod['id_product'] ?>">
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="<?= $prod['product_name'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>