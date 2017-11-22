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
    
    public function add(){
        $this->load->view('admin/security_questions_add');
    }

    public function edit($question_id){
        $data['question_details'] = $this->model_security_questions->get_question($question_id)['details'];
        $data['question_id'] = $question_id;
        $this->load->view('admin/security_questions_edit',$data);
    }

    public function process_question(){
        $data['question'] = $this->input->post('question');
        $data['status'] = "Y";
        $data['postedTime'] = time();
        if($this->input->post('action') == 'add'){
            $result = $this->model_security_questions->add_question($data);
        }
        elseif($this->input->post('action') == 'edit'){
            unset($data['status']);
            unset($data['postedTime']);
            $condition['id'] = $this->input->post('question_id');
            $result = $this->model_security_questions->update_question($data,$condition);
        }

        if($result['status'] === true){
            $this->session->set_flashdata('notify_mssg',$result['message']);
            $this->session->set_flashdata('notify_stat','success');
            $this->index();
        }
        else{
            $this->session->set_flashdata('notify_mssg',$result['message']);
            $this->session->set_flashdata('notify_stat','error');
            if($this->input->post('action') == 'add'){
                $this->add();
            }
            elseif($this->input->post('action') == 'edit'){
                $this->edit($this->input->post('question_id'));
            }
        }
    }
    
    public function delete($question_id){
        $condition['id'] = $question_id;
        $result = $this->model_security_questions->delete_question($condition);
        $this->session->set_flashdata('notify_mssg',$result['message']);
        if($result['status'] === true){
            $this->session->set_flashdata('notify_stat','success');
        }
        else{
            $this->session->set_flashdata('notify_stat','error');
        }
        
        
        $this->index();
    }
}
