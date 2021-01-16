<div class="content">
    <div class="container-fluid">
        <?php if ($this->session->flashdata('flash') == 'ditambah') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
                <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php elseif ($this->session->flashdata('flash') == 'dihapus') : ?>
            <div class="alert alert-rose alert-dismissible fade show" role="alert">
                Data berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
                <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php elseif ($this->session->flashdata('flash') == 'diubah') : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Data berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
                <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>
        <!-- CARD FOR DATA BARANG MASUK & BARANG KELUAR -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Data Barang Keluar<a href="<?= site_url('admin/printBarangKeluar'); ?>" class="btn btn-info float-right">Cetak Laporan</a><button type="button" data-toggle="modal" data-target="#modalSupplier" class="btn btn-rose float-right">Tambah Data</button></h4>
                        <p class="card-category">
                            Daftar barang keluar gudang
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tanggal Keluar</th>
                                <th>Stok</th>
                                <th>Tujuan</th>
                                <th>Total</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if (!empty($barang_keluar)) : $i = 1; foreach ($barang_keluar as $value) : ?>
                                
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->namaBarang; ?></td>
                                    <td><?= $value->tanggal_keluar; ?></td>
                                    <td><?= $value->stok_keluar; ?></td>
                                    <td><?= $value->nama_perusahaan; ?></td>
                                    <td><?= $value->total; ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/barang_keluar/'.$value->id.'/view'); ?>" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="<?= site_url('admin/hapusBarangKeluar/'.$value->id); ?>" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>

                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Supplier -->
<!-- Modal -->
<div class="modal fade" id="modalSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/tambahBarangKeluar'); ?>" method="post">
                    <div class="form-group">
                        <label class="">Pilih Barang</label>
                        <select class="selectpicker form-control" name="barang_id" data-style="btn btn-link" data-live-search="true">
                            <option disabled selected>Pilih Barang</option>
                            <?php if (!empty($barang)) : $i = 1; foreach ($barang as $value) : ?>
                                <option value="<?= $value->barang_id; ?>"><?= $value->namaBarang; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="datetime-local" name="tanggal_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Stok Keluar</label>
                        <input type="number" name="stok_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Total</label>
                        <input type="number" name="total" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="">Pilih Tujuan</label>
                        <select class="selectpicker form-control" name="tujuan_id" data-style="btn btn-link" data-live-search="true">
                            <option disabled selected>Pilih Tujuan</option>
                            <?php if (!empty($perusahaan)) : $i = 1; foreach ($perusahaan as $value) : ?>
                                <option value="<?= $value->tujuan_id; ?>"><?= $value->nama_perusahaan; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>