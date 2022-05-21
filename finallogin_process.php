<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="login_style.css">
</head>

<body>
   
<?php  

   //Set up the database login info and connect to the MyDatabase
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

  
  
    //check for empty first...
    if(empty($_POST['username']))
    {
        echo 'You left User ID blank!<br><br>';
        echo '<a href = "finallogin.html">Try Again</a><br><br>';
        exit();
    }


    if(empty($_POST['password']))
    {
        echo 'You left password blank!<br><br>';
        echo '<a href = "finallogin.html">Try Again</a><br><br>';
        exit();
    }

  
    //retrieve form data into PHP variables...
  
    //Reference legal uid and pass to test against 
    //values in Database

    $uid = $_POST['username'];
    $pass = $_POST['password'];
    //convert to common case (since uid is NOT case sensitive)
    $uid = strtolower($uid);
  

    //Reference legal uid and pass to test against 

   //Retrieve UserID from Database
   $sql = "SELECT User FROM Account WHERE User = '$uid'";
   $result = $mysqli->query($sql);

   if($result->num_rows > 0)
   {
     while($row = $result->fetch_assoc())
     {
       $uid_ref = $row["User"];
     }    
   }
   else
   {
      echo 'This is an invalid username and/or password.<br>';
      echo '<a href = "finallogin.html">Try Again</a><br><br>';
   
      exit();
   }

   //Select Password from corresponding user name
   $sql = "SELECT Pass FROM Account WHERE User = '$uid'";
   $result = $mysqli->query($sql);

   if($result->num_rows > 0)
   {
     while($row = $result->fetch_assoc())
     {
       $pass_ref = $row["Pass"];
     }    
   }
   else
   {
      echo 'This is an invalid username and/or password.<br>';
      echo '<a href = "finallogin.html">Try Again</a><br><br>';
   
      exit();
   }
   

   

   
    //Validate the username...

    if(strcmp($uid, $uid_ref) != 0)
    {
      echo 'This is an invalid username and/or password.<br>';
      echo '<a href = "finallogin.html">Try Again</a><br><br>';
   
      exit();
    }

    //Validate the password...
    //Do NOT convert this to a common case (passwords should be case sensitive)
    if(strcmp($pass,$pass_ref) != 0)
    {
      echo 'This is an invalid username and/or password.<br>';
      echo '<a href = "finallogin.html">Try Again</a><br><br>';
   
      exit();
    }

    //Assume anything after this is a legit uid/pass combo and grant login status
     session_start();
     $_SESSION['uid'] = $uid;
     header('Location: finallogstatus.php');

    //4.Close the connection to the MySQL server 
    $mysqli->close(); 
?> 
</div>
</body>
</html>
