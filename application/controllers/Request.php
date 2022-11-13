<?php

class Request extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

    public function requestEditArchive()
	{
		$data['title'] = 'Request Edit Archive';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('request/arsip/requestEditArchive', $data);
		$this->load->view('templates/footer');
	}

    public function requestDeleteArchive()
	{
		$data['title'] = 'Request Delete Archive';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('request/arsip/requestDeleteArchive', $data);
		$this->load->view('templates/footer');
	}

    public function reqEdit($id)
	{	
        $data['title'] = 'Form Request Edit Arsip';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);
        
        $this->form_validation->set_rules('pesan_request_edit', 'Pesan Request Edit', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('request/arsip/reqEdit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->editRequestaArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> di request</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('request/requestEditArchive');
        }
	}

    public function reqDelete($id)
	{	
        $data['title'] = 'Form Request Delete Arsip';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);
        
        $this->form_validation->set_rules('pesan_request_delete', 'Pesan Request Delete', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('request/arsip/reqDelete', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->deleteRequestaArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> direquest</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('request/requestEditArchive');
        }
	}

    public function editArsip($id)
    {
        $data['title'] = 'Form Edit Data Arsip';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);
        
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        $this->form_validation->set_rules('barang_masuk', 'Barang Masuk', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        $this->form_validation->set_rules('barang_ng', 'Barang NG', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        // $this->form_validation->set_rules('barang_keluar', 'Barang Keluar', 'required|trim', [
        //     'required' => 'Wajib diisi !'
        // ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('request/arsip/editArsip', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->ubahDataArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> diubah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('request/requestEditArchive');
        }
    }

    public function deleteArchive($id)
    {
        $this->Arsip_model->getHapusArsip($id);
        $this->session->set_flashdata('msg', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data berhasil<strong> dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>');
        redirect('request/requestDeleteArchive');
    }

}