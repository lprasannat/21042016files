<?php
if(isset($_POST['text'])){
    echo nl2br(htmlentities($_POST['text']));
}

?>
<form action="" method="post">
    <textarea name="text"></textarea>
    <input type="submit">
</form>