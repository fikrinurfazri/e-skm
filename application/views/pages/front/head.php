<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-skm kota tasikmalaya</title>
    <meta content="e-skm | skm | skm kota tasikmalaya | e-skm kota tasikmalaya | survei kepuasan masyarakat kota tasikmalaya" name="description">
    <meta content="e-skm | skm | skm kota tasikmalaya | e-skm kota tasikmalaya | survei kepuasan masyarakat kota tasikmalaya" name="keywords">

    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/skm.png" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
    <style>
        /* CSS untuk mengatur tampilan video menjadi landscape */
        #video {
            transform: rotate(360deg);
            width: 45vh;
            height: 50vw;
            object-fit: cover;
        }

        @media (min-width: 768px) {
            #video {
                display: none;
            }
        }
    </style>
</head>

<body>


    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header shadow mb-5">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-icon-hover" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/images/logoskm.png" width="10%" alt="" />
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <a href="<?= base_url() ?>masuk" class="btn btn-primary">Login</a>
                </div>
            </nav>
        </header>