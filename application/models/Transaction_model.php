<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function getTransaction()
    {
        $query = $this->db->get('tbl_transaction');

        return $query->result();
    }
}
