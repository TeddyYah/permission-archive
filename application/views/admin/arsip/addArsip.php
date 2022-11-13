<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 100px">
        <div class="card-body">
            <form action="<?= base_url('admin/addArsip') ?>" method="post">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control"></input>
                    <div class="form-text text-danger"><?= form_error('kode_barang');  ?></div>
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"></input>
                    <div class="form-text text-danger"><?= form_error('nama_barang');  ?></div>
                </div>

                <div class="form-group">
                    <label>Barang Masuk</label>
                    <input type="number" name="barang_masuk" class="form-control"></input>
                    <div class="form-text text-danger"><?= form_error('barang_masuk');  ?></div>
                </div>

                <div class="form-group">
                    <label>Date Masuk</label>
                    <input type="text" name="dc_barang_masuk" class="form-control" id='datetimepicker6'></input>
                    <div class="form-text text-danger"><?= form_error('dc_barang_masuk');  ?></div>
                </div>

                <button type="submit" name="tambah" class="btn btn-success">Submit</button>
                <a href="<?= base_url('admin/viewArsip'); ?>" class="btn btn-primary ml-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->