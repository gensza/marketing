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
                                <li class="breadcrumb-item active">Company</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Company</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-between mb-3">
                                            <h4 class="header-title">Data Table</h4>
                                            <button class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modalCompany"><i class="mdi mdi-plus"></i> Add
                                                Company</button>
                                        </div>
                                        <table id="scroll-horizontal-datatable" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Alamat Perusahaan</th>
                                                    <th width="50px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($company as $c) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $c['company_name'] ?></td>
                                                    <td><?= $c['address_c'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#modalEditCompany<?= $c['id_company'] ?>"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>
                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus Company?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Company/deleteCompany/<?= $c['id_company'] ?>';
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

    <!-- modal add mitra -->
    <div class="modal fade" id="modalCompany" tabindex="-1" aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New Company</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Company/addCompany') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Nama Perusahaan" required>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Singkatan</label>
                                <input type="text" class="form-control" id="alias_name_c" name="alias_name_c"
                                    placeholder="Nama Singkatan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Alamat Perusahaan</label>
                                <input type="text" class="form-control" id="address_c" name="address_c"
                                    placeholder="Alamat Perusahaan">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer NPWP</label>
                                <input type="text" class="form-control" id="npwp_company" name="npwp_company"
                                    placeholder="NPWP">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer Rekening Bank</label>
                                <input type="text" class="form-control" id="norek_company" name="norek_company"
                                    placeholder="Rekening">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Atas Nama Rekening Bank</label>
                                <input type="text" class="form-control" id="an_rek_c" name="an_rek_c"
                                    placeholder="Atas Nama">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Bank</label>
                                <input type="text" class="form-control" id="bank_name_c" name="bank_name_c"
                                    placeholder="Nama Bank">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-12">
                                <label for="">Pimpinan</label>
                                <input type="text" class="form-control" id="ttd_c" name="ttd_c" placeholder="Ttd">
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

    <!-- modal edit mitra -->
    <?php foreach ($company as $comp) : ?>
    <div class="modal fade" id="modalEditCompany<?= $comp['id_company'] ?>" tabindex="-1"
        aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Edit Company</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Company/editCompany') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Perusahaan</label>
                                <input type="hidden" name="id_company" value="<?= $comp['id_company'] ?>">
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    value="<?= $comp['company_name'] ?>" required>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Singkatan</label>
                                <input type="text" class="form-control" id="alias_name_c" name="alias_name_c"
                                    value="<?= $comp['alias_name_c'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Alamat perusahaan</label>
                                <input type="text" class="form-control" id="address_c" name="address_c"
                                    value="<?= $comp['address_c'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer NPWP</label>
                                <input type="text" class="form-control" id="npwp_company" name="npwp_company"
                                    value="<?= $comp['npwp_company'] ?>">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer Rekening Bank</label>
                                <input type="text" class="form-control" id="norek_company" name="norek_company"
                                    value="<?= $comp['norek_company'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Atas Nama Rekening Bank</label>
                                <input type="text" class="form-control" id="an_rek_c" name="an_rek_c"
                                    value="<?= $comp['an_rek_c'] ?>">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Bank</label>
                                <input type="text" class="form-control" id="bank_name_c" name="bank_name_c"
                                    value="<?= $comp['bank_name_c'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-12">
                                <label for="">Pimpinan</label>
                                <input type="text" class="form-control" id="ttd_c" name="ttd_c"
                                    value="<?= $comp['ttd_c'] ?>">
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