<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "voting";

$conn = mysqli_connect($servername , $user , $password , $dbname);
if($conn -> connect_error){
  echo ("connection failed: ".$conn ->connection_error);
}
?>