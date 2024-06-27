<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_login');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{

		$this->logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$username_exists = $this->model_login->check_username($this->input->post('username'));

			if ($username_exists == TRUE) {
				$login = $this->model_login->login($this->input->post('username'), $this->input->post('password'));

				if ($login) {

					$logged_in_sess = array(
						'id' => $login['id'],
						'username'  => $login['username'],
						'logged_in' => TRUE
					);

					$this->session->set_userdata($logged_in_sess);
					redirect('dashboard', 'refresh');
				} else {
					$this->data['errors'] = 'Username/Password tidak tepat';
					$this->load->view('login', $this->data);
				}
			} else {
				$this->data['errors'] = 'username tidak ditemukan';

				$this->load->view('login', $this->data);
			}
		} else {
			// false case
			$this->load->view('login');
		}
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/login', 'refresh');
	}
}
