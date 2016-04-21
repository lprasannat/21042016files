<?php
if ($link=mysqli_connect("localhost", "dbuser", 123, "lakshmi")) {
    $time = time();
    $errors = array();
    if (isset($_POST['guestbook_name'], $_POST['guestbook_email'], $_POST['guestbook_message'])) {
        //echo "set";
        $guestbook_name = mysqli_real_escape_string($link,htmlentities($_POST['guestbook_name']));
        $guestbook_email = mysqli_real_escape_string($link,htmlentities($_POST['guestbook_email']));
        $guestbook_message = mysqli_real_escape_string($link,htmlentities($_POST['guestbook_message']));
        if (empty($guestbook_name) || empty($guestbook_email) || empty($guestbook_message)) {
            $errors[] = "all fields are required";
        }
        if (strlen($guestbook_name) > 45 || strlen($guestbook_email) > 255 || strlen($guestbook_message) > 255) {
            $errors[] = "one or more fileds exceeded ";
        }
        if (empty($errors)) {
            $insert="INSERT INTO entries values('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
            if(mysqli_query($link,$insert))
            {
               header('Location: '.$_SERVER['PHP_SELF']); 
            }else{
                $errors[]="something went wrong";
            }
        } else {
            foreach($errors as $error){
                echo "<p><strong>$error</strong></p>";
            }
        }
    }
    $entries=mysqli_query($link,"SELECT `timestamp`,`name`,`email`,`message` FROM entries ORDER BY `timestamp` DESC");
    if(mysqli_num_rows($entries)==0){
        echo "no entries yet";
    }else{
        while($entries_row=mysqli_fetch_assoc($entries)){
            $entries_timestamp=$entries_row['timestamp'];
            $entries_name=$entries_row['name'];
            $entries_email=$entries_row['email'];
            $entries_message=$entries_row['message'];
            echo '<p><strong>Posted by ' . $entries_name . ' (' . $entries_email . ') on ' . $entries_timestamp . '</strong> <br>' . $entries_message . '</p>';
        }
    }
} else {
    echo "could not connect";
}
?>
<hr>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <strong>Post something...</strong><br>
    Name:<br><input type="text" name="guestbook_name" maxlength="45"><br>
    Email:<br><input type="email" name="guestbook_email" maxlength="255"><br>
    Message:<br><textarea name="guestbook_message"rows="8" cols="50" maxlength="255"></textarea><br>
    <input type="submit" value="submit">


</form>