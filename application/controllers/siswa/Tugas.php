<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role_id') != 2) {
      redirect('auth/blocked');
    }
    $this->load->model('Model_tugas', 'tugas');
    $this->load->model('Model_tugasSelesai', 'tugasSelesai');
  }
  public function index()
  {
    $data['title'] = 'Tugas';
    $data['tugas'] = $this->tugas->getTugas();
    loadview('siswa/tugas', $data);
  }
  public function submit($tugas_id)
  {
    $data['title'] = 'Submit Tugas';
    $data['tugas'] = $this->tugas->getTugasById($tugas_id);

    $this->form_validation->set_rules('teks', 'Teks', 'required');

    if($this->form_validation->run() == false){
      loadview('siswa/addsubmission', $data);
    } else {
      $config['upload_path']   = './resource/siswa/tugas-selesai/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
      $config['max_size']      = 10000;
      $config['file_name']     = $data['tugas']['mapel'] . '_' . $tugas_id . '_' . $this->session->userdata('username');

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
      } else {
        $filename = $this->upload->data('file_name');
      }
      $tugasSelesai = [
        'tugas_id' => $tugas_id,
        'user_id' => $this->session->userdata('user_id'),
        'waktu_selesai' => time(),
        'teks' => $this->input->post('teks'),
        'filename' => $filename,
        'ori_filename' => $_FILES['file']['name']
      ];
      if($this->tugasSelesai->submitTugas($tugasSelesai) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas disubmit!</div>');
        redirect('siswa/tugas/view/' . $tugas_id);
      }
    }
  }
  public function edit($tugas_id)
  {
    $data['title'] = 'Edit Submission';
    $data['tugas'] = $this->tugas->getTugasById($tugas_id);
    $data['data_tugasSelesai'] = $this->tugasSelesai->viewTugasSelesai($this->session->userdata('user_id'), $tugas_id);

    $this->form_validation->set_rules('teks', 'Teks', 'required');

    if($this->form_validation->run() == false){
      loadview('siswa/editsubmission', $data);
    } else {
      $config['upload_path']   = './resource/siswa/tugas-selesai/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
      $config['max_size']      = 10000;
      $config['file_name']     = $data['tugas']['mapel'] . '_' . $tugas_id . '_' . $this->session->userdata('username');

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
      } else {
        $filename = $this->upload->data('file_name');
      }
      $tugasSelesai = [
        'tugas_id' => $tugas_id,
        'user_id' => $this->session->userdata('user_id'),
        'waktu_selesai' => time(),
        'teks' => $this->input->post('teks'),
        'filename' => $filename,
        'ori_filename' => $_FILES['file']['name']
      ];
      if($this->tugasSelesai->editTugas($tugasSelesai, $data['data_tugasSelesai']['tugas_selesai_id']) > 0){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas diubah!</div>');
        redirect('siswa/tugas/view/' . $tugas_id);
      }
    }
  }
  public function view($tugas_id)
  {
    $data['title'] = 'Tugas';
    $data['tugas'] = $this->tugas->getTugasById($tugas_id);
    $data['tugas_selesai'] = $this->tugasSelesai->cekTugasSelesai($this->session->userdata('user_id'), $tugas_id);
    $data['data_tugasSelesai'] = ['teks' => '', 'ori_filename' => ''];
    if($data['tugas_selesai']){
      $data['data_tugasSelesai'] = $this->tugasSelesai->viewTugasSelesai($this->session->userdata('user_id'), $tugas_id);
    }
    loadview('siswa/viewtugas', $data);
  }
  public function remove($tugas_id){
    if($this->tugasSelesai->removeTugasSelesaiByTugasId($tugas_id, $this->session->userdata('user_id')) > 0){
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submission dihapus!</div>');
      redirect('siswa/tugas/view/' . $tugas_id);
    }
  }
}
