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