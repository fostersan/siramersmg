<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Barang Masuk';
		$this->load->model('model_barang');
		$this->load->model('model_barangmasuk');
		$this->load->model('model_supplier');
		$this->load->model('model_users');
	}

	public function index()
	{
		$barangmasuk_data = $this->model_barangmasuk->getBarangmasukData();
		$user_id = $this->session->userdata('id');

		$result = array();
		foreach ($barangmasuk_data as $k => $v) {
			$result[$k]['barangmasuk'] = $v;
			$barang_data = $this->model_barang->getBarangData($v['barang_id']);
			$supplier_data = $this->model_supplier->getSupplierData($v['supplier_id']);

			$user_data = $this->model_users->getUserData($user_id);
			$this->data['user_data'] = $user_data;
			
			$result[$k]['barang'] = $barang_data;
			$result[$k]['users'] = $user_data;
			$result[$k]['supplier'] = $supplier_data;
		}

		$this->data['barangmasuk_data'] = $result;
		$this->render_template('barangmasuk/index', $this->data);
	}

	public function create()
	{	
		$user_id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$kode = 'BM' . date('ymd');
        $kode_terakhir = $this->model_barangmasuk->getMax('barangmasuk', 'id', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
        

        if ($this->form_validation->run() == TRUE) {
            // true case

        	$data = array(
        		'id' => $kode . $number,
        		'user_id' => $this->input->post('nama'),
        		'tanggal_masuk' => $this->input->post('tanggal_masuk'),
        		'barang_id' => $this->input->post('nama_barang'),
        		'supplier_id' => $this->input->post('nama_supplier'),
        		'jumlah_masuk' => $this->input->post('jumlah_masuk')
        	);

        	$create = $this->model_barangmasuk->create($data);
        	if($create == true) {

        		// now unavailable the slot

        		if($create == true) {
        			$this->session->set_flashdata('success', 'Successfully created');
		    		redirect('barangmasuk', 'refresh');	
        		}
        		else {
        			$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('barangmasuk/create', 'refresh');
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('barangmasuk/create', 'refresh');
        	}
        }
        else {
        	$nama_barang = $this->model_barang->getBarangData();
        	$this->data['nama_barang'] = $nama_barang;

        	$nama_supplier = $this->model_supplier->getSupplierData();
        	$this->data['nama_supplier'] = $nama_supplier;

			$this->render_template('barangmasuk/create', $this->data);
		}
	}
}