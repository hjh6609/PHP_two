<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_control extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        $this->load->model('Board_model');
    }
    
    public function index(){
        
       $this->load->view('member_save_view');

	}

    public function board_index(){
        $this->load->database();
        $data = $this->Board_model->WordsList(); 

        $this->load->view('Board_list',array('List'=>$data));
        $this->load->view('board_footer');
    }
}
