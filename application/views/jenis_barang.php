<?= $this->session->flashdata('pesan_tambah'); ?>
<?= $this->session->flashdata('pesan_edit'); ?>
<?= $this->session->flashdata('pesan_hapus'); ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h4 mb-0 text-gray-800" style="color: black; font-weight: bold;">Jenis Barang</h1>
        <!-- <a href="" class="btn btn-primary">Tambah Jenis</a> -->
    </div>
    <div class="card-header">
        <a href="<?php echo base_url('jenis_barang/tambah_jenis') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>Tambah Jenis</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Jenis Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td class="bg-primary" style="color: white; font-weight: bold;" width="5%">No</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Jenis Barang</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;" width="12%">Aksi</td>
                            <!-- <th scope="col"> Name</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jenis as $js) : ?>
                            <tr>
                                <td><?php echo $no++ ?> </td>
                                <td><?php echo $js->jenis_barang; ?> </td>
                                <td>
                                    <a href="<?php echo base_url('jenis_barang/edit_jenis/' . urlencode($js->jenis_barang)); ?>"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit">Edit</i>
                                    </a>
                                    <a href="<?php echo base_url('jenis_barang/hapus_jenis/' . $js->jenis_barang); ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus jenis barang ini?')">
                                        <i class="fas fa-trash">Hapus</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal Edit -->
<!-- <?php foreach ($jenis as $js) : ?>
<div class="modal fade" id="edit<?= $js->jenis_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('jenis_barang/edit_jenis' . $js->jenis_barang) ?>">
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input type="text" name="jenis_barang" class="form-control" value="<?= $js->jenis_barang ?>">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?> -->