<?php

class Address extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->helper('download');
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
        $data['state']=$this->this_model->getstate();
        $data['citylist']=$this->this_model->getcity();
        
        $data['selectedstate'] = '';
        $data['selectedcity'] = '';
        if(!empty($this->input->get())){
            $data['selectedstate'] = $this->input->get('state');
            $data['selectedcity'] = $this->input->get('city');
        }
        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientList()',
        );
        $data['getComany'] = $this->this_model->fillter($this->input->get());;
        
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
        $data['state'] = $this->this_model->statelist();
        if ($this->input->post()){
            $res = $this->this_model->addUserDetail($this->input->post());
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
       
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
        $data['state']=$this->this_model->getstate();
        $data['companyDeatail'] = $this->this_model->companyDetail($id);
        $data['citylist'] = $this->this_model->citylistedit($data['companyDeatail']['0']->state);
        
        // print_r($data['companyDeatail']);exit;
        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $res = $this->this_model->editCompany($this->input->post(), $id);
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
    
    public function citylist(){
         if ($this->input->post()) {
            
          $result = $this->this_model->citylist($this->input->post());
          echo json_encode($result);
          exit();
         }
    }
    
    public function fillter(){
        if($this->input->post()){
          $data['getComany'] = $this->this_model->fillter($this->input->post());  
          $html=$this->load->view('admin/user/index',$data,true);
          $dataarray=array('html'=>$html);
          echo json_encode($dataarray);
          exit;
        }
    }
    
    
    public function createpdf()
    {
        if($this->input->post()){
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $htmlcontent=  $this->this_model->getpdfdetails($this->input->post('userid'));
          //  print_r($htmlcontent);exit;
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Nicola Asuni');
            $pdf->SetTitle('TCPDF Example 006');
            $pdf->SetSubject('TCPDF Tutorial');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $lg = Array();
            $lg['a_meta_charset'] = 'UTF-8';
            $lg['a_meta_dir'] = 'rtl';
            $lg['a_meta_language'] = 'fa';
            $lg['w_page'] = 'page';
            $pdf->setLanguageArray($lg);
            $pdf->SetFont('freeserif', '', 12);
            $pdf->AddPage();
            $pdf->setRTL(false);
            $html='';
            $new_html = '<table>';
            for($i=0;$i<count($htmlcontent);$i++){
                $new_html .='<tr>';
                if(isset($htmlcontent[$i]->userName)){
                    $new_html .=   '<td >
                                <span><b>Name</b> : '.htmlspecialchars($htmlcontent[$i]->userName).'</span><br>
                                <span><b>Address </b>: '.htmlspecialchars($htmlcontent[$i]->address1).' </span><br>
                                <span><b>Emial </b>: '.htmlspecialchars($htmlcontent[$i]->email).'</span><br>
                                <span><b>Postal Code </b>: '.htmlspecialchars($htmlcontent[$i]->zipcode).'</span><br>
                                <span><b>Country </b>: '.htmlspecialchars($htmlcontent[$i]->countryName).'</span><br>
                            </td>';
                }
                  $i++;
                  if(isset($htmlcontent[$i]->userName)){
                    $new_html .=   '<td >
                                <span><b>Name </b>: '.htmlspecialchars($htmlcontent[$i]->userName).'</span><br>
                                <span><b>Address </b>: '.htmlspecialchars($htmlcontent[$i]->address1).' </span><br>
                                <span><b>Emial </b>: '.htmlspecialchars($htmlcontent[$i]->email).'</span><br>
                                <span><b>Postal Code </b>: '.htmlspecialchars($htmlcontent[$i]->zipcode).'</span><br>
                                <span><b>Country </b>: '.htmlspecialchars($htmlcontent[$i]->countryName).'</span><br>
                            </td>';
                }
                     $new_html .=    '</tr>';
                
                $html=$html.$new_html;
            }
            $new_html .=    '</table>';
            //echo $new_html;exit;
            
            $pdf->WriteHTML($new_html, true, 0, true, 0);
            ob_end_clean();  
            $pdf->Output(FCPATH.'uploads\1.pdf', 'F');
               
            }
	}
        
        
        public function getpdf(){
            $this->output
                ->set_content_type('application/pdf')
                ->set_output(file_get_contents('uploads/1.pdf'));
        }

}
?>