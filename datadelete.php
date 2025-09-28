<?php
session_start();
include "connection.php";

if(isset($_SESSION['userdata'])) {
    $user_id = $_SESSION['userdata']['id'];
    $sql = "DELETE FROM user WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        session_destroy(); 
        ?>
        <script>alert ("Deleted and logged out!");
        window.location = "registeration.php";
        </script>
        
        <?php 
    } else {
        ?>
        <script>alert ("Error");</script>
        <?php 
    }
} else {
    echo "No user logged in!";
}
?>
