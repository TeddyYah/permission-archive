<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-right">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Pesan Request</th>
                                <th>Date Request</th>
                                <?php if ($user->id_role == 1) : ?>
                                <th>Action</th>
                                <?php else : ?>
                                <th width="170px">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr class="text-right">
                                <td><?= $no++ ?></td>
                                <td><?= $p->kode_barang ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td><?= $p->pesan_request_edit ?></td>
                                <td><?= date('d F Y, H:i', strtotime($p->date_request_edit)) ?></td>
                                <td>
                                    <a href="<?= base_url('management/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Detail">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <?php if ($user->id_role == 2) : ?>
                                    <a href="<?= base_url('management/approvedRequestEditRole2/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button">
                                        Approved
                                    </a>
                                    <a href="<?= base_url('management/rejectRequestEditRole2/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-outline-danger WR_Cancel-button">
                                        Reject
                                    </a>
                                    <?php elseif ($user->id_role == 3) : ?>
                                    <a href="<?= base_url('management/approvedRequestEditRole3/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button">
                                        Approved
                                    </a>
                                    <a href="<?= base_url('management/rejectRequestEditRole3/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-outline-danger WR_Cancel-button">
                                        Reject
                                    </a>
                                    <?php elseif ($user->id_role == 1) : ?>
                                    <!-- jika mode manajer, keduanya pending -->
                                    <?php if (($p->status_1 == 'Pending') && ($p->status_2 == 'Pending')) : ?>
                                    <a href="<?= base_url('management/approvedRequestEditRole2/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Approved 1">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= base_url('management/approvedRequestEditRole3/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Approved 2">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= base_url('management/rejectRequestEditAllRole/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger WR_Cancel-button" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reject">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <!-- jika mode direktur -->
                                    <?php elseif ($p->status_1 == 'Pending') : ?>
                                    <a href="<?= base_url('management/approvedRequestEditRole2/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Approved 1">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= base_url('management/rejectRequestEditAllRole/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger WR_Cancel-button" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reject">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <!-- jika mode manajer -->
                                    <?php elseif ($p->status_2 == 'Pending') : ?>
                                    <a href="<?= base_url('management/approvedRequestEditRole3/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-primary WR_Edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Approved 2">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= base_url('management/rejectRequestEditAllRole/' . $p->id_barang)  ?>"
                                        class="btn btn-sm btn-danger WR_Cancel-button" disabled data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reject">
                                        <i class="fas fa-times"></i>
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