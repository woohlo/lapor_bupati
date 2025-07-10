<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if (!$this->session->userdata('user_id')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/home';
		$this->load->view('layout/index', $data);
	}

	public function welcome()
	{
		if ($this->session->userdata('user_id')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/welcome';
		$this->load->view('layout/index', $data);
	}

	public function login()
	{
		$is_login = $this->input->get('is_login');
		if($is_login == 1){
			$user_id = 123;
	        $user_name = 'Dummy';

	        // Set session
	        $this->session->set_userdata([
	            'user_id' => $user_id,
	            'user_name' => $user_name
	        ]);

	        // Redirect ke home/dashboard setelah login
	        redirect('/');
		}

		if ($this->session->userdata('user_id')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/login';
		$this->load->view('layout/index', $data);
	}

	public function register()
	{
		if ($this->session->userdata('user_id')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/register';
		$this->load->view('layout/index', $data);
	}

	public function reset_password()
	{
		if ($this->session->userdata('user_id')) {
	        redirect('/profile');
	    }

		$data['content'] = 'pages/reset_password';
		$this->load->view('layout/index', $data);
	}

	public function profile()
	{
		if (!$this->session->userdata('user_id')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/profile';
		$this->load->view('layout/index', $data);
	}

	public function about()
	{
		$data['content'] = 'pages/about';
		$this->load->view('layout/index', $data);
	}

	public function history()
	{
		$data['content'] = 'pages/history';
		$this->load->view('layout/index', $data);
	}

	public function report($code)
	{
		if (!$this->session->userdata('user_id')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/report';
		$data['data'] = ['code' => $code];
		$this->load->view('layout/index', $data);
	}

	public function account()
	{
		if (!$this->session->userdata('user_id')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/account';
		$this->load->view('layout/index', $data);
	}

	public function institution()
	{
		if (!$this->session->userdata('user_id')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/institution';
		$this->load->view('layout/index', $data);
	}

	public function logout()
    {
        // Hapus semua session
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect('/welcome');
    }
}
