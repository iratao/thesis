<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['title'] = 'Home';
            $this->load->view('templates/header', $data);
            $this->load->view('home_view', $data);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('login', 'refresh');
        }
    }
    
    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}
?>
