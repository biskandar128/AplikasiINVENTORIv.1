<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CrudInventoryModel', 'crudModel');
        $this->load->library('session');
        $this->load->library('Pdf');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login/');
        }
    }

    public function index()
    {
        $table = 'barang';

        $onjoinMasuk = [
            'barang_masuk' => $table.'.barang_id=barang_masuk.barang_id',
            'kategori' => $table.'.kategori_id=kategori.kategori_id',
            'supplier' => 'barang_masuk.supplier_id=supplier.supplier_id',
        ];

        $onjoinKeluar = [
            'barang_keluar' => $table.'.barang_id=barang_keluar.barang_id',
            'kategori' => $table.'.kategori_id=kategori.kategori_id',
            'perusahaan' => 'barang_keluar.tujuan_id=perusahaan.tujuan_id',
        ];

        $dayBarangMasuk = [
                'day(tanggal_masuk)' => date('d'),
                'month(tanggal_masuk)' => date('m'),
                'year(tanggal_masuk)' => date('Y'),
        ];

        $dayBarangKeluar = [
                'day(tanggal_keluar)' => date('d'),
                'month(tanggal_keluar)' => date('m'),
                'year(tanggal_keluar)' => date('Y'),
        ];

        $data = [
            'barang_masuk' => $this->crudModel->getDataJoin($table, $onjoinMasuk),
            'barang_keluar' => $this->crudModel->getDataJoin($table, $onjoinKeluar),
            'harianBM' => $this->crudModel->getDataCount($dayBarangMasuk, 'barang_masuk'),
            'harianBK' => $this->crudModel->getDataCount($dayBarangKeluar, 'barang_keluar'),
            'jmlBarang' => $this->crudModel->getData('barang')->num_rows(),
            'jmlPartner' => $this->crudModel->getData('perusahaan')->num_rows(),
            'content' => 'admin/beranda',
            'navlink' => 'beranda',
        ];

        $this->load->view('admin/vbackend', $data);
    }

    public function supplier()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('supplier', 'supplier_id', $id)->row();

            $data = [
                'detail' => [
                    'supplier_id' => $tampil->supplier_id,
                    'nama_supplier' => $tampil->nama_supplier,
                    'no_telp' => $tampil->no_telp,
                    'alamat' => $tampil->alamat,
                ],
                'content' => 'admin/UpdateSupplier',
                'navlink' => 'supplier',
            ];
        } else {
            $data = [
                'supplier' => $this->crudModel->getData('supplier')->result(),
                'content' => 'admin/supplier',
                'navlink' => 'supplier',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function tambahSupplier()
    {
        $add = [
            'supplier_id' => $this->crudModel->generateCode(10, 'supplier_id', 'supplier'),
            'nama_supplier' => trim($this->input->post('nama_supplier')),
            'no_telp' => trim($this->input->post('no_telp')),
            'alamat' => trim($this->input->post('alamat')),
        ];

        $this->crudModel->addData('supplier', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('Admin/supplier'));
    }

    public function hapusSupplier()
    {
        $supplier_id = $this->uri->segment(3);

        $this->crudModel->deleteData('supplier', 'supplier_id', $supplier_id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('Admin/supplier'));
    }

    public function ubahSupplier()
    {
        $supplier_id = $this->input->post('supplier_id');

        $update = [
            'nama_supplier' => $this->input->post('nama_supplier'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->crudModel->updateData('supplier', 'supplier_id', $supplier_id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('Admin/supplier'));
    }

    public function perusahaan()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('perusahaan', 'tujuan_id', $id)->row();

            $data = [
                'detail' => [
                    'tujuan_id' => $tampil->tujuan_id,
                    'nama_perusahaan' => $tampil->nama_perusahaan,
                    'alamat' => $tampil->alamat,
                    'no_telp' => $tampil->no_telp,
                ],
                'content' => 'admin/UpdatePerusahaan',
                'navlink' => 'perusahaan',
            ];
        } else {
            $data = [
                'perusahaan' => $this->crudModel->getData('perusahaan')->result(),
                'content' => 'admin/perusahaan',
                'navlink' => 'perusahaan',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function tambahPerusahaan()
    {
        $add = [
            'tujuan_id' => $this->crudModel->generateCode(10, 'tujuan_id', 'perusahaan'),
            'nama_perusahaan' => trim($this->input->post('nama_perusahaan')),
            'no_telp' => trim($this->input->post('no_telp')),
            'alamat' => trim($this->input->post('alamat')),
        ];

        $this->crudModel->addData('perusahaan', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('Admin/perusahaan'));
    }

    public function hapusPerusahaan()
    {
        $tujuan_id = $this->uri->segment(3);

        $this->crudModel->deleteData('perusahaan', 'tujuan_id', $tujuan_id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('Admin/perusahaan'));
    }

    public function ubahPerusahaan()
    {
        $tujuan_id = $this->input->post('tujuan_id');

        $update = [
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->crudModel->updateData('perusahaan', 'tujuan_id', $tujuan_id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('Admin/perusahaan'));
    }

    public function barang()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('barang', 'barang_id', $id)->row();

            $data = [
                'detail' => [
                    'barang_id' => $tampil->barang_id,
                    'namaBarang' => $tampil->namaBarang,
                    'kategori_id' => $tampil->kategori_id,
                    'harga' => $tampil->harga,
                    'stok' => $tampil->stok,
                    'supplier_id' => $tampil->supplier_id,
                ],
                'content' => 'admin/UpdateBarang',
                'navlink' => 'barang',
                'supplier' => $this->db->query('SELECT supplier_id, nama_supplier FROM supplier')->result(),
                'kategori' => $this->db->query('SELECT * FROM kategori')->result(),
                ];
        } else {
            $table = 'barang';

            $onjoin = [
                'supplier' => $table.'.supplier_id=supplier.supplier_id',
                'kategori' => $table.'.kategori_id=kategori.kategori_id',
            ];
            $data = [
                'barang' => $this->crudModel->getDataJoin($table, $onjoin),
                'supplier' => $this->db->query('SELECT supplier_id, nama_supplier FROM supplier')->result(),
                'kategori' => $this->db->query('SELECT * FROM kategori')->result(),
                'content' => 'admin/barang',
                'navlink' => 'barang',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function tambahBarang()
    {
        $add = [
            'barang_id' => $this->crudModel->generateCode(10, 'barang_id', 'barang'),
            'namaBarang' => trim($this->input->post('namaBarang')),
            'kategori_id' => trim($this->input->post('kategori_id')),
            'harga' => trim($this->input->post('harga')),
            'stok' => 0,
            'supplier_id' => trim($this->input->post('supplier_id')),
        ];

        $this->crudModel->addData('barang', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('Admin/barang'));
    }

    public function hapusBarang()
    {
        $barang_id = $this->uri->segment(3);

        $this->crudModel->deleteData('barang', 'barang_id', $barang_id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('Admin/barang'));
    }

    public function ubahBarang()
    {
        $barang_id = $this->input->post('barang_id');

        $update = [
            'namaBarang' => trim($this->input->post('namaBarang')),
            'kategori_id' => trim($this->input->post('kategori_id')),
            'harga' => trim($this->input->post('harga')),
            'stok' => trim($this->input->post('stok')),
            'supplier_id' => trim($this->input->post('supplier_id')),
        ];

        $this->crudModel->updateData('barang', 'barang_id', $barang_id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('Admin/barang'));
    }

    public function kategori()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('kategori', 'kategori_id', $id)->row();

            $data = [
                'detail' => [
                    'kategori_id' => $tampil->kategori_id,
                    'nama_kategori' => $tampil->nama_kategori,
                ],
                'content' => 'admin/UpdateKategori',
                'navlink' => 'kategori',
            ];
        } else {
            $data = [
                'kategori' => $this->crudModel->getData('kategori')->result(),
                'content' => 'admin/kategori',
                'navlink' => 'kategori',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function tambahKategori()
    {
        $add = [
            'kategori_id' => $this->crudModel->generateCode(10, 'kategori_id', 'kategori'),
            'nama_kategori' => trim($this->input->post('nama_kategori')),
        ];

        $this->crudModel->addData('kategori', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('Admin/kategori'));
    }

    public function hapusKategori()
    {
        $kategori_id = $this->uri->segment(3);

        $this->crudModel->deleteData('kategori', 'kategori_id', $kategori_id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('Admin/kategori'));
    }

    public function ubahKategori()
    {
        $kategori_id = $this->input->post('kategori_id');

        $update = [
            'nama_kategori' => trim($this->input->post('nama_kategori')),
        ];

        $this->crudModel->updateData('kategori', 'kategori_id', $kategori_id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('Admin/kategori'));
    }

    public function barang_masuk()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('barang_masuk', 'id', $id)->row();

            $data = [
                'detail' => [
                    'id' => $tampil->id,
                    'tanggal_masuk' => $tampil->tanggal_masuk,
                    'stok_masuk' => $tampil->stok_masuk,
                    'total' => $tampil->total,
                    'supplier_id' => $tampil->supplier_id,
                ],
                'barang' => $this->db->query('SELECT barang_id, namaBarang FROM barang WHERE barang_id='.$tampil->barang_id)->row(),
                'supplier' => $this->db->query('SELECT supplier_id, nama_supplier FROM supplier')->result(),
                'content' => 'admin/UpdateBarangMasuk',
                'navlink' => 'barang_masuk',
            ];
        // var_dump(date('d-m-Y H:i', strtotime($tampil->tanggal_masuk)));
            // die;
        } else {
            $table = 'barang_masuk';

            $onjoin = [
                'barang' => $table.'.barang_id=barang.barang_id',
                'supplier' => $table.'.supplier_id=supplier.supplier_id',
            ];
            $data = [
                'barang_masuk' => $this->crudModel->getDataJoin($table, $onjoin),
                'barang' => $this->db->query('SELECT barang_id, namaBarang FROM barang')->result(),
                'supplier' => $this->db->query('SELECT supplier_id, nama_supplier FROM supplier')->result(),
                'content' => 'admin/barangmasuk',
                'navlink' => 'barang_masuk',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function tambahBarangMasuk()
    {
        $add = [
            'id' => $this->crudModel->generateCode(10, 'id', 'barang_masuk'),
            'barang_id' => trim($this->input->post('barang_id')),
            'tanggal_masuk' => trim($this->input->post('tanggal_masuk')),
            'stok_masuk' => trim($this->input->post('stok_masuk')),
            'total' => trim($this->input->post('total')),
            'supplier_id' => trim($this->input->post('supplier_id')),
        ];

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $add['barang_id'])->row();

        $update = [
            'stok' => $stok->stok + (int) $add['stok_masuk'],
        ];

        $this->crudModel->updateData('barang', 'barang_id', $add['barang_id'], $update);

        $this->crudModel->addData('barang_masuk', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('admin/barang_masuk'));
    }

    public function hapusBarangMasuk()
    {
        $id = $this->uri->segment(3);

        $stok_masuk = $this->crudModel->getDataWhere('barang_masuk', 'id', $id)->row();

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $stok_masuk->barang_id)->row();

        $update = [
            'stok' => $stok->stok - (int) $stok_masuk->stok_masuk,
        ];

        $this->crudModel->updateData('barang', 'barang_id', $stok_masuk->barang_id, $update);

        $this->crudModel->deleteData('barang_masuk', 'id', $id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('admin/barang_masuk'));
    }

    public function ubahBarangMasuk()
    {
        $id = $this->input->post('id');

        $barang_id = $this->input->post('barang_id');

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $barang_id)->row();

        $stok_masuk = $this->crudModel->getDataWhere('barang_masuk', 'id', $id)->row();

        $update = [
            'tanggal_masuk' => trim($this->input->post('tanggal_masuk')),
            'stok_masuk' => trim($this->input->post('stok_masuk')),
            'total' => trim($this->input->post('total')),
            'supplier_id' => trim($this->input->post('supplier_id')),
        ];

        $update_stok = [
            'stok' => $stok->stok - $stok_masuk->stok_masuk + (int) $update['stok_masuk'],
        ];

        $this->crudModel->updateData('barang', 'barang_id', $barang_id, $update_stok);

        $this->crudModel->updateData('barang_masuk', 'id', $id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('admin/barang_masuk'));
    }

    public function barang_keluar()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('barang_keluar', 'id', $id)->row();

            $data = [
                'detail' => [
                    'id' => $tampil->id,
                    'tanggal_keluar' => $tampil->tanggal_keluar,
                    'stok_keluar' => $tampil->stok_keluar,
                    'total' => $tampil->total,
                    'tujuan_id' => $tampil->tujuan_id,
                ],
                'barang' => $this->db->query('SELECT barang_id, namaBarang FROM barang WHERE barang_id='.$tampil->barang_id)->row(),
                'perusahaan' => $this->db->query('SELECT tujuan_id, nama_perusahaan FROM perusahaan')->result(),
                'content' => 'admin/UpdateBarangKeluar',
                'navlink' => 'barang_keluar',
            ];
        } else {
            $table = 'barang_keluar';

            $onjoin = [
                'barang' => $table.'.barang_id=barang.barang_id',
                'perusahaan' => $table.'.tujuan_id=perusahaan.tujuan_id',
            ];

            $data = [
                'barang_keluar' => $this->crudModel->getDataJoin($table, $onjoin),
                'barang' => $this->db->query('SELECT barang_id, namaBarang FROM barang')->result(),
                'perusahaan' => $this->db->query('SELECT tujuan_id, nama_perusahaan FROM perusahaan')->result(),
                'content' => 'admin/barangkeluar',
                'navlink' => 'barang_keluar',
            ];
        }
        $this->load->view('admin/vbackend', $data);
    }

    public function tambahBarangKeluar()
    {
        $add = [
            'id' => $this->crudModel->generateCode(10, 'id', 'barang_keluar'),
            'barang_id' => trim($this->input->post('barang_id')),
            'tanggal_keluar' => trim($this->input->post('tanggal_keluar')),
            'stok_keluar' => trim($this->input->post('stok_keluar')),
            'total' => trim($this->input->post('total')),
            'tujuan_id' => trim($this->input->post('tujuan_id')),
        ];

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $add['barang_id'])->row();

        $update = [
            'stok' => $stok->stok - (int) $add['stok_keluar'],
        ];

        $this->crudModel->updateData('barang', 'barang_id', $add['barang_id'], $update);

        $this->crudModel->addData('barang_keluar', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('admin/barang_keluar'));
    }

    public function hapusBarangKeluar()
    {
        $id = $this->uri->segment(3);

        $stok_keluar = $this->crudModel->getDataWhere('barang_keluar', 'id', $id)->row();

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $stok_keluark->barang_id)->row();

        $update = [
            'stok' => $stok->stok + (int) $stok_keluar->stok_keluar,
        ];

        $this->crudModel->updateData('barang', 'barang_id', $stok_keluar->barang_id, $update);

        $this->crudModel->deleteData('barang_keluar', 'id', $id);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('admin/barang_keluar'));
    }

    public function ubahBarangKeluar()
    {
        $id = $this->input->post('id');

        $barang_id = $this->input->post('barang_id');

        $stok = $this->crudModel->getDataWhere('barang', 'barang_id', $barang_id)->row();

        $stok_keluar = $this->crudModel->getDataWhere('barang_keluar', 'id', $id)->row();

        $update = [
            'tanggal_keluar' => trim($this->input->post('tanggal_keluar')),
            'stok_keluar' => trim($this->input->post('stok_keluar')),
            'total' => trim($this->input->post('total')),
            'tujuan_id' => trim($this->input->post('tujuan_id')),
        ];

        $update_stok = [
            'stok' => $stok->stok + $stok_keluar->stok_keluar - (int) $update['stok_keluar'],
        ];

        $this->crudModel->updateData('barang', 'barang_id', $barang_id, $update_stok);

        $this->crudModel->updateData('barang_keluar', 'id', $id, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('admin/barang_keluar'));
    }

    public function logout()
    {
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('user_id');
        redirect('login/');
    }

    public function printBarangMasuk()
    {
        $table = 'barang_masuk';

        $onjoin = [
                'barang' => $table.'.barang_id=barang.barang_id',
                'supplier' => $table.'.supplier_id=supplier.supplier_id',
        ];

        $data = [
                'barang_masuk' => $this->crudModel->getDataJoin($table, $onjoin),
        ];

        $this->load->view('CetakBarangMasuk', $data);
    }

    public function printBarangKeluar()
    {
        $table = 'barang_keluar';

        $onjoin = [
            'barang' => $table.'.barang_id=barang.barang_id',
            'perusahaan' => $table.'.tujuan_id=perusahaan.tujuan_id',
        ];

        $data = [
            'barang_keluar' => $this->crudModel->getDataJoin($table, $onjoin),
        ];

        $this->load->view('CetakBarangKeluar', $data);
    }
}
