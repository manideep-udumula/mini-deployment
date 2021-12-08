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
<body bgcolor="#0f8a9d">
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
   
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>
   

    <center>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        
        <form class="form" action="" method="post">
        <h4><p>Ask a Query</p></h4>
        <p><input type="text" name="query" placeholder="Type your Query here"></p></br>
        <input type="submit" name= "sub" text="Send">

       

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
              echo "<h4>Question:</h4>",  $p['query'];
        

            echo  "<h4>Answer:</h4>", $p['answer']; 
       
    }
    else
    {
        //Yet to be answered

    }
}
?>
</body>
</html>
