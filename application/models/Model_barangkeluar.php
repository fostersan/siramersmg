<?php 

class Model_barangkeluar extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	public function getBarangkeluarData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM barangkeluar WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM barangkeluar ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

	public function create($data = '')
	{
		$create = $this->db->insert('barangkeluar', $data);
		return ($create == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('barangkeluar');
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