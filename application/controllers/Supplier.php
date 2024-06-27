<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'supplier';
		$this->load->model('Model_supplier');
	}

	public function index()
	{
		$supplier_data = $this->Model_supplier->getsupplierData();
		$this->data['supplier_data'] = $supplier_data;
		$this->render_template('supplier/index', $this->data);
	}

	public function create()
	{	
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'nama_supplier' => $this->input->post('nama_supplier'),
        		'no_telp' => $this->input->post('no_telp'),
        		'alamat' => $this->input->post('alamat')
        	);

        	$create = $this->Model_supplier->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Data sukses dibuat!!');
        		redirect('supplier/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Terjadi error!!');
        		redirect('supplier/create', 'refresh');
        	}
        }
        else {
        	$this->render_template('supplier/create', $this->data);	
        }
		
	}

	public function edit($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
			$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'nama_supplier' => $this->input->post('nama_supplier'),
        			'no_telp' => $this->input->post('no_telp'),
        			'nama_supplier' => $this->input->post('alamat')
	        	);

	        	$update = $this->Model_supplier->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Data berhasil diubah!!');
	        		redirect('supplier/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Terjadi kesalahan');
	        		redirect('supplier/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $supplier_data = $this->Model_supplier->getsupplierData($id);
				$this->data['supplier_data'] = $supplier_data;
				$this->render_template('supplier/edit', $this->data);	
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
	   //      		redirect('supplier/', 'refresh');
				// }
				// else {
					$delete = $this->Model_supplier->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Data sukses dihapus!!');
		        		redirect('supplier/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Terjadi kesalahan!!');
		        		redirect('supplier/delete/'.$id, 'refresh');
		        	}
				// }	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('supplier/delete', $this->data);	
			}	
		}
		
	}

}