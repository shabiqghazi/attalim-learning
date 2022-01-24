<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 2){
      redirect('auth/blocked');
    }
    $this->load->model('Model_mapel', 'mapel');
    $this->load->model('Model_tugas', 'tugas');
    $this->load->model('Model_materi', 'materi');
  }
  public function index(){
		$data['title'] = 'Mata Pelajaran';
    $data['mapel'] = $this->mapel->getMapel();
		loadview('siswa/mapel', $data);
	}
  public function view($mapel_id){
    $data['title'] = 'Mata Pelajaran';
    $data['tugas'] = $this->tugas->getTugasByMapelId($mapel_id);
    $data['materi'] = $this->materi->getMateriByMapelId($mapel_id);
		loadview('siswa/viewmapel', $data);
  }
}
