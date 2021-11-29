<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
 $servername = "remotemysql.com";
$username = "WK1eggxcgK";
$password = "Q7gkaeCv2k";
$dbname = "WK1eggxcgK";

// Create connection
$con = new mysqli($servername,
    $username, $password, $dbname);


    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>




