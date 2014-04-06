<?php
class Context_analyser extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('StatisticsHelper');
        $this->load->model('context_analyser_model'); 
        
    }

    public function survey(){
//        echo $this->statisticshelper->ran_uniform(1, 10);
        $fid1 = $this->context_analyser_model->get_ran_context_factor_id();
        $fid2 = $this->context_analyser_model->get_ran_context_factor_id();
        $fid3 = $this->context_analyser_model->get_ran_context_factor_id();
        
        $value1 = $this->context_analyser_model->get_ran_context_value($fid1);
        $value2 = $this->context_analyser_model->get_ran_context_value($fid2);
        $value3 = $this->context_analyser_model->get_ran_context_value($fid3);
        
        $data['title'] = "Survey";
        $this->load->view('templates/header', $data);
	$this->load->view('survey/index', $data);
	$this->load->view('templates/footer', $data);
    }
    
    
    public function insert_context_factors(){
        $this->context_analyser_model->insert_context_factors();
        echo "OK";
    }
    
    public function insert_context_values(){
        $this->context_analyser_model->insert_context_values();
        echo "OK";
    }
    
    public function insert_categories_new(){
        $this->context_analyser_model->insert_categories_new();
        echo "OK";
    }

    public function test(){
        echo $this->context_analyser_model->get_ran_category(1);
    }
}
?>
