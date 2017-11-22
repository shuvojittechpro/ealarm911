<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function process_login($data){
		try{
            $query = $this->db->get_where('user',$data);
            if($query->num_rows()>0){
                $result = array('status' => true);
                $result['record'] = $query->result_array();
            }
            else{
                throw new Exception("No such record exists");
            }
        }
        catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
	}
}
