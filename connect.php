<!DOCTYPE html>
<html>
<body>






<?php

require_once 'base.php';

//create connection. First need to instantiate new mysqli class
$conn =  new mysqli("localhost", "root", "mysql", "hotels");

//check if connection is successful
if ($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}
echo "";



/*
//create connection
$conn = mysqli_connect("localhost","root","","hotels");

//check connection
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}else{
    echo "Connected successfully";
}

*/
?>


</form>
</body>
</html>