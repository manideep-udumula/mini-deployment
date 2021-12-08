<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
</head>
<body bgcolor="#0f8a9d">
    <center>

<ul>
  <li><a href="dashboard.php">Home</a></li>

  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>
<?php

require('db.php');  

$user=$_SESSION['username'];

$q="select query,answer from queries where username='$user'";

$re=mysqli_query($con,$q);
while($p=mysqli_fetch_assoc($re))
{

    if($p['answer'])
    {
        
   //Answered question   
             echo $p['query'];
        

            echo  $p['answer'];
       
    }
    else
    {
        //Yet to be answered


    }
}
?>
</center>
</body>
</html>