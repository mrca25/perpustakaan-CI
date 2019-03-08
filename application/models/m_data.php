<?php
//Author : MRCA | Code
//09/01/2019
//membuat model yg terstruktur agar bisa digunakan berulang kali

class M_data extends CI_Model{
	//membuat fungsi CRUD

	//fungsi untuk mengambil data dari database
	function get_data($table){
		return $this->db->get($table);
	}

	//fungsi untuk menginput data ke database
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	//fungsi untuk mengedit data
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	//fungsi untuk mengupdate atau mengubah data
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//fungsi untuk menghapus data
	function delete_data($where,$table){
		$this->db->delete($table,$where);
	}

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
}
?>
