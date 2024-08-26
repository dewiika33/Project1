<?= $this->session->flashdata('pesan_tambah'); ?>
<?= $this->session->flashdata('pesan_edit'); ?>
<?= $this->session->flashdata('pesan_hapus'); ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h4 mb-0 text-gray-800" style="color: black; font-weight: bold;">Nama Barang</h1>
    </div>
    <div class="card-header">
        <a href="<?php echo base_url('nama_barang/tambah_nama') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>Tambah Nama</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Nama Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td class="bg-primary" style="color: white; font-weight: bold;" width="5%">No</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Nama Barang</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;" width="12%">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($nama as $nm) : ?>
                            <tr>
                                <td><?php echo $no++ ?> </td>
                                <td><?php echo $nm->nama_barang; ?> </td>
                                <td>
                                    <a href="<?php echo base_url('nama_barang/edit_nama/' . urlencode($nm->nama_barang)); ?>"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit">Edit</i></a>
                                    <a href="<?php echo base_url('nama_barang/hapus_nama/' . $nm->nama_barang); ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus nama barang ini?')">
                                        <i class="fas fa-trash">Hapus</i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nama Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->