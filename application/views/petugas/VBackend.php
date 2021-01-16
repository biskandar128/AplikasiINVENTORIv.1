<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SI Inventori Barang</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" href="<?= site_url('asset/backend/assets/js/datatables/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?= site_url('asset/backend/assets/css/material-dashboard.css'); ?>" rel="stylesheet" />
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= site_url('asset/backend/assets/css/bootstrap-select.min.css'); ?>">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= site_url('asset/backend/assets/demo/demo.css'); ?>" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="azure" data-background-color="white" data-image="<?= site_url('asset/backend/assets/img/sidebar-1.jpg'); ?>">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">Inventori Barang</a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item <?= ($navlink === 'beranda') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/index'); ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'supplier') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/supplier'); ?>">
                            <i class="material-icons">person</i>
                            <p>Supplier</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'perusahaan') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/perusahaan'); ?>">
                            <i class="material-icons">store</i>
                            <p>Perusahaan</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'barang') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/barang'); ?>">
                            <i class="material-icons">source</i>
                            <p>Barang</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'kategori') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/kategori'); ?>">
                            <i class="material-icons">notifications</i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'barang_masuk') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/barang_masuk'); ?>">
                            <i class="material-icons">add_task</i>
                            <p>Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($navlink === 'barang_keluar') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('petugas/barang_keluar'); ?>">
                            <i class="material-icons">bookmarks</i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Halaman Petugas</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">Account</p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="<?= site_url('petugas/logout'); ?>">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            


            <!-- Main Data -->
            <?php $this->load->view($content); ?>
            <!-- End of Main Data -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , made with <i class="material-icons">favorite</i> by Bayu Iskandar.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= site_url('asset/backend/assets/js/core/jquery.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jquery.validate.min.js'); ?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  --><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="<?= site_url('asset/backend/assets/js/datatables/jquery.dataTables.min.js'); ?>"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/nouislider.min.js'); ?>"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/arrive.min.js'); ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= site_url('asset/backend/assets/js/material-dashboard.js?v=2.1.2'); ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= site_url('asset/backend/assets/demo/demo.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/script.js'); ?>"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>