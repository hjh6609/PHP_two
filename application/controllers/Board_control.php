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
        //$data = $this->Board_model->WordsList(); 

        //$this->load->view('Board_list',array('List'=>$data));
        //$this->load->view('board_footer');

        $this -> load -> library('pagination');
 
        // 페이지 네이션 설정
        $config['base_url'] = '/study/index.php/Board_control/board_index/board/page';

        // 페이징 주소
        $config['total_rows'] = $this -> Board_model -> WordsList($this -> uri -> segment(3), 'count');
        //$config['total_rows'] = $this -> board_m -> get_list($this -> uri -> segment(3), 'count');
        // 게시물 전체 개수
        $config['per_page'] = 5;
        // 한 페이지에 표시할 게시물 수
        $config['uri_segment'] = 5;
        // 페이지 번호가 위치한 세그먼트
 
        // 페이지네이션 초기화
        $this -> pagination -> initialize($config);
        // 페이지 링크를 생성하여 view에서 사용하 변수에 할당
        $data['pagination'] = $this -> pagination -> create_links();
 
        // 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
        $page = $this -> uri -> segment(5, 1);
 
        if ($page > 1) {
            $start = (($page / $config['per_page'])) * $config['per_page'];
        } else {
            $start = ($page - 1) * $config['per_page'];
        }
 
        $limit = $config['per_page'];
 
        $data['list'] = $this -> Board_model -> WordsList($this -> uri -> segment(3), '', $start, $limit);
        $this -> load -> view('Board_list', $data);
    }
}
