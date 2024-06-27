<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class satuan extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Satuan';
		$this->load->model('Model_satuan');
	}

	public function index()
	{
		$satuan_data = $this->Model_satuan->getSatuanData();
		$this->data['satuan_data'] = $satuan_data;
		$this->render_template('satuan/index', $this->data);
	}

	public function create()
	{	
		$this->form_validation->set_rules('nama_satuan', 'Nama satuan', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'nama_satuan' => $this->input->post('nama_satuan')
        	);

        	$create = $this->Model_satuan->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Data sukses dibuat!!');
        		redirect('satuan/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Terjadi error!!');
        		redirect('satuan/create', 'refresh');
        	}
        }
        else {
        	$this->render_template('satuan/create', $this->data);	
        }
		
	}

	public function edit($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('nama_satuan', 'Nama satuan', 'required');

	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'nama_satuan' => $this->input->post('nama_satuan')
	        	);

	        	$update = $this->Model_satuan->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Data berhasil diubah!!');
	        		redirect('satuan/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Terjadi kesalahan');
	        		redirect('satuan/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $satuan_data = $this->Model_satuan->getSatuanData($id);
				$this->data['satuan_data'] = $satuan_data;
				$this->render_template('satuan/edit', $this->data);	
	        }
	
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
					$delete = $this->Model_satuan->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Data sukses dihapus!!');
		        		redirect('satuan/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Terjadi kesalahan!!');
		        		redirect('satuan/delete/'.$id, 'refresh');
		        	}
				// }	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('satuan/delete', $this->data);	
			}	
		}
		
	}

}