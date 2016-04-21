<?php

session_start();
$_SESSION['user']=(isset($_GET['user'])===true)?(int)$_GET['user']:0;
require 'core/classes/core.php';
require 'core/classes/chatmessage.php';
$chat=new Chat();
print_r($chat->fetchMessage());
?>
<html>
    <head>
        <title>Chat app</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <script type="text/javascript" src="js/chat.js"></script>
            <script type="text/javascript" src="js/jquery.js"></script>
            <div class="chat">
                <div  class="messages">
                    <div class="message">
                        
                    </div>
                </div>
                <textarea class="entry" placeholder="type here and hit return use shift+ to return for a new line"></textarea>
            </div>
    </body>
</html>