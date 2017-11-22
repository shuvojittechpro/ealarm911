<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $salt = 'ealarm911';

	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/model_home');
    }

	public function index()
	{
		$this->load->view('admin/home');
	}

	public function process_login(){
		$data['username'] = $this->input->post('username');		
		$data['password'] = md5($this->salt.$this->input->post('password'));

		$result = $this->model_home->process_login($data);
		if($result['status'] === true){
			$this->session->set_userdata('user_id',$result['record']['id']);
			redirect('admin/dashboard');
		}
		else{
			$this->session->set_flashdata('notify_mssg',$result['message']);
			$this->session->set_flashdata('notify_stat','error');
			redirect('admin/home');
		}
	}

	public function process_logout(){
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('admin/home');
	}
}
