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
                                <li class="breadcrumb-item active">Mitra</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Mitra</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-between mb-3">
                                            <h4 class="header-title">Data Table</h4>
                                            <button class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modalMitra"><i class="mdi mdi-plus"></i> Add
                                                Mitra</button>
                                        </div>
                                        <table id="scroll-horizontal-datatable" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama Mitra</th>
                                                    <th>Alamat Mitra</th>
                                                    <th width="50px">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($mitra as $m) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $m['mitra_name'] ?></td>
                                                    <td><?= $m['address_m'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#modalEditMitra<?= $m['id_mitra'] ?>"><i
                                                                    class="mdi mdi-lead-pencil"></i></button>
                                                            <button onclick="Swal.fire({
                                                                    title: 'Hapus Mitra?',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, Hapus'
                                                                    }).then((result) => {
                                                                    if (result.value) {
                                                                        window.location.href='Mitra/deleteMitra/<?= $m['id_mitra'] ?>';
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
    <div class="modal fade" id="modalMitra" tabindex="-1" aria-labelledby="modalMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Add New Mitra</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Mitra/addMitra') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Mitra</label>
                                <input type="text" class="form-control" id="mitra_name" name="mitra_name"
                                    placeholder="Nama MItra" required>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Singkatan</label>
                                <input type="text" class="form-control" id="alias_name_m" name="alias_name_m"
                                    placeholder="Nama Singkatan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Alamat Mitra</label>
                                <input type="text" class="form-control" id="address_m" name="address_m"
                                    placeholder="Alamat Mitra">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer NPWP</label>
                                <input type="text" class="form-control" id="npwp_mitra" name="npwp_mitra"
                                    placeholder="NPWP">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer Rekening Bank</label>
                                <input type="text" class="form-control" id="norek_mitra" name="norek_mitra"
                                    placeholder="Rekening">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Atas Nama Rekening Bank</label>
                                <input type="text" class="form-control" id="an_rek_m" name="an_rek_m"
                                    placeholder="Atas Nama">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Bank</label>
                                <input type="text" class="form-control" id="bank_name_m" name="bank_name_m"
                                    placeholder="Nama Bank">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-12">
                                <label for="">Pimpinan</label>
                                <input type="text" class="form-control" id="ttd_m" name="ttd_m" placeholder="Ttd">
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
    <?php foreach ($mitra as $mit) : ?>
    <div class="modal fade" id="modalEditMitra<?= $mit['id_mitra'] ?>" tabindex="-1" aria-labelledby="modalMitraLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMitraLabel">Edit Mitra</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="<?= base_url('Mitra/editMitra') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Mitra</label>
                                <input type="hidden" name="id_mitra" value="<?= $mit['id_mitra'] ?>">
                                <input type="text" class="form-control" id="mitra_name" name="mitra_name"
                                    value="<?= $mit['mitra_name'] ?>" required>
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Singkatan</label>
                                <input type="text" class="form-control" id="alias_name_m" name="alias_name_m"
                                    value="<?= $mit['alias_name_m'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1 mb-1 col-12">
                                <label for="">Alamat Mitra</label>
                                <input type="text" class="form-control" id="address_m" name="address_m"
                                    value="<?= $mit['address_m'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer NPWP</label>
                                <input type="text" class="form-control" id="npwp_mitra" name="npwp_mitra"
                                    value="<?= $mit['npwp_mitra'] ?>">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nomer Rekening Bank</label>
                                <input type="text" class="form-control" id="norek_mitra" name="norek_mitra"
                                    value="<?= $mit['norek_mitra'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-6">
                                <label for="">Atas Nama Rekening Bank</label>
                                <input type="text" class="form-control" id="an_rek_m" name="an_rek_m"
                                    value="<?= $mit['an_rek_m'] ?>">
                            </div>
                            <div class="form-group mb-1 col-6">
                                <label for="">Nama Bank</label>
                                <input type="text" class="form-control" id="bank_name_m" name="bank_name_m"
                                    value="<?= $mit['bank_name_m'] ?>">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="form-group mb-1 col-12">
                                <label for="">Pimpinan</label>
                                <input type="text" class="form-control" id="ttd_m" name="ttd_m"
                                    value="<?= $mit['ttd_m'] ?>">
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