<?php
session_start();

include "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = $_POST['name'];
  $number = $_POST['mobile'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $address = $_POST['address'];
  $photo_name = $_FILES['photo']['name'];
  $photo_tmp = $_FILES['photo']['tmp_name'];
  $photo_path = "uploads/" . $photo_name;
  $role = $_POST['role'];
 if(move_uploaded_file($photo_tmp, $photo_path)){

  $sql = "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name', '$number', '$password', '$address', '$photo_path', '$role', 0, 0)";

   if($conn->query($sql) === TRUE){
  echo "ok"; 
  ?>
  <script>
    alert("You have successfully Registered..")
    window.location.href = 'login.php';
  </script>
  <?php
 }
 else {
  echo "<p> error". $sql . "<br>" . $conn->error ."</p>"  ;
 }
}
 else {
    echo "<p>Image upload failed.</p>";
}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <style>
      * {
        margin: 0;
        color: #ffffff;
        padding: 0;
      }
      body {
        text-align: center;
        background: linear-gradient(rgb(4, 66, 88), rgb(21, 52, 83));
        height: 130vh;
      }
      body h1 {
        margin: 40px 0px;
      }
      body hr {
        margin-bottom: 20px;
      }
      .box{
       display: flex;
       justify-content: center;
      }
      form {
        line-height: 23.4px;
        background: rgba(255, 255, 255, 0.05);
        padding: 40px 50px;
         border-radius: 15px;
         box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        width: 520px;
        text-align: center;
      }
      form h3{
        text-decoration: underline;
        font-size: 22px;
      }
      button {
        width: 150px;
        height: 26px;
        color: #000;
        font-size: 15px;
        text-align: center;
        border-radius: 20px;
        box-shadow: 0px 0px 12px 3px #fff;
        border: none;
        cursor: pointer;
      }
      input {
        background: transparent;
        border: 1.2px solid #fff;
        border-radius: 10px;
        height: 24px;
        margin: 20px 20px;
      }
      input::placeholder{
       color: #b3b2b2ff;
       opacity: 1;
      }
      select {
        width: 150px;
        height: 26px;
        color: #ffffff;
        font-size: 15px;
        text-align: center;
        background: transparent;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 20px;
      }
      form p {
        margin-top: -12x;
      }
      a {
        color: orange;
      }
      option{
        background-color: #000;
      }
      @media(max-width:768px){
        form{
          width: 320px;
          height: 100%;
        }
      }
    </style>
  </head>
  <body>
    <h1>Online Voting System</h1>
    <hr />
    <div class="box">
    <form action="#" method="POST" enctype="multipart/form-data">

      <h3>Registration</h3>
      <input type="text" name="name" placeholder="enter name" />
      <input
        type="text"
        name="mobile"
        placeholder="enter mobile number"
      /><br />
      <input type="password" name="password" placeholder="enter password" />
      <input
        type="password"
        name="cpassword"
        placeholder=" confirm password"
      /><br />
      <input type="text" name="address" placeholder="address" /><br />
      <input type="file" name="photo" /><br />
      <select name="role">
        <option value="1">Voter</option>
        
        </select
      ><br />
      <button type="submit">Register</button> <br /><br />
      <p>Already have Registered ? <a href="login.php">Login here</a></p>
    </form>
    </div>
  </body>
</html>
