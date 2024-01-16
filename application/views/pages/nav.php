<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img">
                <img src="<?= base_url() ?>assets/images/logos/diskominfo.png" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <?php if ($user['level'] == 1) : ?>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'dashboard' ? 'active' : ''; ?> " href=" <?= base_url() ?>dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">PERSURATAN</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'surat-masuk' ? 'active' : ''; ?> " href=" <?= base_url() ?>surat-masuk" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Surat Masuk</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'surat-keluar' ? 'active' : ''; ?> " href=" <?= base_url() ?>surat-keluar" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Surat Keluar</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">SETTINGS</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'pegawai' ? 'active' : ''; ?> " href=" <?= base_url() ?>pegawai" aria-expanded="false">
                            <span>
                                <i class="ti ti-mood-happy"></i>
                            </span>
                            <span class="hide-menu">Pegawai</span>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'dashboard' ? 'active' : ''; ?> " href=" <?= base_url() ?>dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">PERSURATAN</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?= $this->router->class == 'nomor-surat' ? 'active' : ''; ?> " href=" <?= base_url() ?>nomor-surat" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Nomor Surat</span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                <div class="d-flex">
                    <div class="unlimited-access-title me-3">
                        <a href="<?= base_url('logout') ?>" class="btn btn-primary fs-2 fw-semibold lh-sm">LOGOUT</a>
                    </div>
                    <div class="unlimited-access-img">
                        <img src="<?= base_url() ?>assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header shadow">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i> &nbsp;
                        <b>
                            <?= $title ?>
                        </b>
                    </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3"><b><?= $user['nama'] ?></b></p>
                                </a>
                                <a href="<?= base_url('logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>