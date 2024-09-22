<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-skm tasikmalaya</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/skm.png" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <!-- Sertakan SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">

    <!-- Sertakan SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.all.min.js"></script>


    <style>
        #myDataTable thead th {
            background-color: #e0e0e0;
            /* Ganti dengan warna yang diinginkan */
        }

        #myDataTable {
            border: 2px solid #DCDCDC;
            /* Ganti dengan warna yang diinginkan */
        }

        #myDataTable thead th {
            border: 2px solid #DCDCDC;
            /* Ganti dengan warna yang diinginkan */
        }

        #myDataTable tbody td {
            border: 1px solid #DCDCDC;
            /* Ganti dengan warna yang diinginkan */
        }

        .dataTables_wrapper {
            margin-bottom: 20px;
            /* Sesuaikan dengan jumlah margin yang diinginkan */
        }

        .dataTables_filter {
            margin-bottom: 20px;
            /* Sesuaikan dengan jumlah margin yang diinginkan */
        }
    </style>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">


        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url() ?>assets/images/logoskm.png" width="100%" alt="" />
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
                                <span class="hide-menu">Master</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'periode' ? 'active' : ''; ?> " href=" <?= base_url() ?>periode" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Periode</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'user' ? 'active' : ''; ?> " href=" <?= base_url() ?>user" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-user"></i>
                                    </span>
                                    <span class="hide-menu">User</span>
                                </a>
                            </li>
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Laporan</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'laporan' ? 'active' : ''; ?> " href=" <?= base_url() ?>laporan" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Laporan</span>
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
                                <span class="hide-menu">Menu</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'pelayanan' ? 'active' : ''; ?> " href=" <?= base_url() ?>pelayanan" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Pelayanan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'kuisioner' ? 'active' : ''; ?> " href=" <?= base_url() ?>kuisioner" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Kuisioner</span>
                                </a>
                            </li>

                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Laporan</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'hasil-keseluruhan' ? 'active' : ''; ?> " href=" <?= base_url() ?>hasil-keseluruhan" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Keseluruhan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'hasil-pelayanan' ? 'active' : ''; ?> " href=" <?= base_url() ?>hasil-pelayanan" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Pelayanan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->router->class == 'export' ? 'active' : ''; ?> " href=" <?= base_url() ?>export" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Export</span>
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
                                        <a href="<?= base_url('profile') ?>" class="d-flex align-items-center gap-2 dropdown-item">
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
            <section class="content-header mb-5">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> <?= $title ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header mb-2">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                                    <li class="breadcrumb-item active"> <?= $title ?></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card card-success shadow-lg">
                                    <div class="card-header">
                                        <?php if ($this->session->flashdata('error')) : ?>
                                            <div class="alert alert-danger">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->session->flashdata('success')) : ?>
                                            <div class="alert alert-success">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="d-flex">

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="ti ti-plus"></i> Tambah
                                            </button> &nbsp;
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="ti ti-reload"></i> Rekap SKM
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <table id="myDataTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pegawai as $n) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $n['username'] ?></td>
                                                        <td><?= $n['nama'] ?></td>



                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> </a>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <li> <button type="button" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id_user'] ?>">
                                                                            <i class="ti ti-edit"></i> Hapus
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/deleteuser/<?= $n['id_user'] ?>" class="dropdown-item btn-delete"><i class="ti ti-trash"></i> Hapus</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/lihat/<?= $n['username'] ?>" class="dropdown-item "><i class="ti ti-files"></i> SKM</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/kuisioner/<?= $n['username'] ?>" class="dropdown-item "><i class="ti ti-cloud"></i> Kuisioner</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>export/export/<?= $n['id_user'] ?>" class="dropdown-item "><i class="ti ti-file"></i> Export Excel</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/tambahuser') ?>" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            $no = 0;
            foreach ($pegawai as $n) : $no++
            ?>
                <div class="modal fade" id="exampleModal<?= $n['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update data </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/updateuser') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $n['username'] ?>">
                                        <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $n['id_user'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $n['nama'] ?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <script>
                $(document).ready(function() {
                    $('#myDataTable').DataTable({
                        searching: true,
                        language: {
                            search: '<button class="btn"><i class="ti ti-search"></i> Search</button>', // Ganti dengan ikon atau teks pencarian yang diinginkan
                            paginate: {
                                previous: '<button class="btn btn-warning"><i class="ti ti-arrow-left"></i></button>', // Ganti dengan ikon atau teks "Previous" yang diinginkan
                                next: '<button class="btn btn-warning"><i class="ti ti-arrow-right"></i></button>' // Ganti dengan ikon atau teks "Next" yang diinginkan
                            }
                        }
                    }); // Gantilah 'myDataTable' dengan ID dari tabel Anda

                });

                $(document).ready(function() {
                    $('.btn-delete').on('click', function(e) {
                        e.preventDefault();
                        var deleteUrl = $(this).attr('href');

                        Swal.fire({
                            title: 'Anda yakin?',
                            text: 'Data akan dihapus secara permanen.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, Hapus!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke controller untuk menghapus data
                                window.location.href = deleteUrl;
                            }
                        });
                    });
                });
            </script>

        </div>
    </div>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url() ?>assets/js/dashboard.js"></script>

</body>

</html>