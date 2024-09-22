<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Hasil skm</a></li>
                        <li class="breadcrumb-item active"> <?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5">Hasil Survei </h1>
                </div>

                <br>


                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-lg">
                                <div class="card-body">

                                    <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                        <thead class="align-middle text-center">
                                            <tr>
                                                <th colspan="5">TRIWULAN <?= $hs['triwulan'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>PELAYANAN</th>
                                                <th>AKSI</th>

                                            </tr>
                                        </thead>

                                        <tbody class="text-center">
                                            <?php foreach ($pelayanan as $hs) : ?>

                                                <tr class="align-middle">
                                                    <td><?= $hs['pelayanan'] ?></td>
                                                    <td><a href="<?= base_url() ?>hasil/detailpel/<?= $hs['id_pelayanan'] ?>"></a></td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>