<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(['ApiLibrary','ServiceLibrary']);
    }


	public function index()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/home';
		$this->load->view('layout/index', $data);
	}

	public function welcome()
	{
		if ($this->session->userdata('is_login')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/welcome';
		$this->load->view('layout/index', $data);
	}

	public function login()
	{
		if ($this->session->userdata('is_login')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/login';
		$this->load->view('layout/index', $data);
	}

	public function register()
	{
		if ($this->session->userdata('is_login')) {
	        redirect('/');
	    }

		$data['content'] = 'pages/register';
		$this->load->view('layout/index', $data);
	}

	public function reset_password()
	{
		if ($this->session->userdata('is_login')) {
	        redirect('/profile');
	    }

		$data['content'] = 'pages/reset_password';
		$this->load->view('layout/index', $data);
	}

	public function profile()
	{
		if (!$this->session->userdata('is_login')) {
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
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/report';
		$data['data'] = ['code' => $code];
		$this->load->view('layout/index', $data);
	}

	public function account()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/account';
		$this->load->view('layout/index', $data);
	}

	public function institution()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

	    $institutions = [];
	    $result = $this->apilibrary->post('user/viewcategory');
	    if($result['success']){
	    	if(is_array($result['data']) && !empty($result['data']) && isset($result['data']['data'])){
	    		$result_data = $result['data']['data'];
	    		if(is_array($result_data) && !empty($result_data)){
	    			$institutions = $result_data;
	    		}
	    	}
	    }

		$data['content'] = 'pages/institution';
		$data['data'] = [
			'institutions' => $institutions
		];
		$this->load->view('layout/index', $data);
	}



	/* ====================== END LINE ==========================*/
}
