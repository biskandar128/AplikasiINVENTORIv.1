<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Form Ubah Data Barang</h4>
                        <p class="card-category">
                            Form untuk mengubah data barang
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="<?= site_url('petugas/ubahBarang'); ?>" method="post">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Barang</label>
                                <input type="hidden" name="barang_id" value="<?= $detail['barang_id']; ?>">
                                <input type="text" name="namaBarang" value="<?= $detail['namaBarang']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="selectpicker form-control" name="kategori_id" data-style="btn btn-link" data-live-search="true">
                                    <option disabled selected>Pilih Kategori</option>
                                    <?php if (!empty($kategori)) : $i = 1; foreach ($kategori as $value) : ?>
                                        <option value="<?= $value->kategori_id; ?>" <?= $detail['kategori_id'] === $value->kategori_id ? 'selected' : ''; ?>><?= $value->nama_kategori; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Harga</label>
                                <input type="number" value="<?= $detail['harga']; ?>" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="selectpicker form-control" name="supplier_id" data-style="btn btn-link" data-live-search="true">
                                    <option disabled selected>Pilih Supplier</option>
                                    <?php if (!empty($supplier)) : $i = 1; foreach ($supplier as $value) : ?>
                                        <option value="<?= $value->supplier_id; ?>" <?= $detail['supplier_id'] === $value->supplier_id ? 'selected' : ''; ?> ><?= $value->nama_supplier; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <a href="<?= site_url('petugas/barang'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>