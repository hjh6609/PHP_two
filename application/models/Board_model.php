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

    public function WordsList(){
        return $this->db->query('SELECT * FROM board')->result();
    }

}