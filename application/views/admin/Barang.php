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
                        <h4 class="card-title">Data Barang<button type="button" data-toggle="modal" data-target="#modalBarang" class="btn btn-rose float-right">Tambah Data</button></h4>
                        <p class="card-category">
                            Daftar barang dalam gudang
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Supplier</th>
                                <th></th>
                            </thead>
                            <tbody>                                
                                <?php if (!empty($barang)) : $i = 1; foreach ($barang as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->namaBarang; ?></td>
                                    <td><?= $value->nama_kategori; ?></td>
                                    <td><?= $value->harga; ?></td>
                                    <td><?= $value->stok; ?></td>
                                    <td><?= $value->nama_supplier; ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/barang/'.$value->barang_id.'/view'); ?>" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="<?= site_url('admin/hapusBarang/'.$value->barang_id); ?>" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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

<!-- Modal Barang -->
<!-- Modal -->
<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/tambahBarang'); ?>" method="post">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Barang</label>
                        <input type="text" name="namaBarang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="selectpicker form-control" name="kategori_id" data-style="btn btn-link" data-live-search="true">
                            <option disabled selected>Pilih Kategori</option>
                            <?php if (!empty($kategori)) : $i = 1; foreach ($kategori as $value) : ?>
                                <option value="<?= $value->kategori_id; ?>"><?= $value->nama_kategori; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Harga</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="selectpicker form-control" name="supplier_id" data-style="btn btn-link" data-live-search="true">
                            <option disabled selected>Pilih Supplier</option>
                            <?php if (!empty($supplier)) : $i = 1; foreach ($supplier as $value) : ?>
                                <option value="<?= $value->supplier_id; ?>"><?= $value->nama_supplier; ?></option>
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