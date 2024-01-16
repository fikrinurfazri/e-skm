<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ti ti-plus"></i> Tambah
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>NO</th>
                                    <th>NOMOR SURAT</th>
                                    <th>TANGGAL</th>
                                    <th>PERIHAL</th>
                                    <th>PEMOHON</th>
                                    <th>TUJUAN</th>
                                    <th>ACT</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($nomor as $n) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $n['nomor'] ?></td>
                                            <td><?= $n['tanggal'] ?></td>
                                            <td><?= $n['perihal'] ?></td>
                                            <td><?= $n['pemohon'] ?></td>
                                            <td><?= $n['penerima'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id_surat'] ?>">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <a href="<?= base_url() ?>admin/delete/<?= $n['id_surat'] ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                                            </td>
                                            <?php if ($n['active'] == 0) : ?>
                                                <td>
                                                    <form action="<?= base_url('admin/validasi') ?>" method="post">
                                                        <input type="hidden" name="active" value="1">
                                                        <input type="hidden" name="id_surat" value="<?= $n['id_surat'] ?>">
                                                        <button type="submit" class="btn btn-warning"><i class="ti ti-check"></i></button>
                                                    </form>
                                                </td>
                                            <?php endif ?>

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

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah') ?>" method="post">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" class="form-control" name="nomor" id="nomor">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <textarea name="perihal" id="perihal" cols="3" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pemohon" class="form-label">Pemohon</label>
                        <input type="text" class="form-control" name="pemohon" id="pemohon">
                    </div>
                    <div class="mb-3">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="text" class="form-control" name="penerima" id="penerima">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit-->
<?php
$no = 0;
foreach ($nomor as $n) : $no++
?>
    <div class="modal fade" id="exampleModal<?= $n['id_surat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/update') ?>" method="post">
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor</label>
                            <input type="text" class="form-control" name="nomor" id="nomor" value="<?= $n['nomor'] ?>">
                            <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="<?= $n['id_surat'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $n['tanggal'] ?>">
                        </div>
                        <div class=" mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <textarea name="perihal" id="perihal" cols="3" rows="3" class="form-control"> <?= $n['perihal'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pemohon" class="form-label">Pemohon</label>
                            <input type="text" class="form-control" name="pemohon" id="pemohon" value="<?= $n['pemohon'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Penerima</label>
                            <input type="text" class="form-control" name="penerima" id="penerima" value="<?= $n['penerima'] ?>">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>