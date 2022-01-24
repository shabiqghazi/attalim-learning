<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public $mapelGuru;
  public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 1){
      redirect('auth/blocked');
    }
    $this->load->model('Model_user', 'user');
    $this->load->model('Model_mapel', 'mapel');
    $this->load->model('Model_tugas', 'tugas');
    $this->load->model('Model_materi', 'materi');
    $username = $this->session->userdata('username');
    $this->mapelGuru = $this->mapel->getMapelGuruByUsername($username);
  }
	public function index(){
		$data['title'] = 'Home';
    $data['stats'] = [
      'jml_siswa' => 0,
      'jml_tugasGuru' => 0,
      'jml_materiGuru' => 0
    ];
    if($this->mapelGuru){  
      $data['stats'] = [
        'jml_siswa' => $this->user->getJumlahSiswa(),
        'jml_tugasGuru' => $this->tugas->getJumlahTugasGuru($this->mapelGuru['mapel_id']),
        'jml_materiGuru' => $this->materi->getJumlahMateriGuru($this->mapelGuru['mapel_id'])
      ];
    }
		loadview('guru/index', $data);
	}
}
