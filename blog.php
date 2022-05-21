<html>
<head>
    <link rel="stylesheet" type="text/css" href="blog_style.css">
</head>


<?php
//This handles checking for the session variable (login) stuff

    session_start();
    
    if(isset($_SESSION['uid']))
    {
      $uid = $_SESSION['uid'];
    }

    $_SESSION['uid'] = $uid;

    
    echo "<font color='white'>"."Logged in as ".$uid."<br><br>"."</font>";
?>



<body>
    <img src = "kermit.jpg" class="post">
    <div class = "commentbox">
    <a>Comments: <br><br></a>

<?php

//Set up server
   $servername = "localhost";
   $username = "root";
   $password = "password";
   $dbname = "mydatabase";

   $mysqli = new mysqli($servername, $username, $password, $dbname);
   
   if($mysqli -> connect_errno)
   {
    echo 'Failed to connect to MySQL: '.$mysqli -> connect_error;
    exit();
   }
   else
   {
     echo '';
   }

    $sql_comments = "SELECT * FROM Comments";
    $comments_list = $mysqli -> query($sql_comments);

    if($comments_list->num_rows > 0) {
       while($row = $comments_list->fetch_assoc()){
           $str = $row["Name"].' - ';
           $str .= $row["Comment"].' ';
           echo $str.'<br><br>';
       }    
    }else{
       echo '0 results <br>';
    }

    

    $mysqli->close();


?>
</div>
<br><br>
 
<div class = "makecommentbox">
<form method = "post" action = "blog_process.php">
    <t>Write a Comment...<br><br></t>
    <label for = "name">Nickname: </label><br>
    <input type = "text" id = "name" name = "name"><br><br>

    <label for = "comment">Post a comment: (max. 255 characters) </label><br>
    <textarea id = "comment" name = "comment" maxlength = "255" style = "width:360px; height:100px">
    </textarea><br><br>

    <input type = "submit" value = "Comment">
</form>
</div>

<div class = "linksbox">
<a href = "finallogout_process.php">Click here to logout</a><br><br>
<a href = "contact.html">Contact Us</a><br><br>
</div>

</body>    
</html>