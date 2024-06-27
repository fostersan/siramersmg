<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
	}

	public function index()
	{

		$user_id = $this->session->userdata('id'); 
		$this->render_template('dashboard', $this->data);
	}
}