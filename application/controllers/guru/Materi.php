<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
  public $mapelGuru;
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role_id') != 1) {
      redirect('auth/blocked');
    }
    $this->load->model('Model_mapel', 'mapel');
    $this->load->model('Model_materi', 'materi');

    $username = $this->session->userdata('username');
    $this->mapelGuru = $this->mapel->getMapelGuruByUsername($username);
    if (!$this->mapelGuru) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda belum mengajar mata pelajaran!</div>');
      redirect('guru/home');
    }
  }
  public function index()
  {
    $data['title'] = 'Materi';
    $data['materi'] = $this->materi->getMateriByGuruId($this->session->userdata('user_id'));

    loadview('guru/materi', $data);
  }
  public function tambah()
  {
    $data['title'] = 'Tambah Materi';

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', '');
    $this->form_validation->set_rules('keterangan', 'Keterangan', '');

    if ($this->form_validation->run() == false) {
      loadview('guru/tambahmateri', $data);
    } else {
      $config['upload_path']   = './resource/guru/materi/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
      $config['max_size']      = 10000;
      $config['file_name']     = $this->mapelGuru['mapel'] . '_' . $this->input->post('judul');

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
      } else {
        $filename = $this->upload->data('file_name');
      }
      $materi = [
        'mapel_id' => $this->mapelGuru['mapel_id'],
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'keterangan' => $this->input->post('keterangan'),
        'filename' => $filename,
        'ori_filename' => $_FILES['file']['name']
      ];
      if ($this->materi->tambahMateri($materi) > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi ditambahkan!</div>');
        redirect('guru/materi');
      }
    }
  }
  public function ubah($materi_id)
  {
    $data['title'] = 'Ubah Materi';
    $data['materi'] = $this->materi->getMateriById($materi_id);
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', '');
    $this->form_validation->set_rules('keterangan', 'Keterangan', '');

    if ($this->form_validation->run() == false) {
      loadview('guru/ubahmateri', $data);
    } else {
      $config['upload_path']   = './resource/guru/materi/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
      $config['max_size']      = 10000;
      $config['file_name']     = $this->mapelGuru['mapel'] . '_' . $this->input->post('judul');

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
      } else {
        $filename = $this->upload->data('file_name');
      }
      $materi = [
        'mapel_id' => $this->mapelGuru['mapel_id'],
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'keterangan' => $this->input->post('keterangan'),
        'filename' => $filename,
        'ori_filename' => $_FILES['file']['name']
      ];
      if ($this->materi->ubahMateri($materi, $materi_id) > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi diubah!</div>');
        redirect('guru/materi');
      }
    }
  }
  public function hapus($materi_id)
  {
    if ($this->materi->hapusMateri($materi_id) > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi dihapus!</div>');
      redirect('guru/materi');
    }
  }
  public function view($materi_id)
  {
    $data['title'] = 'Materi';
    $data['materi'] = $this->materi->getMateriById($materi_id);
    loadview('guru/viewmateri', $data);
  }
}
