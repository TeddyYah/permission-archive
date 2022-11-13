<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div><?= $this->session->flashdata('msg') ?></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Req. Direktur</th>
                                <th>Req. Manager</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $p->kode_barang ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <?php if (empty($p->status_1)) : ?>
                                <td><?= "-" ?></td>
                                <?php elseif($p->status_1 == 'Approved') : ?>
                                <td><span class="badge badge-primary"><?= $p->status_1 ?></span></td>
                                <?php elseif($p->status_1 == 'Pending') : ?>
                                <td><span class="badge badge-secondary"><?= $p->status_1 ?></span></td>
                                <?php elseif($p->status_1 == 'Reject') : ?>
                                <td><span class="badge badge-danger"><?= $p->status_1 ?></span></td>
                                <?php elseif($p->status_1 == 'Expired') : ?>
                                <td><span class="badge badge-danger"><?= $p->status_1 ?></span></td>
                                <?php endif; ?>
                                <?php if (empty($p->status_2)) : ?>
                                <td><?= "-" ?></td>
                                <?php elseif($p->status_2 == 'Approved') : ?>
                                <td><span class="badge badge-primary"><?= $p->status_2 ?></span></td>
                                <?php elseif($p->status_2 == 'Pending') : ?>
                                <td><span class="badge badge-secondary"><?= $p->status_2 ?></span></td>
                                <?php elseif($p->status_2 == 'Reject') : ?>
                                <td><span class="badge badge-danger"><?= $p->status_2 ?></span></td>
                                <?php endif; ?>
                                <td>
                                    <!-- Jika Keduanya Approved-->
                                    <?php if ($p->status_1 == 'Approved' && $p->status_2 == 'Approved') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/editArsip/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"> Editing</i>
                                    </a>
                                    <!-- Jika Keduanya Pending-->
                                    <?php elseif ($p->status_1 == 'Pending' && $p->status_2 == 'Pending') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-pause"> Waiting</i>
                                    </a>
                                    <!-- Jika Keduanya Reject-->
                                    <?php elseif ($p->status_1 == 'Reject' && $p->status_2 == 'Reject') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqEdit/') . $p->id_barang; ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <!-- Jika salah satu Approved atau Pending-->
                                    <?php elseif (($p->status_1 == 'Approved' && $p->status_2 == 'Pending') || ($p->status_1 == 'Pending' && $p->status_2 == 'Approved')): ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-pause"> Waiting</i>
                                    </a>
                                    <!-- Jika salah satu Approved atau Reject-->
                                    <?php elseif (($p->status_1 == 'Approved' && $p->status_2 == 'Reject') || ($p->status_1 == 'Reject' && $p->status_2 == 'Approved')) : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqEdit/') . $p->id_barang; ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <!-- Jika salah satu Pending atau Reject-->
                                    <?php elseif (($p->status_1 == 'Pending' && $p->status_2 == 'Reject') || ($p->status_1 == 'Reject' && $p->status_2 == 'Pending')) : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqEdit/') . $p->id_barang; ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <?php else: ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <?php if (empty($p->dc_barang_keluar)) : ?>
                                    <a href="<?= base_url('admin/reqEdit/') . $p->id_barang; ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Request</i>
                                    </a>
                                    <?php endif; ?>
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
</div>
<!-- /.container-fluid -->