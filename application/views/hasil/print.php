<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-skm tasikmalaya</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/skm.png" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">


        <p align="center" class="mb-5">
            <span style="font-size: 25px"><b>INDEKS KEPUASAN MASYARAKAT (IKM)</b></span> <br>
            <span style="font-size: 25px"><b><?= strtoupper($hasil->nama) ?></b></span> <br>
            <span style="font-size: 25px"><b>PEMERINTAH KOTA TASIKMALAYA</b></span> <br>
            <span style="font-size: 25px"><b>TRIWULAN <?= $hasil->triwulan ?> TAHUN <?= $hasil->tahun ?></b></span> <br>
        </p>

        <table class="table text-center table-bordered" style="border: 3px solid black;border-collapse: collapse;font-size: 11px" width="70%">
            <thead>
                <tr>
                    <th style="border: 3px solid black;">>NILAI IKM</th>
                    <th>LAYANAN <?= $hasil->nama ?></th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td rowspan="8" style="border: 3px solid black; font-size: 200px; height:250px" align="center" width="60%">
                        <b>
                            <?= $hasil->mutu ?>
                        </b>
                    </td>
                    <td rowspan="8" style="border: 3px solid black;">
                        <ul class="list-group col-12">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Responden
                                <span class="badge bg-primary rounded-pill"><?= $hasil->responden ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Jenis Kelamin
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Laki-laki
                                        <span class="badge bg-primary rounded-pill"><?= $laki ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Perempuan &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $perempuan ?></span>
                                    </li>
                                </ul>

                            </li>
                            <li class="list-group-item d-flex justify-content-between ">
                                Pendidikan
                                <ul class="list-group">
                                    <li class="mb-1 d-flex justify-content-between align-items-center">SD
                                        <span class="badge bg-primary rounded-pill"><?= $sd ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">SMP &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $smp ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">SMA &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $sma ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">D3 &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $d3 ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">S1 &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $s1 ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">S2 &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $s2 ?></span>
                                    </li>
                                    <li class="mb-1 d-flex justify-content-between align-items-center">S3 &nbsp;
                                        <span class="badge bg-primary rounded-pill"><?= $s3 ?></span>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Periode : Triwulan <?= $hasil->triwulan ?>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>



        </p>

        <br>

        <h5 align=" center">
            TERIMAKASIH ATAS PENILAIAN YANG TELAH ANDA BERIKAN

            MASUKAN ANDA SANGAT BERMANFAAT UNTUK KEMAJUAN UNIT KAMI AGAR TERUS MEMPERBAIKI

            DAN MENINGKATKAN KUALITAS PELAYANAN BAGI MASYARAKAT
        </h5>
        <br><br>
        <p>

        </p>



        <p class="footer">
            <small><?= $hasil->nama ?></small>
        </p>
        </td>
        </tr>
        </table>


    </div>


</body>
<script>
    window.print()
</script>

</html>