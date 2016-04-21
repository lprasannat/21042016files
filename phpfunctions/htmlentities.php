<?php
$from_db='<script>alert("hello")</script>';
$sanitised=htmlentities($from_db);
echo $sanitised;

?>