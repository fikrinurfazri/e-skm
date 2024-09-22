<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 text-center mx-auto">
                <h1 class="mb-5">Hasil Survei Tahun <?= $tahun ?></h1>
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
                                            <th colspan="5">TRIWULAN 1</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>UNIT KERJA</th>
                                            <th>RESPONDEN</th>
                                            <th>NILAI IKM</th>
                                            <th>MUTU PELAYANAN</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        $no = 1;
                                        foreach ($detail as $hs) : ?>
                                            <tr class="align-middle">
                                                <td><?= $no++ ?></td>
                                                <td><?= $hs['nama'] ?></td>
                                                <td><?= $hs['responden'] ?></td>
                                                <td><?php echo number_format($hs['ikm'], 2); ?></td>

                                                <td><?= $hs['mutu'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                    <thead class="align-middle text-center">
                                        <tr>
                                            <th colspan="5">TRIWULAN 2</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>UNIT KERJA</th>
                                            <th>RESPONDEN</th>
                                            <th>NILAI IKM</th>
                                            <th>MUTU PELAYANAN</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        $no = 1;
                                        foreach ($detail2 as $hs) : ?>
                                            <tr class="align-middle">
                                                <td><?= $no++ ?></td>
                                                <td><?= $hs['nama'] ?></td>
                                                <td><?= $hs['responden'] ?></td>
                                                <td><?php echo number_format($hs['ikm'], 2); ?></td>
                                                <td><?= $hs['mutu'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                    <thead class="align-middle text-center">
                                        <tr>
                                            <th colspan="5">TRIWULAN 3</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>UNIT KERJA</th>
                                            <th>RESPONDEN</th>
                                            <th>NILAI IKM</th>
                                            <th>MUTU PELAYANAN</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        $no = 1;
                                        foreach ($detail3 as $hs) : ?>
                                            <tr class="align-middle">
                                                <td><?= $no++ ?></td>
                                                <td><?= $hs['nama'] ?></td>
                                                <td><?= $hs['responden'] ?></td>
                                                <td><?php echo number_format($hs['ikm'], 2); ?></td>
                                                <td><?= $hs['mutu'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" style="font-size:12px;" width="50%" cellspacing="0">
                                    <thead class="align-middle text-center">
                                        <tr>
                                            <th colspan="5">TRIWULAN 4</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>UNIT KERJA</th>
                                            <th>RESPONDEN</th>
                                            <th>NILAI IKM</th>
                                            <th>MUTU PELAYANAN</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        $no = 1;
                                        foreach ($detail4 as $hs) : ?>
                                            <tr class="align-middle">
                                                <td><?= $no++ ?></td>
                                                <td><?= $hs['nama'] ?></td>
                                                <td><?= $hs['responden'] ?></td>
                                                <td><?php echo number_format($hs['ikm'], 2); ?></td>
                                                <td><?= $hs['mutu'] ?></td>
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