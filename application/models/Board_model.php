<?php

class Board_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function TotalList(){
    
          return $this->db->query('SELECT * FROM test12')->result();
        
    }

    public function SaveMem(){
        //echo "dddd";
        //seq,email,pw,quest1,quest2,quest3,quest4,datem
        //data:({"pw" : pw , "p1" : quest1 , "p2" : quest2 , "p3" : quest3 , "p4" : quest4 , "type" : "B" }),
        date_default_timezone_set('Asia/Seoul');

        $this->email= $_POST['mail'];
		$this->pw= $_POST['pw'];
		$this->quest1= $_POST['p1'];
		$this->quest2= $_POST['p2'];
        $this->quest3= $_POST['p3'];
        $this->quest4= $_POST['p4'];
        $this->datem= date("Y-m-d H:i:s",time());
        
      
            
		return $this->db->insert('insert_mem', $this);
    }

    public function emailCheck(){
        $mail = $this->id= $_POST['mail'];
        return $this->db->query('SELECT email FROM insert_mem WHERE email="'.$mail.'"')->result();
    }

    public function WordsList($table = 'board', $type = '', $offset = '', $limit = ''){
        //echo "111";
        //return;
        //return $this->db->query('SELECT * FROM board')->result();
        //echo $table;
        //echo $type = '', $offset = '', $limit = '';
        //return;
        $limit_query = '';
 
        if ($limit != '' OR $offset != '') {
            // 페이징이 있을 경우 처리
            $limit_query = ' LIMIT ' . $offset . ', ' . $limit;
        }
 
        $sql = "SELECT * FROM board ORDER BY seq DESC " . $limit_query;
        $query = $this -> db -> query($sql);
 
        if ($type == 'count') {
            $result = $query -> num_rows();
        } else {
            $result = $query -> result();
        }
 
        return $result;
    
    
    }

}