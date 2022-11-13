<?php

class arsip_model extends CI_model
{
    public function getAllArsip()
    {
        return $this->db->get('db_barang')->result();
    }

    public function getArsipById($id)
    {
        return $this->db->get_where('db_barang', ['id_barang' => $id])->row_array();
    }

    public function getArsiveById($id)
    {
        return $this->db->get_where('db_barang', ['id_barang' => $id])->row();
    }

    public function addStatusBarangKeluar()
    {
        $data['arsip'] = $this->Arsip_model->getAllArsip();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = [
            "id_barang"         => $this->input->post('id_barang', true),
            "kode_barang"       => $this->input->post('kode_barang', true),
            "nama_barang"       => $this->input->post('nama_barang', true),
            "barang_masuk"      => $this->input->post('barang_masuk', true),
            "barang_ng"         => $this->input->post('barang_ng', true),
            "barang_keluar"     => $this->input->post('barang_masuk', true),
            "date_created"      => $date,
            "dc_barang_masuk"   => $this->input->post('dc_barang_masuk', true),
            "dc_barang_keluar"   => $this->input->post('dc_barang_masuk', true),
        ];

        $this->db->insert('db_exit', $data);
    }

    public function tambahDataArsip()
    {
        $data['arsip'] = $this->Arsip_model->getAllArsip();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = [
            "kode_barang"       => $this->input->post('kode_barang', true),
            "nama_barang"       => $this->input->post('nama_barang', true),
            "barang_masuk"      => $this->input->post('barang_masuk', true),
            "date_created"      => $date,
            "dc_barang_masuk"   => $this->input->post('dc_barang_masuk', true),
            "barang_keluar"      => $this->input->post('barang_masuk', true),
        ];

        $this->db->insert('db_barang', $data);
    }

    public function updateStatusArsipEdit($id, $data)
    {
        return $this->db->where('id_barang', $id)
            ->update('db_barang', $data);
    }

    public function updateStatusArsipHapus($id, $data)
    {
        return $this->db->where('id_barang', $id)
            ->update('db_barang', $data);
    }

    public function ubahDataArsip()
    {
        $barang_masuk = $this->input->post('barang_masuk', true);
        $barang_ng    = $this->input->post('barang_ng', true);
        $data = [
            "kode_barang"       => $this->input->post('kode_barang', true),
            "nama_barang"       => $this->input->post('nama_barang', true),
            "status_1"          => NULL,
            "status_2"          => NULL,
            // "dc_approved1"      => NULL,
            // "dc_approved2"      => NULL,
            "barang_masuk"      => $this->input->post('barang_masuk', true),
            "barang_ng"         => $this->input->post('barang_ng', true),
            "barang_keluar"     => $barang_masuk - $barang_ng
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('db_barang', $data);
    }
    

    public function editRequestaArsip()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = [
            'status_1'          => 'Pending',
            'status_2'          => 'Pending',
            'pesan_request_edit'     => $this->input->post('pesan_request_edit', true),
            'date_request_edit' => $date
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('db_barang', $data);
    }

    public function deleteRequestaArsip()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = [
            'status_3'          => 'Pending',
            'status_4'          => 'Pending',
            'pesan_request_delete'     => $this->input->post('pesan_request_delete', true),
            'date_request_delete' => $date
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('db_barang', $data);
    }

    public function getHapusArsip($id)
    {
        $this->db->delete('db_barang', ['id_barang' => $id]);
    }

}