<?php
session_start();
include ('connection.php');
$votes = $_POST['gvotes'];

$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($conn, "UPDATE user SET votes = votes + 1 WHERE id='$gid' AND role=2");

$update_user_status = mysqli_query($conn, "UPDATE user SET status = 1 WHERE id='$uid' ");

if($update_votes && $update_user_status){
 $groups = mysqli_query($conn, "SELECT id , name, votes, photo FROM user WHERE role =2");
 $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
 
 $_SESSION['userdata']['status'] = 1;
 $_SESSION['groupsdata'] = $groupsdata;
 echo '
 <script> 
 alert("voting successfull");
 window.location = "detailed.php";
 </script>
 ';
}
else{
  echo'
  <script>alert("Some error occured!");
  window.location = "detailed.php";
  </script>
  ';
}

?>