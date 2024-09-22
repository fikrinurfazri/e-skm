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
                                                <th>NO</th>
                                                <th>TAHUN</th>
                                                <th>TRIWULAN</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        foreach ($kuis as $row) : ?>
                                            <tbody class="text-center">
                                                <tr class="align-middle">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->tahun; ?></td>
                                                    <td><?php echo $row->triwulan; ?></td>
                                                    <td><a href="<?= base_url() ?>hasil/detailresp/<?= $row->id_kuisioner ?>" class="btn btn-success">Lihat Responden</a></td>
                                                    <td><a href="<?= base_url() ?>export/export/<?= $row->id_kuisioner ?>" class="btn btn-warning">Eport to Excel</a></td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach ?>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>