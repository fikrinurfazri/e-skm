<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?= base_url() ?>assets/images/banerskm.png" width="100%" height="100%" alt="">
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <div class="card ">
                <div class="card-body ">
                    <div class="row d-flex justify-content-center">
                        <h3 class="card-title fw-semibold mb-4 d-flex justify-content-center">Hasil Survei Pertahun</h3>
                        <?php foreach ($tahun as $t) : ?>
                            <div class="col-lg-4">
                                <div class="card shadow-lg">
                                    <div class="card-body text-center">
                                        <p class="mb-9 fw-bolder text-warning" style="font-size: 60px;"><a href="<?= base_url() ?>detail-skm/<?= $t['tahun'] ?>"><?= $t['tahun'] ?></a> </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card border-warning">
                <div class="card-header">
                    <div class="d-flex col-12 justify-content-between">
                        <h5 class="card-title fw-semibold mb-4 p-2">Hasil Survei Unit Kerja/Organisasi</h5>
                        <form action="" method="get">
                            <div class="form-group">
                                <div class="col-12 d-flex">
                                    <input type="text" class="form-control" name="cari" placeholder="Cari Unit Kerja"> &nbsp;
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="ti ti-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <?php if (!empty($keyword)) { ?>
                            <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
                        <?php } ?>
                        <?php foreach ($user as $t) : ?>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border-warning" style="width: 18rem; height: 12rem;">
                                            <!-- <img src="<?= base_url() ?>assets/images/logos/<?= $t['image'] ?>" class="align-center" width="30%" alt="..."> -->
                                            <div class="card-body">
                                                <p class="card-text"><?= $t['nama'] ?></p>
                                                <a href="<?= base_url() ?>home/detailorg/<?= $t['username'] ?>" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>


    </div>