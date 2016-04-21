<?php
$body = 'this is an article';
$body = (strlen($body) >10)?substr($body,0,10):$body;
echo $body;
?>