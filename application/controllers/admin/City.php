<?php 

class City extends Admin_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('City_model', 'this_model');
    }
    
    public function index(){
       
        $data['page'] = "admin/city/index";
        $data['city'] = 'active';
        $data['pagetitle'] = 'City';
        $data['var_meta_title'] = 'City';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'City',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/city.js',
        );
        $data['init'] = array(
            'City.init()',
        );
        $data['getcity'] = $this->this_model->citylist();
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    public function addcity(){
        $data['page'] = "admin/city/addcity";
        $data['city'] = 'active';
        $data['pagetitle'] = 'Add City';
        $data['var_meta_title'] = 'Add City';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Add City',
        );
        $data['statelist']=$this->this_model->statelist($this->input->post());
        if($this->input->post()){
           $res = $this->this_model->addcity($this->input->post());
            echo json_encode($res);
            exit();
        }
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/city.js',
        );
        $data['init'] = array(
            'City.add()',
        );
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    public function editcity($id=NULL){
        $data['page'] = "admin/city/editcity";
        $data['city'] = 'active';
        $data['pagetitle'] = 'Edit City';
        $data['var_meta_title'] = 'Edit City';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Edit City',
        );
        $data['details']=$this->this_model->citylist($id);
       
        $data['statelist']=$this->this_model->statelist($this->input->post());
        if($this->input->post()){
            $res = $this->this_model->editcity($this->input->post());
            echo json_encode($res);
            exit();
        }
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/city.js',
        );
        $data['init'] = array(
            'City.edit()',
        );
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
     public function citydelete(){
        if ($this->input->post()) {
            $result = $this->this_model->deleteCity($this->input->post());
            echo json_encode($result);
            exit();
        }
    }
}
?>