<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    
</head>

<body>


<?php
//This handles checking for the session variable (login) stuff

    session_start();
 
    $uid = 'Guest';
    
    if(isset($_SESSION['uid']))
    {
      $uid = $_SESSION['uid'];
    }

    $_SESSION['uid'] = $uid;

//Display whether the user is logged in or not (and display relevant links)

    if(strcmp($uid, 'Guest') == 0)
    {
        echo 'Not currently logged in (Guest).<br><br>';
        echo '<a href = "finallogin.html">Click here to login</a><br><br>';
	echo '<a href = "register.html">Don\'t have an account? Sign up</a><br><br>';

      
    }
    else
    {
        $page = 'blog.php';
        header('Location: '.$page);
        echo 'Logged in as '.$uid.'<br><br>';
        echo '<a href = "finallogout_process.php">Click here to sign out</a><br><br>';
    }
    
?>


</body>

</html>