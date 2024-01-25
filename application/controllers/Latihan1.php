<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan1 extends CI_Controller
{
	public function index()
	{
		echo "Selamat datang... Selamat belajar Web Programming";
	}

	public function jumlah($n1, $n2)
	{
		$this->load->model("Model_latihan1");
		$hasil = $this->Model_latihan1->jumlah($n1, $n2);

		$data = [
			"nilai1" => $n1,
			"nilai2" => $n2,
			"hasil" => $hasil
		];

		$this->load->view("view-latihan1", $data);
		// echo "Hasil Penjumlahan dari" . $n1 . " + " . $n2 . " = " . $hasil;
	}
}