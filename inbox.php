  <!DOCTYPE html>
<html>
<head>
   
    <title></title>
</head>
<body>

<?php
include 'auth_session.php';
$user=$_SESSION['username'];
require('db.php');  



$q="select * from queries where username='$user'";

$re=mysqli_query($con,$q);
if (mysqli_num_rows($re)>0) {
    

while($p=mysqli_fetch_assoc($re))
{
    ?>

<p>Query:</p>&nbsp;&nbsp;
<p style="font-weight:bold;"><?php echo $p['query'];
?></p>

<?php
    if($p['answer']==""){
        ?><p style="text-align: center;">Not yet responded</p><?php
        }
       else {
            ?><p><?php echo $P['answer'];?></p><?php
        } 
        ?>
        <br>
        
        <?php
  

}
}
else{
    echo "No queries till now";
}
?>

</body>
</html>
