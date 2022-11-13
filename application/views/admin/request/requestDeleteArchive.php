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
                                <?php if (empty($p->status_3)) : ?>
                                <td><?= "-" ?></td>
                                <?php elseif($p->status_3 == 'Approved') : ?>
                                <td><span class="badge badge-primary"><?= $p->status_3 ?></span></td>
                                <?php elseif($p->status_3 == 'Pending') : ?>
                                <td><span class="badge badge-secondary"><?= $p->status_3 ?></span></td>
                                <?php elseif($p->status_3 == 'Reject') : ?>
                                <td><span class="badge badge-danger"><?= $p->status_3 ?></span></td>
                                <?php endif; ?>
                                <?php if (empty($p->status_4)) : ?>
                                <td><?= "-" ?></td>
                                <?php elseif($p->status_4 == 'Approved') : ?>
                                <td><span class="badge badge-primary"><?= $p->status_4 ?></span></td>
                                <?php elseif($p->status_4 == 'Pending') : ?>
                                <td><span class="badge badge-secondary"><?= $p->status_4 ?></span></td>
                                <?php elseif($p->status_4 == 'Reject') : ?>
                                <td><span class="badge badge-danger"><?= $p->status_4 ?></span></td>
                                <?php endif; ?>
                                <td>
                                    <!-- Jika Keduanya Approved-->
                                    <?php if ($p->status_3 == 'Approved' && $p->status_4 == 'Approved') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/deleteArchive/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger delete-button"><i class="fas fa-times"> Delete</i>
                                    </a>
                                    <!-- Jika Keduanya Pending-->
                                    <?php elseif ($p->status_3 == 'Pending' && $p->status_4 == 'Pending') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-pause"> Waiting</i>
                                    </a>
                                    <!-- Jika Keduanya Reject-->
                                    <?php elseif ($p->status_3 == 'Reject' && $p->status_4 == 'Reject') : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <!-- Jika salah satu Approved atau Pending-->
                                    <?php elseif (($p->status_3 == 'Approved' && $p->status_4 == 'Pending') || ($p->status_3 == 'Pending' && $p->status_4 == 'Approved')): ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-pause"> Waiting</i>
                                    </a>
                                    <!-- Jika salah satu Approved atau Reject-->
                                    <?php elseif (($p->status_3 == 'Approved' && $p->status_4 == 'Reject') || ($p->status_3 == 'Reject' && $p->status_4 == 'Approved')) : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <!-- Jika salah satu Pending atau Reject-->
                                    <?php elseif (($p->status_3 == 'Pending' && $p->status_4 == 'Reject') || ($p->status_3 == 'Reject' && $p->status_4 == 'Pending')) : ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-square"> Retry Request</i>
                                    </a>
                                    <?php else: ?>
                                    <a href="<?= base_url('admin/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <?php if (empty($p->dc_barang_keluar)) : ?>
                                    <a href="<?= base_url('admin/reqDelete/' . $p->id_barang)  ?>"
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