  <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<?php
include 'auth_session.php';

require('db.php');  

$user=$_SESSION['username'];

$q="select query,answer from queries where username='$user'";

$re=mysqli_query($con,$q);
if (mysqli_num_rows($re)>0) {
    

while($p=mysqli_fetch_assoc($re))
{
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
