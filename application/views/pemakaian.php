<?= $this->session->flashdata('pesan_tambah'); ?>
<?= $this->session->flashdata('pesan_gagal'); ?>
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h1 class="h3 mb-0 text-gray-800" style="color: black; font-weight: bold;">Pemakaian Barang</h1>
        </div>
        <br>
        <form class="center" method="post" action="<?php echo base_url() . 'pemakaian/aksi_tambah_pakai'; ?>">
            <div class="form-group">
                <label>Id Pemakaian</label>
                <input type="text" name="id_pemakaian" class="form-control"
                    value="<?= $newKode; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <select name="no_inventori" class="form-control select2">
                    <?php foreach ($datanama as $dn): ?>
                        <option value="<?php echo $dn->no_inventori ?>">
                            <?php echo $dn->no_inventori . " - " . $dn->nama_barang . " (" . $dn->qty . ")" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="<?= set_value('jumlah'); ?>"
                    placeholder="Masukan Jumlah" class="form-control">
                <?= form_error('jumlah', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                
                <input type="date" name="tanggal" class="form-control"
                value="<?= date('Y-m-d'); ?>"
                    min="<?= date('Y-m-d'); ?>"
                    max="<?= date('Y-m-d'); ?>">
            </div>
            <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan </button>
        </form>
    </div>
    <br>
    <br>


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h1 class="h3 mb-0 text-gray-800" style="color: black; font-weight: bold;">Daftar Barang Terpakai</h1>
        </div>
        <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">Daftar Barang Yang Sudah Dipakai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="11%">Id Pemakaian</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="10%">No Invetori</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="12%">Tgl Pemakaian</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;">Nama Barang</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;">Jenis Barang</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="5%">Jumlah</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="10%">Masa Pakai</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="7%">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pemakaian) && !empty($pemakaian)): ?>
                                <?php foreach ($pemakaian as $pk): ?>
                                    <tr>
                                        <td><?php echo $pk->id_pemakaian; ?></td>
                                        <td><?php echo $pk->no_inventori; ?></td>
                                        <td><?php echo $pk->tanggal; ?></td>

                                        <td><?php echo $pk->nama_barang; ?></td>
                                        <td><?php echo $pk->jenis_barang; ?></td>

                                        <td><?php echo $pk->jumlah; ?></td>

                                        <td><?php echo $pk->masa_pakai; ?></td>
                                        <td><?php echo $pk->status; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">Tidak ada data tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>