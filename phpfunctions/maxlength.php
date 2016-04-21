<?php
$input = $_GET['name'];
$max_len = 10;
if (strlen($input) > $max_len){
    echo 'sorry too long';
    
} else{
    echo 'ok';
}
?>