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
                    <label>Pesan Request</label>
                    <textarea type="text" name="pesan_request_delete" placeholder="Pesan Request Delete"
                        class="form-control"></textarea>
                    <div class="form-text text-danger"><?= form_error('pesan_request_delete');  ?></div>
                </div>
                <button type="submit" name="tambah" class="btn btn-success">Submit</button>
                <a href="<?= base_url('admin/requestDeleteArchive'); ?>" class="btn btn-primary ml-2">Kembali</a>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->