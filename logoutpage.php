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
      body h1 {
        padding-top: 20px;
      }
      body h1,
      h4 {
        color: #fff;
      }
      body {
        text-align: center;
        background: linear-gradient(rgb(4, 66, 88), rgb(21, 52, 83));
        height: 100vh;
      }
      body hr {
        margin-top: 30px;
        margin-bottom: 90px;
      }
      .mainn {
        display: flex;
        justify-content: center;
      }
      .main {
        line-height: 23.4px;
        background: rgba(255, 255, 255, 0.05);
        padding: 40px 50px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        width: 320px;
        text-align: center;
      }
      body a {
        text-decoration: none;
      }
      body button {
        height: 36px;
        width: 120px;
        background-color: rgba(255, 255, 255, 1);
        box-shadow: 0 0px 12px 3px rgba(240, 240, 240, 0.79);
        color: #000000;
        border-radius: 20px;
        font-weight: bold;
        margin-top: 20px;
        border:none;
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
    <div class="mainn">
      <div class="main">
        <center><h4>Do you want to logout?</h4></center>
        <div class="btn">
          <center>
            <a href="logout.php"><button>logOut</button></a>
          </center>
          <center>
            <a href="datadelete.php"><button>Sign-Out</button></a>
          </center>
        </div>
      </div>
    </div>
  </body>
</html>
