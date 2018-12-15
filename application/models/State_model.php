<?php

class State_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    
    public function statelist($id=NULL){
        $data['select'] = ['id', 'name','country_id'];
        $data['table'] =  'states';
        if($id){
            $data['where']=['id',$id];
        } 
        $result = $this->selectRecords($data);
        return $result;
    }

    public function addState($postData){
        $data['table'] = 'states';
        $data['where']=['name'=>$postData['state'],'country_id'=>$postData['country_name']];
        $count = $this->countRecords($data);
        if($count != 0){
            $json_response['status'] = 'error';
                $json_response['message'] = 'રાજ્યની વિગતો પહેલેથી જ ઉમેરવામાં આવી છે';
        }else{
        
            $data['insert']['name'] = $postData['state'];
            $data['insert']['country_id'] = $postData['country_name'];
            $data['table'] = 'states';
            $result = $this->insertRecord($data);
            unset($data);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'રાજ્યની વિગતો સફળતાપૂર્વક ઉમેરાઈ';
                $json_response['redirect'] = admin_url() . 'state';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        }
        return $json_response;
    }
    
    public function editState($postData){
       
        $data['table'] = 'states';
        $data['where']=['name'=>$postData['state'],'country_id'=>$postData['country_name'],'id != '=>$postData['id']];
        $count = $this->countRecords($data);
       
        if($count != 0){
            $json_response['status'] = 'error';
                $json_response['message'] = 'રાજ્યની વિગતો પહેલેથી જ ઉમેરવામાં આવી છે';
        }else{
            $data['update']['name'] = $postData['state'];
            $data['update']['country_id'] = $postData['country_id'];
             $data['update']['dt_updated'] = date('Y-m-d h:i:s');
            $data['where'] = ['id' => $postData['id']];
            $data['table'] = 'states';
            $result = $this->updateRecords($data);
            unset($data);
            
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'રાજ્યની વિગતો સફળતાપૂર્વક સુધારાઈ ગઇ છે';
                $json_response['redirect'] = admin_url() . 'state';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        }
        return $json_response;
    }
    
    function deleteState($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->delete('states');
        
        if($result){
            $json_response['status'] = 'success';
            $json_response['message'] = 'રાજ્ય વિગતો સફળતાપૂર્વક કાઢી નાખવામાં આવી છે';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            
        }else{
            $json_response['status'] = 'error';
            $json_response['message'] = 'કંઈક ખોટું થયું';
        }
        return $json_response;
    }
}

?>