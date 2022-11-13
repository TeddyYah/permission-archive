<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <h4 class="mb-4 text-dark"><?= $title  ?></h4>
            <div class="card">
                <div class="card-body">
                    <center>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td width="170px" class="pb-3">Kode Barang</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['kode_barang'];  ?></td>
                            </tr>
                            <tr>
                                <td width="170px" class="pb-3">Nama Barang</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['nama_barang'];  ?></td>
                            </tr>
                            <tr>
                                <td width="170px" class="pb-3">Barang Masuk</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['barang_masuk'];  ?></td>
                            </tr>
                            <tr>
                                <td width="170px" class="pb-3">Barang NG</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (isset($arsip['barang_ng'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['barang_ng'];  ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td width="170px" class="pb-3">Barang Keluar</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (isset($arsip['dc_barang_keluar'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['barang_keluar'];  ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php if (isset($arsip['date_request_edit'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Request Edit</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['date_request_edit']));  ?></td>
                            </tr>
                            <?php endif; ?>

                            <?php if (isset($arsip['date_request_delete'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Request Delete</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['date_request_delete']));  ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td width="170px" class="font-weight-bold pb-3">Req. Edit Direktur</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (empty($arsip['status_1'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['status_1'];  ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php if (isset($arsip['dc_approved1'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Aprroved</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_approved1']));  ?></td>
                            </tr>
                            <?php elseif (isset($arsip['dc_reject1'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Reject</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_reject1']));  ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td width="170px" class="font-weight-bold pb-3">Req. Edit Manager</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (empty($arsip['status_2'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['status_2'];  ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php if (isset($arsip['dc_approved2'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Aprroved</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_approved2']));  ?></td>
                            </tr>
                            <?php elseif (isset($arsip['dc_reject2'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Reject</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_reject2']));  ?></td>
                            </tr>
                            <?php endif; ?>

                            <tr>
                                <td width="170px" class="font-weight-bold pb-3">Req. Delete Direktur</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (empty($arsip['status_3'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['status_3'];  ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php if (isset($arsip['dc_approved3'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Aprroved</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_approved3']));  ?></td>
                            </tr>
                            <?php elseif (isset($arsip['dc_reject3'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Reject</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_reject3']));  ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td width="170px" class="font-weight-bold pb-3">Req. Delete Manager</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (empty($arsip['status_4'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['status_4'];  ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php if (isset($arsip['dc_approved4'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Aprroved</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_approved4']));  ?></td>
                            </tr>
                            <?php elseif (isset($arsip['dc_reject4'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Date Reject</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= date('d F Y, H:i', strtotime($arsip['dc_reject4']));  ?></td>
                            </tr>
                            <?php endif; ?>


                            <!-- pesan request -->
                            <?php if (isset($arsip['pesan_request_edit'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Pesan Request Edit</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= $arsip['pesan_request_edit'];  ?></td>
                            </tr>
                            <?php endif; ?>

                            <?php if (isset($arsip['pesan_request_delete'])) : ?>
                            <tr>
                                <td width="170px" class="pb-3">Pesan Request Delete</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3">
                                    <?= $arsip['pesan_request_delete'];  ?></td>
                            </tr>
                            <?php endif; ?>
                        </table>
                        <?php if ($user->id_role == 1) : ?>
                        <a href="<?= base_url('admin/viewArsip'); ?>" class="btn btn-sm btn-info mt-2"><i
                                class="fas fa-backward"></i>
                            Archive data</a>
                        <a href="<?= base_url('admin/requestEditArchive'); ?>"
                            class="btn btn-sm btn-warning mt-2 float-left"><i class="fas fa-backward"></i> Request
                            Edit</a>
                        <a href="<?= base_url('admin/requestDeleteArchive'); ?>"
                            class="btn btn-sm btn-danger mt-2 float-right"><i class="fas fa-backward"></i> Request
                            Delete</a>

                        <?php elseif ($user->id_role == 4) : ?>
                        <a href="<?= base_url('admin/viewArsip'); ?>" class="btn btn-sm btn-info mt-2"><i
                                class="fas fa-backward"></i>
                            Archive data</a>
                        <a href="<?= base_url('admin/requestEditArchive'); ?>"
                            class="btn btn-sm btn-warning mt-2 float-left"><i class="fas fa-backward"></i> Request
                            Edit</a>
                        <a href="<?= base_url('admin/requestDeleteArchive'); ?>"
                            class="btn btn-sm btn-danger mt-2 float-right"><i class="fas fa-backward"></i> Request
                            Delete</a>
                        <?php endif; ?>
                    </center>

                </div>
            </div>

        </div>
    </div>
</div>