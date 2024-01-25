<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelBuku extends CI_Model
{
	//manajemen buku
	public function getBuku()
	{
		return $this->db->get('books');
	}
	public function bukuWhere($where)
	{
		return $this->db->get_where('books', $where);
	}
	public function simpanBuku($data = null)
	{
		$this->db->insert('books', $data);
	}
	public function updateBuku($data = null, $where = null)
	{
		$this->db->update('books', $data, $where);
	}
	public function hapusBuku($where = null)
	{
		$this->db->delete('books', $where);
	}
	public function total($field, $where)
	{
		$this->db->select_sum($field);
		if (!empty($where) && count($where) > 0) {
			$this->db->where($where);
		}
		$this->db->from('books');
		return $this->db->get()->row($field);
	}

	//manajemen kategori
	public function getKategori()
	{
		return $this->db->get('categories');
	}
	public function kategoriWhere($where)
	{
		return $this->db->get_where('categories', $where);
	}
	public function simpanKategori($data = null)
	{
		$this->db->insert('categories', $data);
	}
	public function hapusKategori($where = null)
	{
		$this->db->delete('categories', $where);
	}
	public function updateKategori($where = null, $data = null)
	{
		$this->db->update('categories', $data, $where);
	}
	//join
	public function joinKategoriBuku($where)
	{
		$this->db->select('books.category_id,categories.category');
		$this->db->from('books');
		$this->db->join('categories', 'categories.id = 
books.category_id');
		$this->db->where($where);
		return $this->db->get();
	}
}