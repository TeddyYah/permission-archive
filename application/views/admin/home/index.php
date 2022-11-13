<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card Stock Barang  -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                Stock Barang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?= $all ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/viewArsip/')?>" class="btn btn-sm btn-info"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="View Archive">
                                <i class="fas fa-archive fa-2x "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                Barang Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $get ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/dataBarangMasuk/')?>" class="btn btn-sm btn-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add Archive">
                                <i class="fas fa-plus fa-2x "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                Barang Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $exit ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/dataBarangKeluar/')?>" class="btn btn-sm btn-danger"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Exit Archive">
                                <i class="fas fa-times fa-2x "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->