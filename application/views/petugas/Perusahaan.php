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
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Data Perusahaan<button type="button" data-toggle="modal" data-target="#modalPerusahaan" class="btn btn-secondary float-right">Tambah Data</button></h4>
                        <p class="card-category">
                            Daftar perusahaan yang bekerja sama
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-success">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if (!empty($perusahaan)) : $i = 1; foreach ($perusahaan as $value) : ?>
                                
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->nama_perusahaan; ?></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td><?= $value->no_telp; ?></td>
                                    <td>
                                        <a href="<?= site_url('petugas/perusahaan/'.$value->tujuan_id.'/view'); ?>" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
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
<!-- Modal Perusahaan -->
<!-- Modal -->
<div class="modal fade" id="modalPerusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('petugas/tambahPerusahaan'); ?>" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nomor Telepon</label>
                        <input type="number" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>