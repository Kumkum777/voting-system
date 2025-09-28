<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>logout page</title>
    <style>
      body h1,
      h4 {
        color: #fff;
      }
      body {
        text-align: center;
        background: linear-gradient(rgb(4, 66, 88), rgb(21, 52, 83));
        height: 100vh;
      }
      body a {
        text-decoration: none;
      }
      body button {
        height: 36px;
        width: 120px;
        background-color: rgb(255, 231, 111);
        color: #000000;
        border-radius: 20px;
        font-weight: bold;
        margin-top: 20px;
        cursor: pointer;
      }
      .btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 30px;
      }
    </style>
  </head>
  <body>
    <center><h1>Logout page!</h1></center>
    <hr />
    <center><h4>Do you want to logout?</h4></center>
    <div class="btn">
      <center>
        <a href="logout.php"><button>logout php</button></a>
      </center>
      <center>
         <a href="datadelete.php"><button>Sign-Out</button></a>
      </center>
    </div>
  </body>
</html>
