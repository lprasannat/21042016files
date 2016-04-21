<?php
class Core{
    protected $db,$result;
    private $rows;
    public function __construct(){
        $this->db= new mysqli('localhost','dbuser',123,'likebutton');
    }
    public function query($sql){
       $this->result= $this->db->query($sql);
    }
    public function rows(){
        for($x=0;$x<=$this->db->affected_rows;$x++){
            $this->rows[]=$this->result->fetch_assoc();
        }
        return $this->rows;
    }
}


?>