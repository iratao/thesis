<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Context_analyser extends CI_Controller {
    const TOTAL = 10;
    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('StatisticsHelper');
        $this->load->model('context_analyser_model'); 
        
    }

    public function survey($gender = 'women'){
        if($this->session->userdata('logged_in') && $gender){
            $count = 1;
            if($gender == 'women'){
                $gender_id = Context_analyser_model::WOMEN;
            }
            else {
                $gender_id = Context_analyser_model::MEN;
            }
            if($this->input->post( 'BUTTON_submit' )){
                $count = $this->input->post('TEXT_count') + 1; 
                $context1_select = $this->input->post('SELECT_context1');
                $context2_select = $this->input->post('SELECT_context2');
                $context3_select = $this->input->post('SELECT_context3');
                $category = $this->input->post('TEXT_category');
                $cid = $this->context_analyser_model->get_category_new_id($category, $gender_id);
                $fid1 = $this->input->post('TEXT_fid1');
                $fid2 = $this->input->post('TEXT_fid2');
                $fid3 = $this->input->post('TEXT_fid3');
                $value1 = $this->input->post('TEXT_value1');
                $value2 = $this->input->post('TEXT_value2');
                $value3 = $this->input->post('TEXT_value3');
                
                $vid1 = $this->context_analyser_model->get_context_value_id($value1);
                $vid2 = $this->context_analyser_model->get_context_value_id($value2);
                $vid3 = $this->context_analyser_model->get_context_value_id($value3);
                
                $this->context_analyser_model->insert_survey_result($gender_id, $cid, $fid1, $vid1, $context1_select);
                $this->context_analyser_model->insert_survey_result($gender_id, $cid, $fid2, $vid2, $context2_select);
                $this->context_analyser_model->insert_survey_result($gender_id, $cid, $fid3, $vid3, $context3_select);
                
            }
            if($count <= Context_analyser::TOTAL){
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['title'] = "Survey";
                $data['gender'] = $gender;

                $fid1 = $this->context_analyser_model->get_ran_context_factor_id();
                $fid2 = $this->context_analyser_model->get_ran_context_factor_id();
                $fid3 = $this->context_analyser_model->get_ran_context_factor_id();

                $value1 = $this->context_analyser_model->get_ran_context_value($fid1);
                $value2 = $this->context_analyser_model->get_ran_context_value($fid2);
                $value3 = $this->context_analyser_model->get_ran_context_value($fid3);

                if($gender == 'women'){
                    $category = $this->context_analyser_model->get_ran_category(Context_analyser_model::WOMEN);
                    $image_url = $this->context_analyser_model->get_image_url($category, Context_analyser_model::WOMEN);

                }
                else if($gender == 'men'){
                    $category = $this->context_analyser_model->get_ran_category(Context_analyser_model::MEN);
                    $image_url = $this->context_analyser_model->get_image_url($category, Context_analyser_model::MEN);
                }

                $question1 = $this->context_analyser_model->get_question($fid1, $value1);
                $question2 = $this->context_analyser_model->get_question($fid2, $value2);
                $question3 = $this->context_analyser_model->get_question($fid3, $value3);

                $data['category'] = $category;
                $data['image_url'] = $image_url;
                $data['question1'] = $question1;
                $data['question2'] = $question2;
                $data['question3'] = $question3;
                $data['count'] = $count;
                $data['total'] = Context_analyser::TOTAL;
                $data['fid1'] = $fid1;
                $data['fid2'] = $fid2;
                $data['fid3'] = $fid3;
                $data['value1'] = $value1;
                $data['value2'] = $value2;
                $data['value3'] = $value3;

                $this->load->view('templates/header', $data);
                $this->load->view('survey/index', $data);
                $this->load->view('templates/footer', $data);
            }else{
                redirect('context_analyser/end', 'refresh');
            }
            
        }else{
            redirect('login', 'refresh');
        }
        
    }
    
    public function end(){
        $data['title'] = "End";
        $this->load->view('templates/header', $data);
        $this->load->view('survey/end', $data);
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
