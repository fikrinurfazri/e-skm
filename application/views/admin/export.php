<section class="content-header mb-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Hasil</a></li>
                    <li class="breadcrumb-item active"> <?= $title ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-success shadow-lg">
                    <div class="card-header">
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif ?>
                        <div class="d-flex">

                            <!-- <a href="<?= base_url() ?>export/export" class="btn btn-primary">
                                <i class="ti ti-export"></i> Export
                            </a> -->

                        </div>
                        <form class="row g-3" action="<?= base_url() ?>export/export">
                            <div class="col-auto">
                                <select name="" class="form-control" id="">
                                    <option value="">--Pilih Periode--</option>
                                    <?php foreach ($periode as $p) : ?>
                                        <option value="<?= $p['tahun'] ?>"><?= $p['tahun'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>NO</th>
                                <th>Responden</th>
                                <th>IKM</th>
                                <th>Mutu</th>
                                <th>Triwulan</th>
                                <th>Tahun</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($skm as $n) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $n->responden ?></td>
                                        <td><?= $n->ikm ?></td>
                                        <td><?= $n->mutu ?></td>
                                        <td><?= $n->triwulan ?></td>
                                        <td><?= $n->tahun ?></td>


                                    </tr>

                                <?php endforeach ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>