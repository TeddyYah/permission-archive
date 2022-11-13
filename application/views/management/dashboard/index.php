<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                                Request Edit
                                <?php elseif ($user->id_role == 1) : ?>
                                All Request Edit
                                <?php endif; ?>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php if ($user->id_role == 2) : ?>
                                        <?= $edit2 ?>
                                        <?php elseif ($user->id_role == 3) : ?>
                                        <?= $edit3 ?>
                                        <?php elseif ($user->id_role == 1) : ?>
                                        <?= $edit2 + $edit3 ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pen-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                                Request Delete
                                <?php elseif ($user->id_role == 1) : ?>
                                All Request Delete
                                <?php endif; ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if ($user->id_role == 2) : ?>
                                <?= $delete2 ?>
                                <?php elseif ($user->id_role == 3) : ?>
                                <?= $delete3 ?>
                                <?php elseif ($user->id_role == 1) : ?>
                                <?= $delete2 + $delete3 ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-trash fa-2x text-gray-300"></i>
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
                                All Data Archive</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $all ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-archive fa-2x text-gray-300"></i>
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
                                Reject Edit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if ($user->id_role == 2) : ?>
                                <?= $reject1?>
                                <?php elseif ($user->id_role == 3) : ?>
                                <?= $reject2 ?>
                                <?php elseif ($user->id_role == 1) : ?>
                                <?= $reject1 + $reject2 ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-archive fa-2x text-gray-300"></i>
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
                                Reject Delete</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if ($user->id_role == 2) : ?>
                                <?= $reject2?>
                                <?php elseif ($user->id_role == 3) : ?>
                                <?= $reject4 ?>
                                <?php elseif ($user->id_role == 1) : ?>
                                <?= $reject2 + $reject4 ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>