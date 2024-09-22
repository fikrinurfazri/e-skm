<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
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

                            <table class="table" id="tableperiode">
                                <thead>
                                    <th>NO</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>ACT</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($periode as $n) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $n['tahun'] ?></td>
                                            <td><?= $n['active'] ?></td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><button type="button" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id_periode'] ?>">
                                                                <i class="ti ti-edit"></i> Edit
                                                            </button></li>
                                                        <li> <a href="<?= base_url() ?>admin/deleteperiode/<?= $n['id_periode'] ?>" class="dropdown-item"><i class="ti ti-trash"></i> Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
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
                <form action="<?= base_url('admin/tambahperiode') ?>" method="post">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun">
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

<?php
$no = 0;
foreach ($periode as $n) : $no++
?>
    <div class="modal fade" id="exampleModal<?= $n['id_periode'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/updateperiode') ?>" method="post">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $n['tahun'] ?>">
                            <input type="hidden" class="form-control" name="id_periode" id="id_periode" value="<?= $n['id_periode'] ?>">
                        </div>
                        <div class="mb-1">
                            <label for="ya" class="form-label">Active</label>
                        </div>
                        <div class="mb-1">
                            <input type="radio" name="active" id="ya" value="1">
                            <label for="ya" class="form-label">YA</label>
                        </div>
                        <div class="mb-1">
                            <input type="radio" name="active" id="tidak" value="0">
                            <label for="tidak" class="form-label">TIDAK</label>
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