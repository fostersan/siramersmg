<?php 

class Model_peramalan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPeramalanData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM peramalan WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM peramalan order by id desc limit 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRamalData($id){
		$this->db->where('barang_id', $id);
        $query = $this->db->get('peramalan');
        return $query->row_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('peramalan', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('peramalan', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('peramalan');
		return ($delete == true) ? true : false;
	}
}