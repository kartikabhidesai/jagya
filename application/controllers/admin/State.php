<?php 

class State extends Admin_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('State_model', 'this_model');
    }
    
    public function index(){
     
        $data['page'] = "admin/state/index";
        $data['state'] = 'active';
        $data['pagetitle'] = 'State';
        $data['var_meta_title'] = 'State';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'State',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/state.js',
        );
        $data['init'] = array(
            'State.init()',
        );
        $data['getstate'] = $this->this_model->statelist();
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    public function addstate(){
         
        $data['page'] = "admin/state/addstate";
        $data['state'] = 'active';
        $data['pagetitle'] = 'Add State';
        $data['var_meta_title'] = 'Add State';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Add State',
        );
        
        if($this->input->post()){
           $res = $this->this_model->addState($this->input->post());
            echo json_encode($res);
            exit();
        }
        $data['css'] = array();

        $data['js'] = array(
            'admin/state.js',
        );
        $data['init'] = array(
            'State.add()',
        );
        $data['getstate'] = $this->this_model->statelist();
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    public function editstate($id=NUll){
       
        $data['page'] = "admin/state/editstate";
        $data['state'] = 'active';
        $data['pagetitle'] = 'Edit State';
        $data['var_meta_title'] = 'Edit State';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Edit State',
        );
        if($this->input->post()){
          
           $res = $this->this_model->editState($this->input->post());
            echo json_encode($res);
            exit();
        }
        $data['css'] = array();

        $data['js'] = array(
            'admin/state.js',
        );
        $data['init'] = array(
            'State.edit()',
        );
        $data['getstate'] = $this->this_model->statelist($id);
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    public function stateDelete(){
        if ($this->input->post()) {
            $result = $this->this_model->deleteState($this->input->post());
            echo json_encode($result);
            exit();
        }
    }
}
?>