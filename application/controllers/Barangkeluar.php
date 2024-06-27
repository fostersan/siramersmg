<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Barang keluar';
		$this->load->model('model_barang');
		$this->load->model('model_barangkeluar');
		$this->load->model('model_users');
	}

	public function index()
	{
		$barangkeluar_data = $this->model_barangkeluar->getBarangkeluarData();
		$user_id = $this->session->userdata('id');

		$result = array();
		foreach ($barangkeluar_data as $k => $v) {
			$result[$k]['barangkeluar'] = $v;
			$barang_data = $this->model_barang->getBarangData($v['barang_id']);
			$user_data = $this->model_users->getUserData($user_id);
			$this->data['user_data'] = $user_data;
			
			$result[$k]['barang'] = $barang_data;
			$result[$k]['users'] = $user_data;
		}

		$this->data['barangkeluar_data'] = $result;
		$this->render_template('barangkeluar/index', $this->data);
	}

	public function create()
	{	
		$user_id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$kode = 'BK' . date('ymd');
        $kode_terakhir = $this->model_barangkeluar->getMax('barangkeluar', 'id', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        /*$stok = $this->model_barangkeluar->get('barang', ['id'])['stok'];
        $stok_valid = $stok + 1;*/

		$this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah Keluar', 'required|trim|numeric|greater_than[0]');
        /*$this->form_validation->set_rules(
            'jumlah_keluar',
            'Jumlah Keluar',
            "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
            [
                'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stok}"
            ]
        );*/

        if ($this->form_validation->run() == TRUE) {
            // true case

        	$data = array(
        		'id' => $kode . $number,
        		'user_id' => $this->input->post('nama'),
        		'tanggal_keluar' => $this->input->post('tanggal_keluar'),
        		'barang_id' => $this->input->post('nama_barang'),
        		'jumlah_keluar' => $this->input->post('jumlah_keluar')
        	);

        	$create = $this->model_barangkeluar->create($data);
        	if($create == true) {

        		// now unavailable the slot

        		if($create == true) {
        			$this->session->set_flashdata('success', 'Successfully created');
		    		redirect('barangkeluar', 'refresh');	
        		}
        		else {
        			$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('barangkeluar/create', 'refresh');
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('barangkeluar/create', 'refresh');
        	}
        }
        else {
        	$nama_barang = $this->model_barang->getBarangData();
        	$this->data['nama_barang'] = $nama_barang;

			$this->render_template('barangkeluar/create', $this->data);
		}
	}

	public function delete($id = null)
	{
		if($id) {
			if($this->input->post('confirm')) {

				// $check = $this->model_groups->existInUserGroup($id);
				// if($check == true) {
				// 	$this->session->set_flashdata('error', 'Group exists in the users');
	   //      		redirect('satuan/', 'refresh');
				// }
				// else {
					$delete = $this->model_barangkeluar->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Data sukses dihapus!!');
		        		redirect('barangkeluar/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Terjadi kesalahan!!');
		        		redirect('barangkeluar/delete/'.$id, 'refresh');
		        	}
				// }	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('barangkeluar/delete', $this->data);	
			}	
		}
		
	}
}