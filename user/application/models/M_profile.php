<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_profile extends CI_Model {
	
	public function getProfile() {
		$sql = 'SELECT * FROM profile WHERE email = ?';
		$res = $this->db->query($sql, array($this->session->email));

		return $res->result_array();
	}

		public function update_profile($data){
		$sql = "UPDATE `profile` SET posisi = ?, `nama` = ?, ktp = ?, lahir = ?, kelamin = ?, agama = ?, golongan = ?, `status` = ?, alamat_ktp = ?, alamat_tinggal = ?, email = ?, telp = ?, darurat = ? WHERE id = ?";

		$this->db->query($sql, array($data['posisi'], $data['nama'], $data['ktp'], $data['lahir'], $data['kelamin'], $data['agama'], $data['golongan'], $data['status'], $data['alamat_ktp'], $data['alamat_tinggal'], $data['email'], $data['telp'], $data['darurat'], $data['id']));
		
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>