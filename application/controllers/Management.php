<?php

class Management extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
    {
        $data['arsip'] = $this->Arsip_model->getAllArsip();
        $data['title'] = 'Dashboard';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		
		$data['all'] = $this->Dashboard_model->getAllData();
		$data['edit2'] = $this->Dashboard_model->getAllRequestEditRole2();
		$data['delete2'] = $this->Dashboard_model->getAllRequestDeleteRole2();
		$data['reject1'] = $this->Dashboard_model->getAllRejectEditRole2();
		$data['reject2'] = $this->Dashboard_model->getAllRejectEditRole3();

		$data['edit3'] = $this->Dashboard_model->getAllRequestEditRole3();
		$data['delete3'] = $this->Dashboard_model->getAllRequestDeleteRole3();
		$data['reject3'] = $this->Dashboard_model->getAllRejectDeleteRole2();
		$data['reject4'] = $this->Dashboard_model->getAllRejectDeleteRole3();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('management/dashboard/index', $data);
		$this->load->view('templates/footer');
    }

	public function detailArsip($id)
    {
        $data['title'] = 'Detail Data Archive';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('management/arsip/detailArsip', $data);
        $this->load->view('templates/footer', $data);
    }

	public function detailRequest($id)
    {
        $data['title'] = 'Detail Request Archive';
        $username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
        $data['arsip'] = $this->Arsip_model->getArsipById($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('management/request/detailRequest', $data);
        $this->load->view('templates/footer', $data);
    }

	public function dataBarangMasuk()
	{
		$data['title'] = 'Data Barang Masuk';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('management/arsip/dataBarangMasuk', $data);
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
		$this->load->view('management/arsip/dataBarangKeluar', $data);
		$this->load->view('templates/footer');
	}


	public function waitingRequestEdit()
	{
		$data['title'] = 'Waiting Request Edit';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$role = $data['user']->id_role;
		// var_dump($role2);
		// die;
		// $data['arsip'] = $this->Management_model->reqPendingEditRole2();
		if ($role == 2){
			$data['arsip'] = $this->Management_model->reqPendingEditRole2();
		} elseif ($role == 3){
			$data['arsip'] = $this->Management_model->reqPendingEditRole3();
		} elseif ($role == 1){
			$data['arsip'] = $this->Management_model->reqPendingEditAllRole();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('management/request/waitingRequestEdit', $data);
		$this->load->view('templates/footer');
	}

	public function waitingRequestDelete()
	{
		$data['title'] = 'Waiting Request Delete';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$role = $data['user']->id_role;
		// $data['arsip'] = $this->Management_model->reqPendingDeleteRole2();

		if ($role == 2){
			$data['arsip'] = $this->Management_model->reqPendingDeleteRole2();
		} elseif ($role == 3){
			$data['arsip'] = $this->Management_model->reqPendingDeleteRole3();
		} elseif ($role == 1){
			$data['arsip'] = $this->Management_model->reqPendingDeleteAllRole();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('management/request/waitingRequestDelete', $data);
		$this->load->view('templates/footer');
	}

	public function approvedRequestEditRole2($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_1' 		=> 'Approved',
			'dc_approved3'	=> $date,
			'is_read'		=> 0
		];
		
		$this->Management_model->updateStatusReqArsipEdit($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> diapproved</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestEdit');
	}

    public function approvedRequestDeleteRole2($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_3' 		=> 'Approved',
			'dc_approved3'	=> $date,
			'is_read'		=> 0
		];
		
		$this->Management_model->updateStatusReqArsipDelete($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> diapproved</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestDelete');
	}

	public function approvedRequestEditRole3($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_2' 		=> 'Approved',
			'dc_approved2'	=> $date,
			'is_read'		=> 0
	];

		$this->Management_model->updateStatusReqArsipEdit($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> diapproved</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestEdit');
	}

    public function approvedRequestDeleteRole3($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_4' => 'Approved',
			'dc_approved4'	=> $date,
			'is_read'		=> 0
		];
		
		$this->Management_model->updateStatusReqArsipDelete($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> diapproved</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestDelete');
	}

	public function rejectRequestEditRole2($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_1' 		=> 'Reject',
			'dc_reject1'	=> $date,
			'is_read'		=> 0
		];

		$this->Management_model->updateStatusReqArsipEdit($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> direject/strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestEdit');
	}

	public function rejectRequestDeleteRole2($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_3' 		=> 'Reject',
			'dc_reject3'	=> $date,
			'is_read'		=> 0
		];
		
		$this->Management_model->updateStatusReqArsipDelete($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> direject</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestDelete');
	}

	public function rejectRequestEditRole3($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_2' 		=> 'Reject',
			'dc_reject2'	=> $date,
			'is_read'		=> 0
	];

		$this->Management_model->updateStatusReqArsipEdit($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> direject</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestEdit');
	}

	public function rejectRequestDeleteRole3($id)
	{	
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		$data = [
			'status_4' 		=> 'Reject',
			'dc_reject4'	=> $date,
			'is_read'		=> 0
		];
		
		$this->Management_model->updateStatusReqArsipDelete($id, $data);
		$this->session->set_flashdata('msg', 
		'<div class="alert alert-primary alert-dismissible fade show" role="alert">
		Data berhasil<strong> direject</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>');
		redirect('management/waitingRequestDelete');
	}

	public function viewAllArchiveData()
	{
		$data['title'] = 'All Archive Data';
		$username = $this->session->userdata('username');
		$data['user'] = $this->User_model->getuser($username);
		$data['arsip'] = $this->Arsip_model->getAllArsip();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('management/arsip/viewAllArchiveData', $data);
		$this->load->view('templates/footer');
	}

	public function notifAllReads()
    {
        $notif = $this->db->get_where('data_pemesanan', ['is_read' => 0])->result_array();

        for($i = 0; $i < count($notif); $i++)
        {
            $data = ['is_read' => 1];
            $this->db->update('data_pemesanan', $data, ['id_ps' => $notif[$i]['id_ps']]);
        }
        $this->session->set_flashdata('msg', 
        '<div class="alert alert-success">Notif berhasil diperbarui</div>');
        return redirect(base_url('admin')); 
	}
}