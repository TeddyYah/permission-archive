<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php if ($user->id_role == 1) : ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url('super_admin') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>/assets/img/Company.gif" class="img-profile rounded-circle"
                        style="height: 40px; width:40px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Archive Digital</div>
            </a>

            <?php elseif ($user->id_role == 2) : ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url('management') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>/assets/img/Company.gif" class="img-profile rounded-circle"
                        style="height: 40px; width:40px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Archive Digital</div>
            </a>

            <?php elseif ($user->id_role == 3) : ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url('management') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>/assets/img/Company.gif" class="img-profile rounded-circle"
                        style="height: 40px; width:40px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Archive Digital</div>
            </a>

            <?php elseif ($user->id_role == 4) : ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>/assets/img/Company.gif" class="img-profile rounded-circle"
                        style="height: 40px; width:40px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Archive Digital</div>
            </a>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- QUERY MENU -->
            <?php 
            $role_id = $this->session->userdata('id_role');
            // var_dump($role_id);
            // die;
            $queryMenu = "SELECT `user_menu`.`id_menu`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                           WHERE `user_access_menu`.`id_role` = $role_id
                        ORDER BY `user_access_menu`.`id_menu` ASC
                        ";
            $menu = $this->db->query($queryMenu)->result_array();

            // var_dump($menu);
            // die;
            ?>

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!-- SIAPKAN SUB-MENU SESUAI MENU -->
            <?php 
            $menuId = $m['id_menu'];
            $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
                              WHERE `user_sub_menu`.`id_menu` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                                ORDER BY `user_sub_menu`.`id_sub_menu` ASC
                        ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>

            <!-- Nav Item - Charts -->
            <li class="nav-item  <?= ($title == 'My Profile') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('profile') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->



        <!-- Start of Topbar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Ini Notifikasi -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Start Notifikasi Role 2  -->
                        <?php
                        $notif_countRole2 = $this->Notif_model->getAllNewNotifRole2();       
                        $notifRole2 = $this->Notif_model->getNotifBaruRole2();
                        ?>
                        <?php if($user->id_role == 2): ?>
                        <?php if(empty($notif_countRole2)): ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Tidak ada notifikasi">
                                <i class="fas fa-bell fa-fw"></i> `
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- jika pengen pakai jQuery id="notif_count"-->
                                <?php if(empty($notif_countRole2)): ?>
                                <span class="badge badge-danger badge-counter"></span>
                                <?php else: ?>
                                <span class="badge badge-danger badge-counter"><?= $notif_countRole2 ?></span>
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                <?php foreach($notifRole2 as $nr2)  : ?>
                                <?php if(($nr2['status_1'] && $nr2['status_3'] == 'Pending') OR ($nr2['status_1'] || $nr2['status_3'] == 'Pending')): ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('management/detailRequest/') . $nr2['id_barang'] ?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-bold-500">
                                            <?php if($nr2['status_1'] == 'Pending' && $nr2['status_3'] == 'Pending'): ?>
                                            <?= $nr2['date_request_edit'] ?>
                                            <?php elseif($nr2['status_1'] == 'Pending') : ?>
                                            <?= $nr2['date_request_edit'] ?>
                                            <?php endif; ?>
                                        </div>
                                        <span class="font-weight-bold">
                                            <?php if($nr2['status_1'] && $nr2['status_3'] == 'Pending'): ?>
                                            <?= 
                                            "Ask permission to request with item kode ". $nr2['kode_barang'] . " : " . $nr2['nama_barang']
                                            ?>
                                            <?php elseif($nr2['status_1'] == 'Pending') : ?>
                                            <?= 
                                            "Ask permission to edit with item kode ". $nr2['kode_barang'] . " : " . $nr2['nama_barang']
                                            ?>
                                            <?php elseif($nr2['status_3'] == 'Pending') : ?>
                                            <?= 
                                            "Ask permission to delete with item kode ". $nr2['kode_barang'] . " : " . $nr2['nama_barang']
                                            ?>
                                            <?php endif; ?>
                                        </span>
                                        <div class="small text-bold-500">
                                            <?php if($nr2['status_1'] == 'Pending' && $nr2['status_3'] == 'Pending'): ?>
                                            <?= $nr2['date_request_delete'] ?>
                                            <?php elseif($nr2['status_3'] == 'Pending') : ?>
                                            <?= $nr2['date_request_delete'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <a class="dropdown-item text-center small text-gray-500"
                                    href="<?= base_url('management/viewAllArchiveData') ?>">Show All
                                    Alchive</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <!-- End Notifikasi Role 2  -->

                        <!-- Start Notifikasi Role 3  -->
                        <?php
                        $notif_countRole3 = $this->Notif_model->getAllNewNotifRole3();
                        $notifRole3 = $this->Notif_model->getNotifBaruRole3();
                        ?>
                        <?php if($user->id_role == 3): ?>
                        <?php if(empty($notif_countRole3)): ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Tidak ada notifikasi">
                                <i class="fas fa-bell fa-fw"></i> `
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- jika pengen pakai jQuery id="notif_count"-->
                                <?php if(empty($notif_countRole3)): ?>
                                <span class="badge badge-danger badge-counter"></span>
                                <?php else: ?>
                                <span class="badge badge-danger badge-counter"><?= $notif_countRole3 ?></span>
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                <?php foreach($notifRole3 as $nr3)  : ?>
                                <?php if(($nr3['status_2'] && $nr3['status_4'] == 'Pending') OR ($nr3['status_2'] || $nr3['status_4'] == 'Pending')): ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('management/detailRequest/') . $nr3['id_barang'] ?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-bold-500">
                                            <?php if($nr3['status_2'] == 'Pending' && $nr3['status_4'] == 'Pending'): ?>
                                            <?= $nr3['date_request_edit'] ?>
                                            <?php elseif($nr3['status_2'] == 'Pending') : ?>
                                            <?= $nr3['date_request_edit'] ?>
                                            <?php endif; ?>
                                        </div>
                                        <span class="font-weight-bold">

                                            <?php if($nr3['status_2'] == 'Approved' && $nr3['status_4'] == 'Pending') : ?>
                                            <?= 
                                            "Ask permission to delete with item kode ". $nr3['kode_barang'] . " : " . $nr3['nama_barang']
                                            ?>
                                            <?php elseif($nr3['status_2'] == 'Pending' && $nr3['status_4'] == 'Approved') : ?>
                                            <?= 
                                            "Ask permission to edit with item kode ". $nr3['kode_barang'] . " : " . $nr3['nama_barang']
                                            ?>
                                            <?php elseif($nr3['status_2'] && $nr3['status_4'] == 'Pending'): ?>
                                            <?= 
                                            "Ask permission to request with item kode ". $nr3['kode_barang'] . " : " . $nr3['nama_barang']
                                            ?>
                                            <?php elseif($nr3['status_2'] == 'Pending') : ?>
                                            <?= 
                                            "Ask permission to edit with item kode ". $nr3['kode_barang'] . " : " . $nr3['nama_barang']
                                            ?>
                                            <?php elseif($nr3['status_4'] == 'Pending') : ?>
                                            <?= 
                                            "Ask permission to delete with item kode ". $nr3['kode_barang'] . " : " . $nr3['nama_barang']
                                            ?>

                                            <?php endif; ?>
                                        </span>
                                        <div class="small text-bold-500">
                                            <?php if($nr3['status_2']  == 'Pending' && $nr3['status_4'] == 'Pending'): ?>
                                            <?= $nr3['date_request_delete'] ?>
                                            <?php elseif($nr3['status_4'] == 'Pending') : ?>
                                            <?= $nr3['date_request_delete'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <a class="dropdown-item text-center small text-gray-500"
                                    href="<?= base_url('management/viewAllArchiveData') ?>">Show All
                                    Alchive</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <!-- End Notifikasi Role 3  -->

                        <!-- Start Notifikasi Role 4  -->
                        <?php
                        $notif_countRole4 = $this->Notif_model->getAllNewNotifRole4();
                        $notifRole4 = $this->Notif_model->getNotifBaruRole4();
                        $notifRole44 = $this->Notif_model->getNotifBaruRole44();
                        ?>

                        <?php if($user->id_role == 4): ?>
                        <?php if(empty($notif_countRole4)): ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Tidak ada notifikasi">
                                <i class="fas fa-bell fa-fw"></i> `
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- jika pengen pakai jQuery id="notif_count"-->
                                <?php if($notif_countRole4 == 0): ?>
                                <span class="badge badge-danger badge-counter"></span>
                                <?php else: ?>
                                <span class="badge badge-danger badge-counter"><?= $notif_countRole4 ?></span>
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header bg-primary">
                                    Notifikasi Approved
                                </h6>
                                <?php foreach($notifRole4 as $nr4)  : ?>
                                <?php if($nr4['is_read'] == 0): ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('admin/detailRequest/') . $nr4['id_barang'] ?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-bold-500">
                                            <?php if($nr4['status_1'] == 'Approved'): ?>
                                            <?= $nr4['dc_approved1'] ?>
                                            <?php elseif($nr4['status_2'] == 'Approved') : ?>
                                            <?= $nr4['dc_approved2'] ?>
                                            <?php elseif($nr4['status_3'] == 'Approved') : ?>
                                            <?= $nr4['dc_approved3'] ?>
                                            <?php elseif($nr4['status_4'] == 'Approved') : ?>
                                            <?= $nr4['dc_approved4'] ?>
                                            <?php endif; ?>
                                        </div>
                                        <span class="font-weight-bold">
                                            <?= 
                                            "Request data archive to Approved with item kode ". $nr4['kode_barang'] . " : " . $nr4['nama_barang']
                                            ?>
                                        </span>
                                    </div>
                                </a>
                                <?php endif; ?>

                                <?php endforeach; ?>
                                <h6 class="dropdown-header bg-danger">
                                    Notifikasi Reject
                                </h6>
                                <?php foreach($notifRole44 as $nr44)  : ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('admin/detailRequest/') . $nr44['id_barang'] ?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-bold-500">
                                            <?php if($nr44['status_1'] == 'Reject'): ?>
                                            <?= $nr44['dc_reject1'] ?>
                                            <?php elseif($nr44['status_2'] == 'Reject') : ?>
                                            <?= $nr44['dc_reject2'] ?>
                                            <?php elseif($nr44['status_3'] == 'Reject') : ?>
                                            <?= $nr44['dc_reject3'] ?>
                                            <?php elseif($nr44['status_4'] == 'Reject') : ?>
                                            <?= $nr44['dc_reject4'] ?>
                                            <?php endif; ?>
                                        </div>
                                        <span class="font-weight-bold">
                                            <?= 
                                            "Request data archive to Reject with item kode ". $nr44['kode_barang'] . " : " . $nr44['nama_barang']
                                            ?>
                                        </span>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                                <a class="dropdown-item text-center small text-gray-500"
                                    href="<?= base_url('admin/viewArsip') ?>">Show All
                                    Alchive</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <!-- End Notifikasi Role 4  -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user->fullname ?></span>

                                <?php if (!$user->image) : ?>
                                <img src="https://ui-avatars.com/api/?size=128&name=<?= $user->fullname ?>"
                                    class="img-profile rounded-circle" />
                                <?php else : ?>
                                <img src="<?= base_url('assets/img/profile/') . $user->image ?>"
                                    class="img-profile rounded-circle">
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->