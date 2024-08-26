<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barang Masuk</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body> -->
    <!-- <div class="container-fluid">
        <h1>Barang Masuk</h1>
        <form action="<?php echo base_url(). 'barang_masuk/store'; ?>" method="post">
        <div class="form-group">
                <label for="no_inventori">No Inventori</label>
                <input type="text" class="form-control" id="no_inventori" name="no_inventori">
            </div>
        <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control"  name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" class="form-control"  name="jenis_barang" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control"  name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="masa_pakai">Masa Pakai</label>
                <input type="number" class="form-control"  name="masa_pakai" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control"  name="status" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control"  name="tanggal_masuk" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div> -->
<!-- </body>
</html> -->
<div class="container-fluid">
        <h1>Barang Masuk</h1>
        <!-- <a href="<?= base_url('barang_masuk/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Barang</a> -->
        <form action="<?php echo base_url(). 'barang_masuk/simpan_barang'; ?>" method="post">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div class="form-group">
                <label for="no_inventori">No Inventori</label>
                <input type="text" class="form-control" id="no_inventori" name="no_inventori">
            </div>
        <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control"  name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" class="form-control"  name="jenis_barang" required>
            </div>
            <div class="form-group">
                <label for="qty">Jumlah</label>
                <input type="number" class="form-control"  name="qty" required>
            </div>
            <div class="form-group">
                <label for="masa_pakai">Masa Pakai</label>
                <input type="number" class="form-control"  name="masa_pakai" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control"  name="status" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Masuk</label>
                <input type="date" class="form-control"  name="tanggal" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>Reset</button>
        </form>
                <br>
                <br>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th class="bg-primary" style="color: black">No Inventori</th>
                                <th class="bg-primary" style="color: black">Nama Barang</th>
                                <th class="bg-primary" style="color: black">Jenis Barang</th>
                                <th class="bg-primary" style="color: black">Jumlah</th>
                                <th class="bg-primary" style="color: black">Masa Pakai</th>
                                <th class="bg-primary" style="color: black">Status</th>
                                <th class="bg-primary" style="color: black">Tanggal Masuk</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Bulpoin</td>
                                <td>ATK</td>
                                <td>10</td>
                                <td>2025/04/25</td>
                                <td>Aktif</td>
                                <td>2024/04/25</td>
                            </tr>
                            <tr>
                            <td></td>
                                <td>Buku</td>
                                <td>ATK</td>
                                <td>10</td>
                                <td>2025/04/25</td>
                                <td>Aktif</td>
                                <td>2024/04/25</td>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    </div>
