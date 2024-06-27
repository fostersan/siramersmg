<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Category';
		$this->load->model('Model_jenis');
	}

	public function index()
	{
		$kategori_data = $this->Model_jenis->getCategoryData();
		$this->data['kategori_data'] = $kategori_data;
		$this->render_template('kategori/index', $this->data);
	}

	public function create()
	{	
		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'nama_jenis' => $this->input->post('nama_jenis')
        	);

        	$create = $this->Model_jenis->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Data sukses dibuat!!');
        		redirect('kategori/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Terjadi error!!');
        		redirect('kategori/create', 'refresh');
        	}
        }
        else {
        	$this->render_template('kategori/create', $this->data);	
        }
		
	}

	public function edit($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');

	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'nama_jenis' => $this->input->post('nama_jenis')
	        	);

	        	$update = $this->Model_jenis->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Data berhasil diubah!!');
	        		redirect('kategori/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Terjadi kesalahan');
	        		redirect('kategori/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $kategori_data = $this->Model_jenis->getCategoryData($id);
				$this->data['kategori_data'] = $kategori_data;
				$this->render_template('kategori/edit', $this->data);	
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
	   //      		redirect('kategori/', 'refresh');
				// }
				// else {
					$delete = $this->Model_jenis->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Data sukses dihapus!!');
		        		redirect('kategori/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Terjadi kesalahan!!');
		        		redirect('kategori/delete/'.$id, 'refresh');
		        	}
				// }	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('kategori/delete', $this->data);	
			}	
		}
		
	}

}