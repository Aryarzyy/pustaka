<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TokoSepatu extends CI_Controller
{
	public function index()
	{
		$this->load->view("form_toko_sepatu");
	}

	public function pesan()
	{
		$this->form_validation->set_rules("nama", "Nama Pemesan", "required", [
			"required" => "Nama Pemesan harus diisi"
		]);
		$this->form_validation->set_rules("telepon", "No. Telepon", "required|numeric", [
			"required" => "No. Telepon harus diisi",
			"numeric" => "No. Telepon berupa angka"
		]);
		$this->form_validation->set_rules("merk", "Merk", "required", [
			"required" => "Merk harus diisi"
		]);
		$this->form_validation->set_rules("ukuran", "Ukuran", "required", [
			"required" => "Ukuran harus diisi"
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("form_toko_sepatu");
		} else {
			$data = [
				"nama" => $this->input->post("nama"),
				"telepon" => $this->input->post("telepon"),
				"merk" => $this->input->post("merk"),
				"ukuran" => $this->input->post("ukuran"),
			];
			$this->load->view("data_toko_sepatu", $data);
		}
	}
}

?>