<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
  public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 3){
      redirect('auth/blocked');
    }
    $this->load->model('Model_user', 'user');
    $this->load->model('Model_mapel', 'mapel');
    $username = $this->session->userdata('username');
    $this->mapelGuru = $this->mapel->getMapelGuruByUsername($username);
  }
	public function index(){
		$data['title'] = 'Mata Pelajaran';
    $data['mapel'] = $this->mapel->getMapel();
		loadview('admin/mapel', $data);
	}
  public function tambah(){
    $data['title'] = 'Tambah Mata Pelajaran';
    $data['guru'] = $this->user->getGuruTanpaMapel();
    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
    $this->form_validation->set_rules('guru_id', 'Guru', 'required');
    if($this->form_validation->run() == false){
      loadview('admin/tambahmapel', $data);
    } else {
      $dataMapel = [
        'mapel' => $this->input->post('mapel'),
        'guru_id' => $this->input->post('guru_id')
      ];
      if($this->mapel->tambahMapel($dataMapel) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mata Pelajaran ditambahkan!</div>');
				redirect('admin/mapel');
      }
    }
  }
  public function ubah($mapel_id){
    $data['title'] = 'Ubat Data Mata Pelajaran';
    $data['guru'] = $this->user->getGuruTanpaMapel();
    $data['mapel'] = $this->mapel->getMapelById($mapel_id);
    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
    $this->form_validation->set_rules('guru_id', 'Guru', 'required');
    if($this->form_validation->run() == false){
      loadview('admin/ubahmapel', $data);
    } else {
      $dataMapel = [
        'mapel' => $this->input->post('mapel'),
        'guru_id' => $this->input->post('guru_id')
      ];
      if($this->mapel->ubahMapel($dataMapel, $mapel_id) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mata Pelajaran diubah!</div>');
				redirect('admin/mapel');
      }
    }
  }
  public function hapus($mapel_id){
    if($this->mapel->hapusMapel($mapel_id) > 0){
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mata Pelajaran dihapus!</div>');
				redirect('admin/mapel');
    }
  }
}
