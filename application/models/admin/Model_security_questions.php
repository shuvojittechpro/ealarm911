<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_security_questions extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db_master = $this->load->database('master', TRUE);
		$this->db_slave = $this->load->database('slave', TRUE);
    }
	
	public function get_security_questions_list($params){
        
        $columns = $totalRecords = $data = array();
		//define index of column
        $columns = array( 
            0 => 'id',
            1 => 'question',
            1 => 'status',
            2 => 'postedTIme'
        );

        $where = $sqlTot = $sqlRec = "";
        $where =" WHERE 1 ";
        // check search value exist
        if( !empty($params['search']['value']) ) {   
            
            $where .=" AND ( question LIKE '".$params['search']['value']."%' ";    
            $where .=" ) ";
        }

        // getting total number records without any search
        $sql = "SELECT * FROM `security_questions` ";
        $sqlTot .= $sql;
        $sqlRec .= $sql;
        //concatenate search sql if value exist
        if(isset($where) && $where != '') {

            $sqlTot .= $where;
            $sqlRec .= $where;
        }
        
        $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
        
        $queryTot = $this->db->query($sqlTot);
        $totalRecords = $queryTot->num_rows();
        
        $queryRecords = $this->db->query($sqlRec);
        $all_data = $queryRecords->result_array();
        $i=1;
        foreach($all_data as $alldata){
            $status_val = $alldata['status']=='Y'?'<span class="label_status label_status-success"> Active </span>':'<span class="label_status label_status-danger"> In Active </span>';
            $data[] = array(
                            $i,
                            $alldata['question'],
                            $status_val.'<a class="btn btn-xs" title="Toggle Status" alt="Toggle Status" onClick="change_security_question_status('.$alldata['id'].',this)"><i class="fa fa-exchange" aria-hidden="true"></i></a>',
                            date('d-m-Y',$alldata['postedTime']),
                            '<a class="btn btn-xs btn-success" href="'.base_url('admin/security_questions/edit/'.$alldata['id']).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-xs btn-danger" href="'.base_url('admin/security_questions/delete/'.$alldata['id']).'"><i class="fa fa-trash" aria-hidden="true"></i></a>'
            );
            $i++;
        }
        
       

        $json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
            );
            
        return $json_data;
    }
    
    public function set_question_status($questionID){
        try{
            $query_check = $this->db_slave->select('id,status')->get_where('security_questions',array('id' => $questionID));
            if($query_check->num_rows()>0){
                $question_details = $query_check->result_array()[0];
                $new_stat = $question_details['status']=='Y'?'N':'Y';
                $response = $question_details['status']=='Y'?'false':'true';
                $this->db_master->where(array('id' => $questionID))->update('security_questions',array('status' => $new_stat));

                $result = array('status' => true);
                $result['response'] = $response;
            }
            else{
                throw new Exception("No question found with this id");
            }
        }catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
