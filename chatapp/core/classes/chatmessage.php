<?php
class Chat extends Core{
    public function fetchMessage(){
        $this->query("
            SELECT `chat`.`message`,
                    `chatuser`.`username`,
                     `chatuser`.`user_id`
            FROM `chatmessage`
            JOIN `chatuser`
            ON    `chatmessage`.`user_id`=`chatuser`.`user_id`
            ORDER BY `chatmessage`.`timestamp`
            DESC ");
        return $this->rows();
    }
    public function throwMessage($user_id,$message){
        
    }
}

?>