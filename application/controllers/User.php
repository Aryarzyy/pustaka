<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	public function index()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('user/footer');
	}
	public function anggota()
	{
		$data['judul'] = 'Data Anggota';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['anggota'] = $this->db->get('users')->result_array();
		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/topbar', $data);
		$this->load->view('user/anggota', $data);
		$this->load->view('user/footer');
	}
	public function ubahProfil()
	{
		$data['judul'] = 'Ubah Profil';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules(
			'name',
			'Nama Lengkap',
			'required|trim',
			[
				'required' => 'Nama tidak Boleh Kosong'
			]
		);
		if ($this->form_validation->run() == false) {
			$this->load->view('user/header', $data);
			$this->load->view('user/sidebar', $data);
			$this->load->view('user/topbar', $data);
			$this->load->view('user/ubah-profile', $data);
			$this->load->view('user/footer');
		} else {
			$name = $this->input->post('name', true);
			$email = $this->input->post('email', true);
			//jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '3000';
				$config['max_width'] = '1024';
				$config['max_height'] = '1000';
				$config['file_name'] = 'pro' . time();
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$gambar_lama = $data['user']['image'];
					if ($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' .
							$gambar_lama);
					}
					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('image', $gambar_baru);
				} else {
				}
			}
			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('users');
			$this->session->set_flashdata('pesan', '<div 
   class="alert alert-success alert-message" role="alert">Profil 
   Berhasil diubah </div>');
			redirect('user');
		}
	}
}