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

	public function about()
	{
		$data['content'] = 'pages/about';
		$this->load->view('layout/index', $data);
	}


	/* ====================== END LINE ==========================*/
}
