<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {
  public $mapelGuru;
  public function __construct() {
    parent::__construct();
    if($this->session->userdata('role_id') != 1){
      redirect('auth/blocked');
    }
    $this->load->model('Model_mapel', 'mapel');
    $this->load->model('Model_tugas', 'tugas');
    $this->load->model('Model_tugasSelesai', 'tugasSelesai');
    $username = $this->session->userdata('username');
    $this->mapelGuru = $this->mapel->getMapelGuruByUsername($username);
    if(!$this->mapelGuru){
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda belum mengajar mata pelajaran!</div>');
      redirect('guru/home');
    }
  }
	public function index(){
		$data['title'] = 'Tugas';
    $data['tugas'] = $this->tugas->getTugasByGuruId($this->session->userdata('user_id'));
		loadview('guru/tugas', $data);
	}
  public function tambah(){
    $data['title'] = 'Tambah Tugas';
	
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', '');
    $this->form_validation->set_rules('deadline', 'Deskripsi', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', '');

    if($this->form_validation->run() == FALSE){
      loadview('guru/tambahtugas', $data);
    } else {
      $tugas = [
        'mapel_id' => $this->mapelGuru['mapel_id'],
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'deadline' => strtotime($this->input->post('deadline')),
        'keterangan' => $this->input->post('keterangan')
      ];
      if($this->tugas->tambahTugas($tugas) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas ditambahkan!</div>');
				redirect('guru/tugas');
      }
    }
  }
  public function ubah($tugas_id){
    $data['title'] = 'Ubah Tugas';
    $data['tugas'] = $this->tugas->getTugasById($tugas_id);

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', '');
    $this->form_validation->set_rules('deadline', 'Deskripsi', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', '');

    if($this->form_validation->run() == FALSE){
      loadview('guru/ubahtugas', $data);
    } else {
      $tugas = [
        'mapel_id' => $this->mapelGuru['mapel_id'],
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'deadline' => strtotime($this->input->post('deadline')),
        'keterangan' => $this->input->post('keterangan')
      ];
      if($this->tugas->ubahTugas($tugas, $tugas_id) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas diubah!</div>');
				redirect('guru/tugas');
      }
    }
  }
  public function view($tugas_id){
    $data['title'] = 'Tugas';
    $data['tugas'] = $this->tugas->getTugasById($tugas_id);
    $data['tugasSelesai'] = $this->tugasSelesai->getTugasSelesaiByTugasId($tugas_id);
    loadview('guru/viewtugas', $data);
  }
  public function hapus($tugas_id){
    if($this->tugas->hapusTugas($tugas_id) > 0){
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas dihapus!</div>');
				redirect('guru/tugas');
    }
  }
  public function viewsubmission($tugas_selesai_id){
    $data['tugas_selesai'] = $this->tugasSelesai->getTugasSelesaiById($tugas_selesai_id);
    $data['title'] = 'Tugas';
    loadview('guru/viewsubmission', $data);
  }
}
