<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pengelola Nomor Surat</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/logos/logo.png" />
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
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">