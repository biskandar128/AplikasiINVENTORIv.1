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
                        <form action="<?= site_url('admin/ubahBarangKeluar'); ?>" method="post">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Barang</label>
                                <input type="hidden" name="id" value="<?= $detail['id']; ?>">
                                <input type="hidden" name="barang_id" value="<?= $barang->barang_id; ?>">
                                <input type="text" name="namaBarang" value="<?= $barang->namaBarang; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="datetime-local" name="tanggal_keluar" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($detail['tanggal_keluar'])); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Stok Keluar</label>
                                <input type="number" name="stok_keluar" class="form-control" value="<?= $detail['stok_keluar']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Total</label>
                                <input type="number" name="total" class="form-control" value="<?= $detail['total']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="">Pilih Tujuan</label>
                                <select class="selectpicker form-control" name="tujuan_id" data-style="btn btn-link" data-live-search="true">
                                    <option disabled selected>Pilih Tujuan</option>
                                    <?php if (!empty($perusahaan)) : $i = 1; foreach ($perusahaan as $value) : ?>
                                        <option value="<?= $value->tujuan_id; ?>" <?= $detail['tujuan_id'] === $value->tujuan_id ? 'selected' : ''; ?>><?= $value->nama_perusahaan; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <a href="<?= site_url('admin/barang_masuk'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>