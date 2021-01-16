<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CrudLaundryModel', 'laundry');
        $this->load->database();
        $this->load->library('session');
        if ($this->session->userdata('role') !== 'Pelanggan') {
            redirect('login/');
        }
    }

    public function index()
    {
        if ($this->laundry->getDataWhere('tbl_user', 'users_id', $this->session->userdata('user_id'))->row()->pelanggan_id === null) {
            echo '<h1 style="text-align: center; margin-top: 20%;">Harap konfirmasi akun ke petugas. Terimakasih</h1>';
            echo '<h2 style="text-align: center;"><a href='.base_url('member/logout').'>Keluar halaman</a></h2>';
        } else {
            $data = [
            'content' => 'member/profil',
            'pelanggan_id' => $this->laundry->getDataWhere('tbl_user', 'pelanggan_id', $this->session->pelanggan_id)->row(),
            'history' => $this->db->query('SELECT * FROM tbl_transaction JOIN tbl_user ON tbl_transaction.pelanggan_id = tbl_user.pelanggan_id WHERE tbl_transaction.pelanggan_id = '.$this->session->userdata('pelanggan_id'))->result(),
        ];
            $this->load->view('member/dashboard', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('pelanggan_id');
        redirect('login/');
    }
}
