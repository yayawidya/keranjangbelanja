<?php  

Class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2' ){
			$this->session->set_flashdata('Anda Belum Login','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Username atau Password Anda Salah!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('login/auth/login');

		}
	}

	public function index()
	{
		$data['tbl_barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view ('templates/header');
		$this->load->view ('templates/sidebar');
		$this->load->view ('dashboard', $data);
		$this->load->view ('templates/footer');
		
	}
}