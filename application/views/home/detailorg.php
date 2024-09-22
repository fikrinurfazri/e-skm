<div class="content-wrapper">
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5">HASIL SURVEY <?= $opd['nama'] ?></h1>
                </div>
                <?php foreach ($hasil as $hs) : ?>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">

                                        <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                            <thead class="align-middle text-center">
                                                <tr>
                                                    <th colspan="5">TAHUN <?= $hs['tahun'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>TRIWULAN</th>
                                                    <th>RESPONDEN</th>
                                                    <th>NILAI IKM</th>
                                                    <th>MUTU PELAYANAN</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr class="align-middle">
                                                    <td><?= $hs['triwulan'] ?></td>
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
            <br><br>
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5">HASIL SURVEY UNIT KERJA TERKAIT</h1>
                </div>
                <?php foreach ($hasillike as $hs) : ?>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">

                                        <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                            <thead class="align-middle text-center">
                                                <tr>
                                                    <th colspan="5"><?= $hs['nama'] ?> TAHUN <?= $hs['tahun'] ?> </th>
                                                </tr>
                                                <tr>
                                                    <th>TRIWULAN</th>
                                                    <th>RESPONDEN</th>
                                                    <th>NILAI IKM</th>
                                                    <th>MUTU PELAYANAN</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr class="align-middle">
                                                    <td><?= $hs['triwulan'] ?></td>
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