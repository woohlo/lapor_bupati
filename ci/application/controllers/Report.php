<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(['ApiLibrary','ServiceLibrary']);
    }

    public function index($id)
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

	    $payload = $this->input->get();
	    $title = 'Instansi';
	    if(isset($payload['title']) && !empty($payload['title'])){
	    	$title = $payload['title'];
	    }

		$data['content'] = 'pages/report';
		$data['data'] = ['id' => $id, 'title' => $title];
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


	public function process()
	{
		$payload = $this->input->post();

		if(!isset($payload['phone']) || !$this->servicelibrary->isExist($payload['phone'])){
			return $this->servicelibrary->resError('Phone tidak valid');
		}

		if(!isset($payload['password']) || !$this->servicelibrary->isExist($payload['password'])){
			return $this->servicelibrary->resError('Password tidak valid');
		}

		$sendData = [
			'phone' => $payload['phone'],
			'password' => $payload['password'],
		];

		$result = $this->apilibrary->post('user/userlogin', $sendData);
		if(!$result['success']){
			return $this->servicelibrary->resError($result['message']);
		}

		if($result['success']){
			if(is_array($result['data']) && !empty($result['data']) && isset($result['data']['Data'])){
				$login_data = $result['data']['Data'];
				if(is_array($login_data) && !empty($login_data)){

					$is_auth = $login_data[0];
					$is_auth['is_login'] = true;

					$this->session->set_userdata($is_auth);
					return $this->servicelibrary->resSuccess('Login berhasil', $is_auth);
				}
			}
		}
	}

	public function history()
	{
		$data['content'] = 'pages/history';
		$this->load->view('layout/index', $data);
	}


/* ====================== END LINE ==========================*/
}
