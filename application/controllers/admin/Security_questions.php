<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_questions extends CI_Controller {

	protected $salt = 'ealarm911';

	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/model_security_questions');
    }

	public function index()
	{
		$this->load->view('admin/security_questions_list');
    }

    public function response_security_questions_list(){
        $params = array();
        $params = $_REQUEST;

        $result = $this->model_security_questions->get_security_questions_list($params);
        echo json_encode($result);  // send data as json format
        die;
    }

    public function change_status(){
        $questionID = $this->input->post('questionID');

        $result = $this->model_security_questions->set_question_status($questionID);
        if($result['status'] === true){
            echo $result['response'];
        }
        exit;
    }
}
