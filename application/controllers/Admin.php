<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

    public function index()
    {
        $data['arsip'] = $this->Arsip_model->getAllArsip();
        $data['title'] = 'Home';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);

        $data['all'] = $this->Home_model->getAllData();
        $data['get'] = $this->Home_model->getAllBarangMasuk();
        $data['exit'] = $this->Home_model->getAllBarangKeluar();
        
		$data['edit2'] = $this->Home_model->getAllRequestEditRole2();
		$data['delete2'] = $this->Home_model->getAllRequestDeleteRole2();
		$data['reject1'] = $this->Home_model->getAllRejectEditRole2();
		$data['reject2'] = $this->Home_model->getAllRejectEditRole3();

		$data['edit3'] = $this->Home_model->getAllRequestEditRole3();
		$data['delete3'] = $this->Home_model->getAllRequestDeleteRole3();
		$data['reject3'] = $this->Home_model->getAllRejectDeleteRole2();
		$data['reject4'] = $this->Home_model->getAllRejectDeleteRole3();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/home/index', $data);
		$this->load->view('templates/footer', $data);
    }


	public function viewArsip()
	{
		$data['title'] = 'Archive Data';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/arsip/viewArsip', $data);
		$this->load->view('templates/footer');
	}

    public function dataBarangMasuk()
	{
		$data['title'] = 'Data Barang Masuk';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/arsip/dataBarangMasuk', $data);
		$this->load->view('templates/footer');
	}

    public function dataBarangKeluar()
	{
		$data['title'] = 'Data Barang Keluar';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/arsip/dataBarangKeluar', $data);
		$this->load->view('templates/footer');
	}

    public function barangKeluar($id)
	{	
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data['arsip'] = $this->Arsip_model->getArsiveById($id);
        $data2 = [
            "id_barang"         => $data['arsip']->id_barang,
            "kode_barang"       => $data['arsip']->kode_barang,
            "nama_barang"       => $data['arsip']->nama_barang,
            "barang_masuk"      => $data['arsip']->barang_masuk,
            "barang_ng"         => $data['arsip']->barang_ng,
            "barang_keluar"     => $data['arsip']->barang_keluar,
            "date_created"      => $data['arsip']->date_created,
            "dc_barang_masuk"   => $data['arsip']->dc_barang_masuk,
            "dc_barang_keluar"  => $date
        ];
        
        $date = date('Y-m-d H:i:s');
		$data = [
            'dc_barang_keluar'       => $date,
        ];

        $this->db->insert('db_exit', $data2);
        $this->Arsip_model->updateStatusArsipEdit($id, $data);
		redirect('admin/requestEditArchive');
	}

    public function addArsip()
    {
        $data['arsip'] = $this->Arsip_model->getAllArsip();
        $data['title'] = 'Form Tambah Data Barang';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);
        $this->form_validation->set_rules('barang_masuk', 'Barang Masuk', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);

        $this->form_validation->set_rules('dc_barang_masuk', 'Date Barang Masuk', 'required|trim', [
            'required' => 'Wajib diisi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/arsip/addArsip', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->tambahDataArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data berhasil<strong> ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('admin/dataBarangMasuk');
        }
    }

    public function detailArsip($id)
    {
        $data['title'] = 'Detail Data Archive';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);

        $data1 = [
            'is_read' => 1
        ];
        $this->db->update('db_barang', $data1, ['id_barang' => $id]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/arsip/detailArsip', $data);
        $this->load->view('templates/footer', $data);
    }

    // Request

    public function detailRequest($id)
    {
        $data['title'] = 'Detail Request Archive';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);

        $data1 = [
            'is_read' => 1
        ];
        $this->db->update('db_barang', $data1, ['id_barang' => $id]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/request/detailRequest', $data);
        $this->load->view('templates/footer', $data);
    }

    public function requestEditArchive()
	{
		$data['title'] = 'Request Edit Archive';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/request/requestEditArchive', $data);
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
		$this->load->view('admin/request/requestDeleteArchive', $data);
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
            $this->load->view('admin/request/reqEdit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->editRequestaArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> di request</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('admin/requestEditArchive');
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
            $this->load->view('admin/request/reqDelete', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->deleteRequestaArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> direquest</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('admin/requestEditArchive');
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
            $this->load->view('admin/request/editArsip', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Arsip_model->ubahDataArsip();
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil<strong> diubah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>');
            redirect('admin/requestEditArchive');
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
        redirect('admin/requestDeleteArchive');
    }

}