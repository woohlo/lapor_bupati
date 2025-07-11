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
		if (!$this->session->userdata('is_login')) {
	        return $this->servicelibrary->resError();
	    }

		$payload = $this->input->post();

		if(!isset($payload['title']) || !$this->servicelibrary->isExist($payload['title'])){
			return $this->servicelibrary->resError('Judul tidak valid');
		}

		if(!isset($payload['report']) || !$this->servicelibrary->isExist($payload['report'])){
			return $this->servicelibrary->resError('Keterangan tidak valid');
		}

		$sendData = [
			'idcat' => $payload['institution'],
			'title' => $payload['title'],
			'report' => $payload['report'],
			'token' => $this->session->userdata('token')
		];
		$reportData = json_encode($sendData);

		$result = $this->apilibrary->post('user/addlapor', ['data' => $reportData]);
		if(!$result['success']){
			return $this->servicelibrary->resError($result['message']);
		}

		return $this->servicelibrary->resSuccess('Laporan berhasil dikirim');
	}

	public function history()
	{
		if (!$this->session->userdata('is_login')) {
	        redirect('/welcome');
	    }

	    $reports = [];
	    $result = $this->apilibrary->post('user/viewlapor');
	    if($result['success']){
	    	if(is_array($result['data']) && !empty($result['data']) && isset($result['data']['Data'])){
	    		$result_data = $result['data']['Data'];
	    		if(is_array($result_data) && !empty($result_data)){
	    			$reports = $result_data;
	    		}
	    	}
	    }

		$data['content'] = 'pages/history';
		$data['data'] = [
			'reports' => $reports
		];
		$this->load->view('layout/index', $data);
	}


/* ====================== END LINE ==========================*/
}
