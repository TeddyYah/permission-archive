<?php

class Notif_model extends CI_model
{
    public function getAllNewNotifRole2()
    {
        // $this->db->get_where('data_pemesanan', ['is_read' => 0])->result_array();
        $this->db->where('status_1', 'Pending');
        $this->db->or_where('status_3', 'Pending');
        $this->db->from('db_barang');
        return $this->db->count_all_results();
    }

    public function getAllNewNotifRole3()
    {
        // $this->db->get_where('data_pemesanan', ['is_read' => 0])->result_array();
        $this->db->where('status_2', 'Pending');
        $this->db->or_where('status_4', 'Pending');
        $this->db->from('db_barang');
        return $this->db->count_all_results();
    }

    public function getAllNewNotifRole4()
    {
        // $this->db->get_where('data_pemesanan', ['is_read' => 0])->result_array();
        $this->db->where('is_read', 0);
        $this->db->from('db_barang');
        return $this->db->count_all_results();
    }

    public function getNotifBaruRole2()
    { 
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_1', 'Pending');
        $this->db->or_where('status_3', 'Pending');
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit('3','0');
        return $this->db->get()->result_array();
        
    }

    public function getNotifBaruRole3()
    { 
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('status_2', 'Pending');
        $this->db->or_where('status_4', 'Pending');
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit('3','0');
        return $this->db->get()->result_array();   
    }

    public function getNotifBaruRole4()
    { 
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('is_read', 0);
        $this->db->where('status_1', 'Approved');
        $this->db->or_where('status_2', 'Approved');
        $this->db->or_where('status_3', 'Approved');
        $this->db->or_where('status_4', 'Approved');
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit('3','0');
        return $this->db->get()->result_array();   
    }

    public function getNotifBaruRole44()
    { 
        $this->db->select('*');
        $this->db->from('db_barang');
        $this->db->where('is_read', 0);
        $this->db->where('status_1', 'Reject');
        $this->db->or_where('status_2', 'Reject');
        $this->db->or_where('status_3', 'Reject');
        $this->db->or_where('status_4', 'Reject');
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit('3','0');
        return $this->db->get()->result_array();   
    }

    public function getArsiveById($id)
    {
        return $this->db->get_where('db_barang', ['id_barang' => $id])->row();
    }
}