<?php


include("expert_auth_session.php"); 
?>
<DOCTYPE html>
<html>
<head>
<title>EXPERT</title>
</head>
<center>
<body bgcolor="#0f8a9d">
    <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="wwww.geeksforgeeks.com">News</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>
    
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now Expert dashboard page.</p>
        

    <?php 
require('db.php'); 
$in=1;
$q="select query from queries where answer is NULL";
$r=mysqli_query($con,$q);
while($p=mysqli_fetch_assoc($r))
{ 

    ?>
<br>

<form method="post">
    <!--<label for="answer"value="<?php echo $p['query']; ?>" ></label>-->
  <input type="Label" background: #0f8a9d ; outline:none; name="query" value="<?php echo $p['query']; ?>" />
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
