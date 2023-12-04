        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Paw Paw</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- QUERY MENU -->

            <?php
            // $menuId = $m['id'];
            $jabatan = $this->session->userdata('jabatan');
            $querySubMenu = "SELECT *
                                FROM `user_menu` 
                                JOIN `akses_menu_user` 
                                ON `user_menu`.`id` = `akses_menu_user`.`menu_id`
                                WHERE `akses_menu_user`.`jabatan` = '$jabatan'
                                AND `user_menu`.`is_active` = 1
                                ORDER BY `user_menu`.`menu` ASC
                            ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
                <?php if ($title == $sm['menu']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['menu']; ?></span></a>
                    </li>
                <?php endforeach; ?>

                <hr class="sidebar-divider mt-5">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <li class="text-center d-none d-md-inline mt-5">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </li>

        </ul>

        <!-- End of Sidebar -->