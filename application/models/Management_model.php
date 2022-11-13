<?php

class Management_model extends CI_model
{
    // Role 1
    public function reqPendingEditAllRole()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('dc_barang_keluar', NULL);
        $this->db->where('status_1', 'Pending');
        $this->db->or_where('status_2', 'Pending');
        return $this->db->get()->result();
    }

    public function reqPendingDeleteAllRole()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('dc_barang_keluar', NULL);
        $this->db->where('status_3', 'Pending');
        $this->db->or_where('status_4', 'Pending');
        return $this->db->get()->result();
    }

    // Role 2
    public function reqPendingEditRole2()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_1', 'Pending');
        $this->db->where('dc_barang_keluar', NULL);
        return $this->db->get()->result();
    }

    public function reqPendingDeleteRole2()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_3', 'Pending');
        $this->db->where('dc_barang_keluar', NULL);
        return $this->db->get()->result();
    }

    // Role 3
    public function reqPendingEditRole3()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_2', 'Pending');
        $this->db->where('dc_barang_keluar', NULL);
        return $this->db->get()->result();
    }

    public function reqPendingDeleteRole3()
    {
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_4', 'Pending');
        $this->db->where('dc_barang_keluar', NULL);
        return $this->db->get()->result();
    }

    public function updateStatusReqArsipEdit($id, $data)
    {
        return $this->db->where('id_barang', $id)
            ->update('db_barang', $data);
    }

    public function updateStatusReqArsipDelete($id, $data)
    {
        return $this->db->where('id_barang', $id)
            ->update('db_barang', $data);
    }
}