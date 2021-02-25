 <?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_admin extends CI_Model {
	
	public function getAll() {
		$sql = 'SELECT * FROM profile';
		$res = $this->db->query($sql);
		
		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['posisi'][] = $row->posisi;
			$data['nama'][] = $row->nama;
			$data['ktp'][] = $row->ktp;
			$data['lahir'][] = $row->lahir;
			$data['kelamin'][] = $row->kelamin;
			$data['agama'][] = $row->agama;
			$data['golongan'][] = $row->golongan;
			$data['status'][] = $row->status;
			$data['alamat_ktp'][] = $row->alamat_ktp;
			$data['alamat_tinggal'][] = $row->alamat_tinggal;
			$data['email'][] = $row->email;
			$data['telp'][] = $row->telp;
			$data['darurat'][] = $row->darurat;
 		}

		return $data;
	}

	public function getProfile($id){
		$sql = "SELECT * FROM profile WHERE id = ?";
		$res = $this->db->query($sql, array($id));
		return $res->result_array();
	}

	public function getEducation($id){
		$sql = "SELECT * FROM pendidikan";
		$res = $this->db->query($sql, array($id));
		
		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['jenjang'][] = $row->jenjang;
			$data['nama'][] = $row->nama;
			$data['jurusan'][] = $row->jurusan;
			$data['tahun'][] = $row->tahun;
			$data['ipk'][] = $row->ipk;
 		}

		return $data;
	}

	public function getExperience($id){
		$sql = "SELECT * FROM pekerjaan";
		$res = $this->db->query($sql, array($id));
		
		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['nama'][] = $row->nama;
			$data['posisi'][] = $row->posisi;
			$data['pendapatan'][] = $row->pendapatan;
			$data['tahun'][] = $row->tahun;
 		}

		return $data;
 }
 
 public function getTraining($id){
		$sql = "SELECT * FROM pelatihan";
		$res = $this->db->query($sql, array($id));
		
		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['nama'][] = $row->nama;
			$data['sertifikat'][] = $row->sertifikat;
			$data['tahun'][] = $row->tahun;
 		}

		return $data;
	}
}
?>