<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add_task</i>
                        </div>
                        <p class="card-category">Barang Masuk <small>(hari)</small></p>
                        <h3 class="card-title counter"><?= $harianBM; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">add_task</i> Total Barang Masuk
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">exit_to_app</i>
                        </div>
                        <p class="card-category">Barang Keluar <small>(hari)</small></p>
                        <h3 class="card-title counter"><?= $harianBK; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">exit_to_app</i> Total Barang Keluar
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Barang</p>
                        <h3 class="card-title counter"><?= $jmlBarang; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Info Barang Dalam Gudang
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">done_all</i>
                        </div>
                        <p class="card-category">Partner</p>
                        <h3 class="card-title counter"><?= $jmlPartner; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Jumlah Partner
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD FOR DATA BARANG MASUK & BARANG KELUAR -->
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose">
                        <h4 class="card-title">Barang Masuk</h4>
                        <p class="card-category">
                            Pada 15 September, 2016
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-rose">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Supplier</th>
                                <th>Masuk</th>
                            </thead>
                            <tbody>
                                <?php if (!empty($barang_masuk)) : $i = 1; foreach ($barang_masuk as $value) : ?>
                                
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->namaBarang; ?></td>
                                    <td><?= $value->nama_kategori; ?></td>
                                    <td><?= $value->nama_supplier; ?></td>
                                    <td><?= $value->stok_masuk; ?></td>
                                </tr>

                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Barang Keluar</h4>
                        <p class="card-category">
                            Pada 15 September, 2016
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Tujuan</th>
                                <th>Keluar</th>
                            </thead>
                            <tbody>
                                <?php if (!empty($barang_keluar)) : $i = 1; foreach ($barang_keluar as $value) : ?>
                                
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->namaBarang; ?></td>
                                    <td><?= $value->nama_kategori; ?></td>
                                    <td><?= $value->nama_perusahaan; ?></td>
                                    <td><?= $value->stok_keluar; ?></td>
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