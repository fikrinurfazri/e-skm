<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Menu</a></li>
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
                                    <th>Link</th>
                                    <th>Triwulan</th>
                                    <th>Tahun</th>
                                    <th>ACT</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kuisioner as $n) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><a href="<?= base_url() ?>home/kuis/<?= $n['link'] ?>" target="_blank"><?= base_url('home/kuis/' . $n['link']) ?></a></td>
                                            <td><?= $n['triwulan'] ?></td>
                                            <td><?= $n['tahun'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id_kuisioner'] ?>">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <a href="<?= base_url() ?>kuisioner/delete/<?= $n['id_kuisioner'] ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                                            </td>


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
                <form action="<?= base_url('tambah-kuisioner') ?>" method="post">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php foreach ($tahun as $t) : ?>
                                <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <input type="hidden" class="form-control" value="<?= $user['id_user'] ?>" name="id_user" id="id_user">
                        <input type="hidden" class="form-control" value="<?= $user['username'] ?>" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="triwulan" class="form-label">Triwulan</label>
                        <select name="triwulan" id="triwulan" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
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
foreach ($kuisioner as $n) : $no++
?>
    <div class="modal fade" id="exampleModal<?= $n['id_kuisioner'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/update') ?>" method="post">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $n['tahun'] ?>">
                            <input type="hidden" class="form-control" name="id_kuisioner" id="id_kuisioner" value="<?= $n['id_kuisioner'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="triwulan" class="form-label">triwulan</label>
                            <input type="number" class="form-control" name="triwulan" id="triwulan" value="<?= $n['triwulan'] ?>">
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