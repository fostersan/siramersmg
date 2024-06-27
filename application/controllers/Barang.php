<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'barang';
		$this->load->model('model_barang');
		$this->load->model('model_jenis');
		$this->load->model('model_satuan');
		$this->load->model('model_users');
	}

	public function index()
	{
		$barang_data = $this->model_barang->getBarangData();
		$result = array();
		foreach ($barang_data as $k => $v) {
			$result[$k]['barang'] = $v;
			$jenis_data = $this->model_jenis->getCategoryData($v['jenis_id']);
			$satuan_data = $this->model_satuan->getSatuanData($v['satuan_id']);
			
			$result[$k]['jenis'] = $jenis_data;
			$result[$k]['satuan'] = $satuan_data;
		}

		$this->data['barang_data'] = $result;
		$this->render_template('barang/index', $this->data);
	}

	public function create()
	{	
		$this->form_validation->set_rules('id', 'Kode Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('nama_jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('nama_satuan', 'Satuan', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            // true case

        	$data = array(
        		'id' => $this->input->post('id'),
        		'nama_barang' => $this->input->post('nama_barang'),
        		'jenis_id' => $this->input->post('nama_jenis'),
        		'satuan_id' => $this->input->post('nama_satuan'),
        		'stok' => 0
        	);

        	$create = $this->model_barang->create($data);
        	if($create == true) {

        		// now unavailable the slot

        		if($create == true) {
        			$this->session->set_flashdata('success', 'Successfully created');
		    		redirect('barang', 'refresh');	
        		}
        		else {
        			$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('barang/create', 'refresh');
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('barang/create', 'refresh');
        	}
        }
        else {
        	$nama_jenis = $this->model_jenis->getCategoryData();
        	$this->data['nama_jenis'] = $nama_jenis;

        	$nama_satuan = $this->model_satuan->getSatuanData();
        	$this->data['nama_satuan'] = $nama_satuan;

			$this->render_template('barang/create', $this->data);
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
					$delete = $this->model_barang->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Data sukses dihapus!!');
		        		redirect('barang/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Terjadi kesalahan!!');
		        		redirect('barang/delete/'.$id, 'refresh');
		        	}
				// }	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('barang/delete', $this->data);	
			}	
		}
		
	}
}