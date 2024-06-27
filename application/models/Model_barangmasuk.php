<?php 

class Model_barangmasuk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	public function getBarangmasukData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM barangmasuk WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM barangmasuk ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('barangmasuk', $data);
		return ($create == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('barangmasuk');
		return ($delete == true) ? true : false;
	}

	public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
}