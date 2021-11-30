<?php


include("expert_auth_session.php"); 
?>
<DOCTYPE html>
<html>
<head>
<title>EXPERT</title>
</head>
<center>
<body>
    
    
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now Expert dashboard page.</p>
        <p><a href="spandana.html">Logout</a></p>

    <?php 
require('db.php'); 
$in=1;
$q="select query from queries";
$r=mysqli_query($con,$q);
while($p=mysqli_fetch_assoc($r))
{ 

    ?>
<br>

<form method="post">
    <input type="text" "background:none ; outline:none;" name="query" value="<?php echo $p['query']; ?>" />
    <input type="text" name="answer"   placeholder="Answer here"/>
    <button  name="subm">Submit</button>   <br> <br>
</form>
    <?php
}

?>



<?php


require('db.php'); 
if (isset($_POST['subm'])) {
        
    $answer    = stripslashes($_REQUEST['answer']);
    $query=$_POST['query']; 
    //$queries= mysqli_real_escape_string($con, $queries);
    $user=$_SESSION['username'];
    $q="UPDATE queries set answer = '$answer' where query='$query'";

    $result   = mysqli_query($con, $q);

    if ($result) {
        
   // echo "<script> alert( 'Answered succefully  :)')</script>";
} 
    else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='expert_dashboard.php'>go back</a> again.</p>
              </div>";
    }
 } 

?>

</body>
</center>
</html>
