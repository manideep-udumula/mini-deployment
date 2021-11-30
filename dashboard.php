<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
    
       require('db.php');  
       
       if (isset($_POST['sub'])) {
        
        $queries    = stripslashes($_REQUEST['query']);
        //$queries= mysqli_real_escape_string($con, $queries);
        $user=$_SESSION['username'];
        $q="INSERT into `queries` (username,query) VALUES ('$user','$queries')";
  
        $result   = mysqli_query($con, $q);
 
        if ($result) {
            echo "<div class='form'>
                  <h3>You're Query sent successfully.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>go back</a> again.</p>
                 </div>";
        } 
        else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>go back</a> again.</p>
                  </div>";
        }
    } else {
    
?>
   
       
   

    <center>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        
        <form class="form" action="" method="post">
        <h4><p>Ask a Query</p></h4>
        <p><input type="text" name="query" placeholder="Type your Query here"></p></br>
        <input type="submit" name= "sub" text="Send">

        <p><a href="spandana.html">Logout</a></p>

    </form>
</center>
<?php
    }
    ?>


<?php

require('db.php');  

$user=$_SESSION['username'];

$q="select query,answer from queries where username='$user'";

$re=mysqli_query($con,$q);
if($p=mysqli_fetch_assoc($re))
{
    if($p['answer'])
    {
       //Answered question 


       
    }
    else
    {
        //Yet to be answered

    }
}
?>
</body>
</html>
