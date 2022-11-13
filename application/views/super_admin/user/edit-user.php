<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-10" style="margin-bottom: 100px">
        <div class="card-body">
            <form action="<?= base_url('super_admin/updateUser/' . $member->id_user)  ?>" method="post">
                <input type="hidden" name="id_ps" value="<?= $member->id_user ?>">
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $member->fullname ?>"></input>
                    <div class="form-text text-danger"><?= form_error('fullname');  ?></div>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="id_role" class="form-control" id="id_role">
                        <option value="<?= $member->id_role ?>"><?= $member->nama_role ?></option>
                        <option value="2" <?= set_select('id_role', 2) ?>>Direktur</option>
                        <option value="3" <?= set_select('id_role', 3) ?>>Manajer</option>
                        <option value="4" <?= set_select('id_role', 4) ?>>Admin</option>
                    </select>
                    <div class="form-text text-danger"><?= form_error('id_role');  ?></div>
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <select name="is_active" class="form-control" id="is_active">
                        <option value="<?= $member->is_active ?>"><?= $member->is_active ?></option>
                        <option value="0" <?= set_select('is_active', 0) ?>>Tidak Aktive</option>
                        <option value="1" <?= set_select('is_active', 1) ?>>Active</option>
                    </select>
                    <div class="form-text text-danger"><?= form_error('is_active');  ?></div>
                </div>
                <button type="submit" class="btn btn-success"> Submit</button>
                <a href="<?= base_url('super_admin'); ?>" class="btn btn-primary ml-2">Kembali</a>
            </form>

        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->