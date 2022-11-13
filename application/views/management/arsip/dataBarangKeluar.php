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
                                <th class="text-center">Barang Keluar</th>
                                <th>Date Barang Keluar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $p->kode_barang ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <?php if (empty($p->barang_keluar)) : ?>
                                <td><?= "-" ?></td>
                                <?php else : ?>
                                <td class="text-center"><?= $p->barang_keluar ?></td>
                                <?php endif; ?>
                                <?php if (empty($p->dc_barang_keluar)) : ?>
                                <td><?= "-" ?></td>
                                <?php else : ?>
                                <td><?= date('d F Y, H:i', strtotime($p->dc_barang_keluar)) ?></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= base_url('management/detailArsip/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
                                    </a>
                                    <!-- <?php if (empty($p->dc_barang_keluar)) : ?>
                                    <a href="<?= base_url('admin/barangKeluar/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-warning DC_barang-button">
                                        <i class="fas fa-door-open"> Exit Item</i>
                                    </a>
                                    <?php endif; ?> -->
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