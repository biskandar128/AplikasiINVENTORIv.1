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
                        <form action="<?= site_url('petugas/ubahKategori'); ?>" method="post">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Kategori</label>
                                <input type="hidden" name="kategori_id" value="<?= $detail['kategori_id']; ?>">
                                <input type="text" name="nama_kategori" value="<?= $detail['nama_kategori']; ?>" class="form-control" required>
                            </div>
                            <a href="<?= site_url('petugas/perusahaan'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>