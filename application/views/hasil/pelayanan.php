<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active"> <?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- 
    <section class="section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 ">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                <thead class="align-middle text-center">
                                    <tr>
                                        <th>PELAYANAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <?php foreach ($pelayanan as $hs) : ?>

                                        <tr class="align-middle">
                                            <td><?= $hs['pelayanan'] ?></td>
                                            <td><a href="<?= base_url() ?>hasil/detailpel/<?= $hs['id_pelayanan'] ?>" class="btn btn-primary">Lihat</a></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> -->


    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row d-flex justify-content-center">

            <?php foreach ($pelayanan as $hs) : ?>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Monthly Earnings -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold"><?= $hs['pelayanan'] ?> </h5>
                                            <!-- <h4 class="fw-semibold mb-3"><?= $responden ?></h4> -->
                                            <div class="d-flex align-items-center pb-1">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-white p-6 d-flex align-items-center justify-content-center">
                                                    <a href="<?= base_url() ?>hasil/detailpel/<?= $hs['id_pelayanan'] ?>" class="btn btn-primary">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>



    </div>