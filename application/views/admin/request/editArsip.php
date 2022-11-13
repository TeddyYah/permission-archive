<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 100px">
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?= $arsip['id_barang'] ?>">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control"
                        value="<?= $arsip['kode_barang']; ?>"></input>
                    <div class="form-text text-danger"><?= form_error('kode_barang');  ?></div>
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"
                        value="<?= $arsip['nama_barang']; ?>"></input>
                    <div class="form-text text-danger"><?= form_error('nama_barang');  ?></div>
                </div>

                <div class="form-group">
                    <label>Barang Masuk</label>
                    <input type="number" name="barang_masuk" class="form-control"
                        value="<?= $arsip['barang_masuk']; ?>"></input>
                    <div class="form-text text-danger"><?= form_error('barang_masuk');  ?></div>
                </div>

                <div class="form-group">
                    <label>Barang NG</label>
                    <input type="number" name="barang_ng" class="form-control"
                        value="<?= $arsip['barang_ng']; ?>"></input>
                    <div class="form-text text-danger"><?= form_error('barang_ng');  ?></div>
                </div>



                <button type="submit" name="tambah" class="btn btn-success">Edit</button>
                <a href="<?= base_url('admin/requestEditArchive'); ?>" class="btn btn-primary ml-2">Kembali</a>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->