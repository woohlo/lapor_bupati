<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(['ApiLibrary','ServiceLibrary']);
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

	public function account()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

		$data['content'] = 'pages/account';
		$this->load->view('layout/index', $data);
	}

	public function profile()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

	    $profile = null;
	    $result = $this->apilibrary->post('user/profile', ['phone' => $this->session->userdata('userphone')]);
	    if($result['success']){
	    	if(is_array($result['data']) && !empty($result['data']) && isset($result['data']['Data'])){
	    		$result_data = $result['data']['Data'];
	    		if(is_array($result_data) && !empty($result_data)){
	    			$profile = $result_data[0];
	    		}
	    	}
	    }

		$data['content'] = 'pages/profile';
		$data['data'] = [
			'profile' => $profile
		];
		$this->load->view('layout/index', $data);
	}


	public function process_login()
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

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('/welcome');
    }


/* ====================== END LINE ==========================*/
}
