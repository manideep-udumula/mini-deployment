<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<?php
include("auth_session.php");
?>


<?php
require('db.php');  

$user=$_SESSION['username'];

$q="select query,answer from queries where username= ['$user']";

$re=mysqli_query($con,$q);
if (mysqli_num_rows($re)) {
    // code...

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
}
?>

</body>
</html>
