<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 2){
      redirect('auth/blocked');
    }
		$this->load->model('Model_user', 'user');
		$this->load->model('Model_mapel', 'mapel');
		$this->load->model('Model_tugas', 'tugas');
		$this->load->model('Model_tugasSelesai', 'tugasSelesai');
		$this->load->model('Model_materi', 'materi');
  }
	public function index(){
		$data['title'] = 'Home';
		$data['stats'] = [
			'jml_mapel' => $this->mapel->getJumlahMapel(),
			'jml_tugasSelesai' => $this->tugasSelesai->getJumlahTugasSelesai($this->session->userdata('user_id')),
			'jml_tugas' => $this->tugas->getJumlahTugas(),
			'jml_materi' => $this->materi->getJumlahMateri()
		];
		loadview('siswa/index', $data);
	}
}
