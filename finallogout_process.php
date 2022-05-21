<?php  
    //This clears the session variables...
    session_start();
    $_SESSION['uid'] = 'Guest';
    header('Location: finallogstatus.php');
?> 