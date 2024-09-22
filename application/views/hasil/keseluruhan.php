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
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5"><?= $title ?></h1>
                </div> -->
                <br>

                <!-- <form action="" method="post" class="mb-2">
                    <input type="hidden" name="responden" value="<?= $skm['responden'] ?>">
                    <button type="submit" class="btn btn-primary"><i class="ti ti-reload"></i> Sinkronisasi</button>

                </form> -->

                <?php foreach ($hasilsum as $row) : ?>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <!-- <a href="<?= base_url() ?>hasil/print/<?= $hs['id_skm'] ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a> -->
                                        </div>
                                        <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                            <thead class="align-middle text-center">
                                                <tr>
                                                    <th colspan="5">TRIWULAN <?= $row->triwulan ?></th>
                                                </tr>
                                                <tr>
                                                    <th>TAHUN</th>
                                                    <th>RESPONDEN</th>
                                                    <th>NILAI IKM</th>
                                                    <th>MUTU PELAYANAN</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr class="align-middle">
                                                    <td><?php echo $row->tahun; ?></td>
                                                    <td><?php echo $row->total_responden; ?></td>
                                                    <td><?php echo number_format($row->ikm, 2); ?></td>
                                                    <td><?php echo $row->mutu; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Unit Kerja Terkait</li>

                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5"><?= $title ?></h1>
                </div> -->
                <br>

                <!-- <form action="" method="post" class="mb-2">
                    <input type="hidden" name="responden" value="<?= $skm['responden'] ?>">
                    <button type="submit" class="btn btn-primary"><i class="ti ti-reload"></i> Sinkronisasi</button>

                </form> -->
                <?php foreach ($hasilike as $hs) : ?>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="mb-2 d-flex justify-content-center">
                                            <!-- <a href="<?= base_url() ?>hasil/print/<?= $hs['id_skm'] ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a> -->
                                            <p class="text-bold"><?= $hs['nama'] ?></p>
                                        </div>
                                        <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                            <thead class="align-middle text-center">
                                                <tr>
                                                    <th colspan="5">TRIWULAN <?= $hs['triwulan'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>TAHUN</th>
                                                    <th>RESPONDEN</th>
                                                    <th>NILAI IKM</th>
                                                    <th>MUTU PELAYANAN</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr class="align-middle">
                                                    <td><?= $hs['tahun'] ?></td>
                                                    <td><?= $hs['responden'] ?></td>
                                                    <td><?= number_format($hs['ikm'], 2) ?></td>
                                                    <td><?= $hs['mutu'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>