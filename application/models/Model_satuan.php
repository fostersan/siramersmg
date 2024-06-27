<?php 

class Model_satuan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSatuanData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM satuan WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM satuan order by nama_satuan asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('satuan', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('satuan', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('satuan');
		return ($delete == true) ? true : false;
	}
}