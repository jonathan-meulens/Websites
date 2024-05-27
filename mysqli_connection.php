<?php
$servername = "127.0.0.1:3306";
$dbname = "u976402681_FFlow_F_Users" ;
$username = "u976402681_F_Users";
$password = "BacktoTheFuture1985>";

// Create connection
$conn =  new mysqli (hostname:$servername, 
                        username:$username, 
                        password:$password, 
                        database:$dbname);

// Check connection
if ($conn -> connect_errno) {
    echo "Connection failed: " . $conn -> connect_errno;
    exit();
}

echo "Connected successfully";

?>
