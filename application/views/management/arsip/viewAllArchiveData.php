<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-right">Kode Barang</th>
                                <th class="text-right">Nama Barang</th>
                                <th class="text-right">Barang Masuk</th>
                                <th class="text-right">Barang NG</th>
                                <th class="text-right">Barang Keluar</th>
                                <th class="text-right">Date Barang Masuk</th>
                                <th class="text-right">Date Barang Keluar</th>
                                <th class="text-center" width="50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr>
                                <td class="text-right"><?= $no++ ?></td>
                                <td class="text-right"><?= $p->kode_barang ?></td>
                                <td class="text-right"><?= $p->nama_barang ?></td>
                                <td class="text-right"><?= $p->barang_masuk ?></td>
                                <?php if (isset($p->barang_ng)) : ?>
                                <td class="text-right"><?= $p->barang_ng ?></td>
                                <?php else : ?>
                                <td class="text-right"><?= "-" ?></td>
                                <?php endif; ?>
                                <?php if (isset($p->dc_barang_keluar)) : ?>
                                <td class="text-right"><?= $p->barang_keluar ?></td>
                                <?php else : ?>
                                <td class="text-right"><?= "-" ?></td>
                                <?php endif; ?>
                                <td class="text-right"><?= date('d F Y, H:i', strtotime($p->dc_barang_masuk)) ?></td>
                                <?php if (isset($p->dc_barang_keluar)) : ?>
                                <td class="text-right"><?= date('d F Y, H:i', strtotime($p->dc_barang_keluar)) ?></td>
                                <?php else : ?>
                                <td class="text-right"><?= "-" ?></td>
                                <?php endif; ?>
                                <td class=" text-center">
                                    <a href="<?= base_url('management/detailRequest/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Detail">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
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