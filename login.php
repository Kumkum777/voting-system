<?php
session_start();
include ("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role'");

    if(mysqli_num_rows($check) > 0){
        $userdata = mysqli_fetch_array($check);
        $group = mysqli_query($conn, "SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($group, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        header("Location: detailed.php");
        exit();
    } else {
        echo '
        <script>
        alert("Invalid Credentials! or user not found!");
        window.location ="login.php";
        </script>
        ';
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voting System</title>
    <style>
      * {
        margin: 0;
        color: #ffffff;
        padding: 0;
      }
      body {
        text-align: center;
        background: linear-gradient(rgb(4, 66, 88), rgb(21, 52, 83));
        height: 100vh;
      }
      body h1 {
        margin: 20px 0px;
      }
      .main{
        display: flex;
        justify-content: center;
      }
      form {
        line-height: 23.4px;
      }
      form hr {
        margin-left: 540px;
        width: 200px;
        margin-bottom: 30px;
      }
      form{
        background: rgba(255, 255, 255, 0.05);
        padding: 40px 50px;
         border-radius: 15px;
         box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        width: 320px;
        text-align: center;
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
        height: 18px;
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
    </style>
  </head>
  <body>
    <h1>Online Voting System</h1>
    <hr />
    <br />
  <div class="main">
    <form action="login.php" method="POST">
      <h3>Login</h3>
      <br />
      <label for="mobile">Number:--</label>
      <input id="mobile" type="number" name="mobile" /><br /><br />
      <label for="password">password :-</label>
      <input id="password" type="password" name="password" /><br /><br />
      <select name="role">
        <option value="1">Voter</option>
        <option value="2">Group</option></select
      ><br /><br />
      <button type="submit">Login</button><br /><br />
      <p>new user ? <a href="registeration.php">Register here</a></p>
    </form>
    </div>
  </body>
</html>
