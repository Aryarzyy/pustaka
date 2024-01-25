<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Buku extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	//manajemen Buku
	public function index()
	{
		$data['judul'] = 'Data Buku';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->ModelBuku->getBuku()->result_array();
		$data['kategori'] = $this->ModelBuku->getKategori()->result_array();
		$this->form_validation->set_rules('title', 'Judul Buku', 'required|min_length[3]', [
			'required' => 'Judul Buku harus diisi',
			'min_length' => 'Judul buku terlalu pendek'
		]);
		$this->form_validation->set_rules('category_id', 'Kategori', 'required', [
			'required' => 'Nama pengarang harus diisi',
		]);
		$this->form_validation->set_rules('author', 'Nama Pengarang', 'required|min_length[3]', [
			'required' => 'Nama pengarang harus diisi',
			'min_length' => 'Nama pengarang terlalu pendek'
		]);
		$this->form_validation->set_rules('publisher', 'Nama Penerbit', 'required|min_length[3]', [
			'required' => 'Nama penerbit harus diisi',
			'min_length' => 'Nama penerbit terlalu pendek'
		]);
		$this->form_validation->set_rules('publication_year', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', [
			'required' => 'Tahun terbit harus diisi',
			'min_length' => 'Tahun terbit terlalu pendek',
			'max_length' => 'Tahun terbit terlalu panjang',
			'numeric' => 'Hanya boleh diisi angka'
		]);
		$this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
			'required' => 'Nama ISBN harus diisi',
			'min_length' => 'Nama ISBN terlalu pendek',
			'numeric' => 'Yang anda masukan bukan angka'
		]);
		$this->form_validation->set_rules('stock', 'Stok', 'required|numeric', [
			'required' => 'Stok harus diisi',
			'numeric' => 'Yang anda masukan bukan angka'
		]);
		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('buku/index', $data);
			$this->load->view('admin/footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$gambar = $image['file_name'];
			} else {
				$gambar = '';
			}
			$data = [
				'title' => $this->input->post('title', true),
				'category_id' => $this->input->post('category_id', true),
				'author' => $this->input->post('author', true),
				'publisher' => $this->input->post('publisher', true),
				'publication_year' => $this->input->post('publication_year', true),
				'isbn' => $this->input->post('isbn', true),
				'stock' => $this->input->post('stock', true),
				'borrowed' => 0,
				'booked' => 0,
				'image' => $gambar
			];
			$this->ModelBuku->simpanBuku($data);
			redirect('buku');
		}
	}
	public function hapusBuku()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelBuku->hapusBuku($where);
		redirect('buku');
	}
	public function ubahBuku($book_id)
	{
		$data['judul'] = 'Ubah Data Buku';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->ModelBuku->bukuWhere(['id' => $book_id])->result_array();
		$kategori = $this->ModelBuku->joinKategoriBuku(['books.id' => $book_id])->result_array();
		foreach ($kategori as $k) {
			$data['id'] = $k['category_id'];
			$data['k'] = $k['category'];
		}
		$data['kategori'] = $this->ModelBuku->getKategori()->result_array();
		$this->form_validation->set_rules('title', 'Judul Buku', 'required|min_length[3]', [
			'required' => 'Judul Buku harus diisi',
			'min_length' => 'Judul buku terlalu pendek'
		]);
		$this->form_validation->set_rules('category_id', 'Kategori', 'required', [
			'required' => 'Nama pengarang harus 
diisi',
		]);
		$this->form_validation->set_rules('author', 'Nama Pengarang', 'required|min_length[3]', [
			'required' => 'Nama pengarang harus diisi',
			'min_length' => 'Nama pengarang terlalu pendek'
		]);
		$this->form_validation->set_rules('publisher', 'Nama Penerbit', 'required|min_length[3]', [
			'required' => 'Nama penerbit harus diisi',
			'min_length' => 'Nama penerbit terlalu pendek'
		]);
		$this->form_validation->set_rules('publication_year', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', [
			'required' => 'Tahun terbit harus diisi',
			'min_length' => 'Tahun terbit terlalu pendek',
			'max_length' => 'Tahun terbit terlalu panjang',
			'numeric' =>
			'Hanya boleh diisi angka'
		]);
		$this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
			'required' =>
			'Nama ISBN harus diisi',
			'min_length' => 'Nama ISBN terlalu pendek',
			'numeric' => 'Yang anda masukan bukan 
angka'
		]);
		$this->form_validation->set_rules('stock', 'Stok', 'required|numeric', [
			'required' => 'Stok harus diisi',
			'numeric'
			=> 'Yang anda masukan bukan angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('buku/ubah_buku', $data);
			$this->load->view('admin/footer');
		} else {
			$data = [
				'title' => $this->input->post('title', true),
				'category_id' => $this->input->post('category_id', true),
				'author' => $this->input->post('author', true),
				'publisher' => $this->input->post('publisher', true),
				'publication_year' => $this->input->post('publication_year', true),
				'isbn' => $this->input->post('isbn', true),
				'stock' => $this->input->post('stock', true),
			];

			$this->ModelBuku->updateBuku($data, ['id' => $book_id]);
			redirect('buku');
		}
	}

	public function kategori()
	{
		$data['judul'] = 'Kategori Buku';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->ModelBuku->getKategori()->result_array();
		$this->form_validation->set_rules(
			'category',
			'category',
			'required',
			[
				'required' => 'Kategori harus diisi'
			]
		);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('buku/kategori', $data);
			$this->load->view('admin/footer');
		} else {
			$data = [
				'category' => $this->input->post('category')
			];
			$this->ModelBuku->simpanKategori($data);
			redirect('buku/kategori');
		}
	}
	public function hapusKategori()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelBuku->hapusKategori($where);
		redirect('buku/kategori');
	}

	public function ubahKategori()
	{
		$data['judul'] = 'Ubah Data Kategori';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->ModelBuku->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();
		$this->form_validation->set_rules('category', 'Nama Kategori', 'required|min_length[3]', [
			'required' => 'Nama Kategori harus diisi',
			'min_length' => 'Nama Kategori terlalu pendek'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('buku/ubah_kategori', $data);
			$this->load->view('admin/footer');
		} else {
			$data = [
				'category' => $this->input->post('category', true)
			];
			$this->ModelBuku->updateKategori(['id' => $this->input->post('id')], $data);
			redirect('buku/kategori');
		}
	}
}