<?php

class Address extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Address_model', 'this_model');
    }

    function index() {
        $data['page'] = "admin/user/index";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Address';
        $data['var_meta_title'] = 'Address';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Address List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientList()',
        );
        $data['getComany'] = $this->this_model->getDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function add() {
        
        $data['page'] = "admin/user/add";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Address';
        $data['var_meta_title'] = 'Address';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Address Add',
        );
        $data['css'] = array();

        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientAdd()',
        );

        $data['country'] = $this->this_model->countryList();
        if ($this->input->post()) {
            $res = $this->this_model->addUserDetail($this->input->post());
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(admin_url() . 'address');
        }

        $data['page'] = "admin/user/edit";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Address';
        $data['var_meta_title'] = 'Address';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Address' => 'Address Edit',
        );
        $data['css'] = array();

        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientEdit()',
        );

        $data['country'] = $this->this_model->countryList();
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        // print_r($data['companyDeatail']);exit;
        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $res = $this->this_model->editCompany($this->input->post(), $companyId);
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function clientDelete() {
        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $result = $this->this_model->deleteUser($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

}
?>