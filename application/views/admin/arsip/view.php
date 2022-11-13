<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-body">
                <div><?= $this->session->flashdata('msg') ?></div>
                <div>
                    <a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/addArsip'); ?>">
                        <i class=" fas fa-plus mr-2"></i>Tambah Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-right">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Date Created</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr class="text-right">
                                <td><?= $no++ ?></td>
                                <td><?= $p->kode_barang ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td><?= $p->jumlah_barang ?></td>
                                <td><?= $p->date_created ?></td>
                                <td>
                                    <a href="<?= base_url('admin/detailArsip/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Detail">
                                        <i class="fas fa-info-circle"></i>
                                    </a>

                                    <!-- Jika Keduanya Approved-->
                                    <?php if (($p->status_1 == 'Approved' && $p->status_2 == 'Approved') AND ($p->status_3 == 'Approved' && $p->status_4 == 'Approved')) : ?>
                                    <a href="<?= base_url('admin/editArsip/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary"> Edit
                                    </a>
                                    <a href="<?= base_url('admin/deleteArchive/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger delete-button"> Delete
                                    </a>

                                    <!-- Jika Keduanya Pending-->
                                    <?php elseif (($p->status_1 == 'Pending' || $p->status_2 == 'Pending') AND ($p->status_3 == 'Pending' || $p->status_4 == 'Pending')) : ?>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>

                                    <!-- Jika Edit Approved, Tetapi Delete satunya Pending-->
                                    <?php elseif (($p->status_1 && $p->status_2 == 'Approved') AND ($p->status_3 == 'Pending' || $p->status_4 == 'Pending')) : ?>
                                    <a href="<?= base_url('admin/editArsip/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary"> Edit
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>

                                    <!-- Jika Delete Approved, Tetapi Edit satunya Pending-->
                                    <?php elseif (($p->status_1 == 'Pending' || $p->status_2 == 'Pending') AND ($p->status_3 == 'Approved' && $p->status_4 == 'Approved')) : ?>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>
                                    <a href="<?= base_url('admin/deleteArchive/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger delete-button"> Delete
                                    </a>

                                    <!-- Jika req edit salah 1 approved, blom req delete-->
                                    <?php elseif (($p->status_1 == 'Approved' && $p->status_2 == 'Pending') || ($p->status_1 == 'Pending' && $p->status_2 == 'Approved')) : ?>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger Req_Delete-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Cancel">
                                        <i class="fas fa-times"></i>
                                    </a>

                                    <!-- Jika req delete salah 1 approved, blom req edit-->
                                    <?php elseif (($p->status_3 == 'Approved' && $p->status_4 == 'Pending') || ($p->status_3 == 'Pending' && $p->status_4 == 'Approved')) : ?>
                                    <a href="<?= base_url('admin/reqEdit/' . $p->id_barang) ?>"
                                        class="btn btn-sm btn-warning Req_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>

                                    <!-- Jika req edit keduanya approved, blom req delete-->
                                    <?php elseif ($p->status_1 && $p->status_2 == 'Approved') : ?>
                                    <a href="<?= base_url('admin/editArsip/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary"> Edit
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>

                                    <!-- Jika req delete keduanya approved, blom req edit-->
                                    <?php elseif ($p->status_3 && $p->status_4 == 'Approved') : ?>
                                    <a href="<?= base_url('admin/reqEdit/' . $p->id_barang) ?>"
                                        class="btn btn-sm btn-warning Req_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/deleteArchive/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger delete-button"> Delete
                                    </a>

                                    <!-- Jika req edit keduanya Pending, blom req delete-->
                                    <?php elseif ($p->status_1 && $p->status_2 == 'Pending') : ?>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger Req_Delete-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Cancel">
                                        <i class="fas fa-times"></i>
                                    </a>

                                    <!-- Jika req delete keduanya Pending, blom req edit-->
                                    <?php elseif ($p->status_3 && $p->status_4 == 'Pending') : ?>
                                    <a href="<?= base_url('admin/reqEdit/' . $p->id_barang) ?>"
                                        class="btn btn-sm btn-warning Req_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Waiting">
                                        <i class="fas fa-pause"></i>
                                    </a>

                                    <?php else: ?>
                                    <a href="<?= base_url('admin/reqEdit/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-warning Req_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger Req_Delete-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Request Cancel">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->