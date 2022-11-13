<?php

class Home_model extends CI_model
{
    public function getAllRequestEditRole2()
    {
        return $this->db->where('status_1', 'Pending')
            ->get('db_barang')->num_rows();
    }

    public function getAllRequestEditRole3()
    {
        return $this->db->where('status_2', 'Pending')
            ->get('db_barang')->num_rows();
    }

    public function getAllRejectEditRole2()
    {
        return $this->db->where('status_1', 'Reject')
            ->get('db_barang')->num_rows();
    }

    public function getAllRejectEditRole3()
    {
        return $this->db->where('status_2', 'Reject')
            ->get('db_barang')->num_rows();
    }

    public function getAllRequestDeleteRole2()
    {
        return $this->db->where('status_3', 'Pending')
            ->get('db_barang')->num_rows();
    }

    public function getAllRequestDeleteRole3()
    {
        return $this->db->where('status_4', 'Pending')
            ->get('db_barang')->num_rows();
    }

    public function getAllRejectDeleteRole2()
    {
        return $this->db->where('status_3', 'Reject')
            ->get('db_barang')->num_rows();
    }

    public function getAllRejectDeleteRole3()
    {
        return $this->db->where('status_4', 'Reject')
            ->get('db_barang')->num_rows();
    }
    
    public function getAllData()
    {
        return $this->db->get('db_barang')->num_rows();
    }

    public function getAllBarangMasuk()
    {
        return $this->db->get_where('db_barang', ['dc_barang_masuk'])->num_rows();
    }

    public function getAllBarangKeluar()
    {
        return $this->db->get('db_exit')->num_rows();
    }
}