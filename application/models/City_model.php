<?php

class City_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    
    public function citylist($id=NULL){
        
        $data['select'] = ['city.id', 'city.name','state.name as st_name','state.id as st_id'];
        $data['join'] = [
            'cities  as city' => [
                'city.state_id = state.id',
                '',
            ],
        ];
        $data['table'] =  'states as state';
        if($id){
            $data['where']=['city.id'=>$id];
        }
        $result = $this->selectFromJoin($data);
        return $result;
        
    }
    
    public function statelist(){
        $data['table']='states';
        $data['select']=['name','id'];
        $result=  $this->selectRecords($data);
       return $result;
    }

    public function addcity($postData){
        $data['table'] = 'cities';
        $data['where']=['state_id'=>$postData['state'],'name'=>$postData['city']];
        $count = $this->countRecords($data);
        
        if($count != 0){
            $json_response['status'] = 'error';
                $json_response['message'] = 'શહેરની વિગતો પહેલાથી જ ઉમેરવામાં આવી છે';
        }else{
        
            $data['insert']['name'] = $postData['city'];
            $data['insert']['state_id'] = $postData['state'];
            $data['table'] = 'cities';
            $result = $this->insertRecord($data);
            unset($data);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'શહેરની વિગતો સફળતાપૂર્વક ઉમેરવામાં આવી છે';
                $json_response['redirect'] = admin_url() . 'city';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        }
        return $json_response;
    }
    
    
    public function editcity($postData){
        $data['table'] = 'cities';
        $data['where']=['state_id'=>$postData['state'],'name'=>$postData['city'],'id !='=>$postData['id']];
        $count = $this->countRecords($data);
        
        if($count != 0){
            $json_response['status'] = 'error';
            $json_response['message'] = 'શહેરની વિગતો પહેલાથી જ ઉમેરવામાં આવી છે';
        }else{
        
            $data['update']['name'] = $postData['city'];
            $data['update']['state_id'] = $postData['state'];
            $data['update']['dt_updated'] = date('Y-m-d h:i:s');
            $data['where'] = ['id' => $postData['id']];
            $data['table'] = 'cities';
            $result = $this->updateRecords($data);
            
            unset($data);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'શહેરની વિગતો સફળતાપૂર્વક સુધારાઈ ગઇ છે';
                $json_response['redirect'] = admin_url() . 'city';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        }
        return $json_response;
    }

    function deleteCity($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->delete('cities');
        
        if($result){
            $json_response['status'] = 'success';
            $json_response['message'] = 'શહેરની વિગતો સફળતાપૂર્વક કાઢી નાખવામાં આવી છે';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            
        }else{
            $json_response['status'] = 'error';
            $json_response['message'] = 'કંઈક ખોટું થયું';
        }
        return $json_response;
    }
}

?>