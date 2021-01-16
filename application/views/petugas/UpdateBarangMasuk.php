<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Form Ubah Data Kategori</h4>
                        <p class="card-category">
                            Form untuk mengubah data kategori
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="<?= site_url('petugas/ubahBarangMasuk'); ?>" method="post">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Barang</label>
                                <input type="hidden" name="id" value="<?= $detail['id']; ?>">
                                <input type="hidden" name="barang_id" value="<?= $barang->barang_id; ?>">
                                <input type="text" name="nama_barang" value="<?= $barang->namaBarang; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="datetime-local" name="tanggal_masuk" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($detail['tanggal_masuk'])); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Stok Masuk</label>
                                <input type="number" name="stok_masuk" class="form-control" value="<?= $detail['stok_masuk']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Total</label>
                                <input type="number" name="total" class="form-control" value="<?= $detail['total']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="">Pilih Supplier</label>
                                <select class="selectpicker form-control" name="supplier_id" data-style="btn btn-link" data-live-search="true">
                                    <option disabled selected>Pilih Supplier</option>
                                    <?php if (!empty($supplier)) : $i = 1; foreach ($supplier as $value) : ?>
                                        <option value="<?= $value->supplier_id; ?>" <?= $detail['supplier_id'] === $value->supplier_id ? 'selected' : ''; ?>><?= $value->nama_supplier; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <a href="<?= site_url('petugas/barang_masuk'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>