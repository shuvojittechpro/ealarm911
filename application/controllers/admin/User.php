<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	protected $salt = 'ealarm911';

	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/model_user');
    }

	public function index()
	{
		$this->load->view('admin/user_list');
    }

    public function response_user_list(){
        $params = array();
        $params = $_REQUEST;

        $result = $this->model_user->get_userlist($params);

        echo json_encode($result);  // send data as json format
        die;
    }
}
