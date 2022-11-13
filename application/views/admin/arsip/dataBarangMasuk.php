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
                    <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th class="text-center">Barang Masuk</th>
                                <th>Date Barang Masuk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($arsip as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $p->kode_barang ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td class="text-center"><?= $p->barang_masuk ?></td>
                                <td><?= date('d F Y, H:i', strtotime($p->dc_barang_masuk)) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/detailArsip/') . $p->id_barang ?>"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-info-circle"> Detail</i>
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