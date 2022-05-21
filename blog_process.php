<?php
    error_reporting(0);

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

//Retrieve form data into PHP variables
    $comment = $_POST['comment'];
    $name = $_POST['name'];


//Validate comment...

    if(empty($_POST['name']))
    {
        echo 'You left Nickname blank!';
        exit();
    }

    if(strlen($comment) < 5){
        echo 'Comment must be at least 10 characters long.';
        exit();
    }



//Store data into table
    $sql = "INSERT INTO Comments(Comment,Name) VALUES ('$comment','$name')";

    if($mysqli->query($sql)==true) {
        echo '';
        
    }
    else 
    {
      echo 'Error posting comment.<br>'.$mysqli->error.'<br>';
    }

    $mysqli->close();
    $page = 'blog.php';
    header('Location: '.$page);

?>