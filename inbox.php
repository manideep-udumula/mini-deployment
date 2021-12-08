
<?php
include("auth_session.php");
?>


<?php
require('db.php');  

$user=$_SESSION['username'];

$q="select query,answer from queries where username= ['$user']";

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
            echo "not retrived";

    }
}
?>

