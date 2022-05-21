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

   //Create Table -- Commented out but verified that it was created.

    //$sql = 'CREATE TABLE Account(
    //User VARCHAR(30),
    //Pass VARCHAR(25))';

    //if($mysqli->query($sql) == true)
    //{
    //echo "Table 'Account' created successfully <br>";
    //}
    //else
    //{
     //echo 'Error creating table: '.$mysqli->error.'<br>';
    //}
    
    //check for empty first...
    if(empty($_POST['username']))
    {
        echo 'You left User Name blank!';
        exit();
    }


    if(empty($_POST['password']))
    {
        echo 'You left password blank!';
        exit();
    }

  
    //retrieve form data into PHP variables...
    //Reference legal uid and pass to insert 
    //values in Database

    $uid = $_POST['username'];
    $pass = $_POST['password'];
    //convert to common case (since uid is NOT case sensitive)
    $uid = strtolower($uid);
  


    //Store data into table
    $sql = "INSERT INTO Account (User, Pass)
    VALUES ('$uid', '$pass')";

    if($mysqli->query($sql)==true)
    {
      echo "Account created successfully<br>";
      echo '<a href = "finallogin.html">Click here to login</a><br><br>';
    }
    else 
    {
      echo 'Error creating Account:'.$mysqli->error.'<br>';
    }

    //Assume anything after this is a legit uid/pass combo and grant login status
     session_start();
     $_SESSION['uid'] = $uid;
     header('Location: finallogstatus.php'); 


   //Close the connection to the MySQL server 
    $mysqli->close(); 
    
?>