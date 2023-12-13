<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 fixed-top">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <a class="sidebar-large d-flex align-items-center justify-content-center ml-5 mt-5" href="#">
            <div class="sidebar-large-icon rotate-n-15">
                <i class="fas fa-paw"></i>
            </div>
            <div class="sidebar-xtra large-text mx-3">Paw Paw</div>
        </a>

        <ul class="navbar-nav ml-auto mr-5 mt-5">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>


    <div class="row no-gutter align-items-center vh-100">
        <div class="col-10 col-md-7 col-lg-7 mx-auto">
            <div class="card-deck">
                <div class="card mr-5"style="background:#6838C8;color:white;">
                    <a href="<?= base_url('produk'); ?>">
                        <div class="card-body">
                            <h2 class="fas fa-database" style="color: #ffffff;"></h2>
                            <h5 class="card-title text-white">Produk</h5>
                        </div>
                </div>
                <div class="card mr-5"style="background:#6838C8;color:white;">
                    <a href="<?= base_url('transaksi'); ?>">
                        <div class="card-body">
                            <h2 class="fas fa-table" style="color: #ffffff;"></h2>
                            <h5 class="card-title text-white">Transaksi</h5>    
                        </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->