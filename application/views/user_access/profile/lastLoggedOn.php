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
                            <tr class="text-center">
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Last Logged On</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($member as $m) : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $m->fullname ?></td>
                                <td><?= $m->nama_role?></td>
                                <td width="120px">
                                    <?= date('d-M-Y', strtotime($m->created_at)) ?>
                                </td>
                                <td>
                                    <?= date('d F Y, H:i', strtotime(($m->last_logged_on))) ?>
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