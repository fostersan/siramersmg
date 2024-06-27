<?php

class Model_barang extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getBarangData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM barang WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM barang order by nama_barang asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getIDBarangData($id = null)
	{
		if ($id) {
			$sql = "SELECT id FROM barang WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM barang order by nama_barang asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRata2Data($id = null)
	{
		if ($id) {
			$sql = "SELECT barang_id, (SUM(jumlah_keluar)/(COUNT(barang_id)/3)) AS rata2 FROM barangkeluar where barang_id = ? GROUP BY barang_id having count(barang_id) >=30";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT barang_id, (SUM(jumlah_keluar)/(COUNT(barang_id)/3)) AS rata2 FROM barangkeluar GROUP BY barang_id having count(barang_id) >=30";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('barang', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('barang', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('barang');
		return ($delete == true) ? true : false;
	}

	public function getJumlahKeluarPerQuarter($idBarang)
	{
		$sql = "SELECT barang_id,
				YEAR(tanggal_keluar) AS tahun,
				QUARTER(tanggal_keluar) AS triwulan,
				SUM(jumlah_keluar) AS jumlah_keluar 
				FROM barangkeluar 
				WHERE barang_id=?
				GROUP BY tahun, triwulan
				ORDER BY tahun, triwulan";
		$query = $this->db->query($sql, array($idBarang));
		return $query->result();
	}
}
