<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
	public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 2){
      redirect('auth/blocked');
    }
    $this->load->model('Model_materi','materi');
  }
  public function index(){
		$data['title'] = 'Materi';
    $data['materi'] = $this->materi->getMateri();
		loadview('siswa/materi', $data);
	}
  public function view($materi_id){
    $data['title'] = 'Materi';
    $data['materi'] = $this->materi->getMateriById($materi_id);
		loadview('siswa/viewmateri', $data);
  }
}
