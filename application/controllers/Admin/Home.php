<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role_id') != 3) {
      redirect('auth/blocked');
    }
    $this->load->model('Model_user', 'user');
    $this->load->model('Model_mapel', 'mapel');
  }
  public function index()
  {
    $data['title'] = 'Home';
    $data['stats'] = [
      'jml_siswa' => 0,
      'jml_guru' => 0,
      'jml_mapel' => 0
    ];

    $data['stats'] = [
      'jml_siswa' => $this->user->getJumlahSiswa(),
      'jml_guru' => $this->user->getJumlahGuru(),
      'jml_mapel' => $this->mapel->getJumlahMapel()
    ];

    loadview('admin/home', $data);
  }
}
