<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user', 'user');
	}
	public function index()
	{
		$data['title'] = 'Login';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('Model_user', 'user');
		$user = $this->user->getUserByUsername($username);
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'user_id' => $user['user_id'],
					'username' => $user['username'],
					'role_id' => $user['role_id'],
					'nama' => $user['nama']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('guru/home');
				} else if ($user['role_id'] == 2) {
					redirect('siswa/home');
				} else if ($user['role_id'] == 3){
					redirect('admin/home');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan!</div>');
			redirect('auth');
		}
	}
	public function register()
	{
		$data['title'] = 'Register';
		$this->load->view('template/auth_header', $data);
		$this->load->view('auth/register');
		$this->load->view('template/auth_footer');
	}
	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
			'is_unique' => 'Username telah digunakan sebelumnya'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
			'min_length' => 'Minimal password 5 karakter!'
		]);
		$this->form_validation->set_rules('role_id', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			redirect('auth/register');
		} else {
			$user = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id')
			];
			if ($this->user->registration($user) > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mendaftar, silahkan masuk!</div>');
				redirect('auth');
			}
		}
	}
	public function logout(){
		$this->session->unset_userdata(['username','role_id']);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
		redirect('auth');
	}
	public function blocked(){
		echo "Blocked!";
	}
}
