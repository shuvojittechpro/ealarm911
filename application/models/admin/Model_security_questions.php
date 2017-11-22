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
            2 => 'status',
            3 => 'postedTIme'
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
                            $status_val.'<a class="btn btn_icon-xs" title="Toggle Status" alt="Toggle Status" onClick="change_security_question_status('.$alldata['id'].',this)"><i class="fa fa-exchange" aria-hidden="true"></i></a>',
                            date('d-m-Y',$alldata['postedTime']),
                            '<a class="btn btn-sm btn-default btn_icon-success" href="'.base_url('admin/security_questions/edit/'.$alldata['id']).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn btn-sm btn-default btn_icon-danger" href="'.base_url('admin/security_questions/delete/'.$alldata['id']).'"><i class="fa fa-trash" aria-hidden="true"></i></a>'
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

                $this->db_master->trans_start();
                $this->db_master->where(array('id' => $questionID))->update('security_questions',array('status' => $new_stat));
                $this->db_master->trans_complete();

                if($this->db_master->trans_status()===true){
                    $result = array('status' => true);
                    $result['response'] = $response;
                }
                else{
                    throw new Exception("Updatation unsuccessfull");
                }
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

    public function add_question($data){
        try{
            $this->db_master->trans_start();
            $this->db_master->insert('security_questions',$data);
            $this->db_master->trans_complete();

            if($this->db_master->trans_status() === true){
                $result = array('status' => true);
                $result['message'] = 'Insertion Successfull';
            }
            else{
                throw new Exception("Error Processing Request");
            }
        }catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    
    public function update_question($data,$condition){
        try{
            $this->db_master->trans_start();
            $this->db_master->where($condition)->update('security_questions',$data);
            $this->db_master->trans_complete();

            if($this->db_master->trans_status() === true){
                $result = array('status' => true);
                $result['message'] = 'Update Successfull';
            }
            else{
                throw new Exception("Error Processing Request");
            }
        }catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function get_question($question_id){
        try{
            $query = $this->db_slave->select('question')->get_where('security_questions',array('id' => $question_id));
            if($query->num_rows()>0){
                $result = array('status' => true);
                $result['details'] = $query->result_array()[0];
            }
            else{
                throw new Exception("Error Processing Request");
            }
        }catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    
    public function delete_question($condition){
        try{
            $this->db_master->trans_start();
            $this->db_master->where($condition)->delete('security_questions');
            $this->db_master->trans_complete();

            if($this->db_master->trans_status() === true){
                $result = array('status' => true);
                $result['message'] = 'Deletion Successfull';
            }
            else{
                throw new Exception("Error Processing Request");
            }
        }catch(Exception $e){
            $result = array('status' => false);
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
