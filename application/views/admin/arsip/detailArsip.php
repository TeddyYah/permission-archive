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
                                <td width="200px" class="font-weight-bold pb-3"><?= 0 ?></td>
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
                            <tr>
                                <td width="170px" class="pb-3">Date Barang Masuk</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['dc_barang_masuk'];  ?>
                                </td>
                            </tr>

                            <tr>
                                <td width="170px" class="pb-3">Date Barang Keluar</td>
                                <td width="20px" class="pb-3">:</td>
                                <?php if (isset($arsip['dc_barang_keluar'])) : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= $arsip['dc_barang_keluar']; ?>
                                </td>
                                <?php else : ?>
                                <td width="200px" class="font-weight-bold pb-3"><?= "-" ?></td>
                                <?php endif; ?>
                            </tr>
                        </table>
                        <?php if ($user->id_role == 1) : ?>
                        <a href="<?= base_url('admin/viewArsip'); ?>" class="btn btn-sm btn-info mt-2"><i
                                class="fas fa-backward"></i>
                            Archive data</a>
                        <a href="<?= base_url('admin/dataBarangMasuk'); ?>"
                            class="btn btn-sm btn-warning mt-2 float-left"><i class="fas fa-backward"></i> Enter
                            Item</a>
                        <a href="<?= base_url('admin/dataBarangKeluar'); ?>"
                            class="btn btn-sm btn-danger mt-2 float-right"><i class="fas fa-backward"></i> Exit Item</a>

                        <?php elseif ($user->id_role == 4) : ?>
                        <a href="<?= base_url('admin/viewArsip'); ?>" class="btn btn-sm btn-info mt-2"><i
                                class="fas fa-backward"></i>
                            Archive data</a>
                        <a href="<?= base_url('admin/dataBarangMasuk'); ?>"
                            class="btn btn-sm btn-warning mt-2 float-left"><i class="fas fa-backward"></i> Enter
                            Item</a>
                        <a href="<?= base_url('admin/dataBarangKeluar'); ?>"
                            class="btn btn-sm btn-danger mt-2 float-right"><i class="fas fa-backward"></i> Exit Item</a>

                        <?php endif; ?>
                    </center>

                </div>
            </div>

        </div>
    </div>
</div>
</div>