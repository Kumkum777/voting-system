<?php
session_start();
if(!isset($_SESSION['userdata'])){
  header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
  $status = '<b style="color:red">Not Voted</b>';
}
else{
  $status = '<b style="color:green">Voted</b>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <style>
      body {
        text-align: center;
        background: linear-gradient(rgb(4, 66, 88), rgb(21, 52, 83));
        
      }
      body h1 {
        margin: 30px 0px;
        letter-spacing: 1px;
        text-shadow: 1px 12px 6px #000;
        color: #fff;
      }
      #backbtn {
        width: 100px;
        height: 30px;
        border: none;
        color: #000;
        text-align: center;
        transition: 0.3s;
        border-radius: 15px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        margin-top: 20px;
      }
      #logoutbtn {
        width: 100px;
        height: 30px;
        border: none;
        color: #000;
        text-align: center;
        transition: 0.3s;
        border-radius: 15px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        margin-top: 20px;
      }
      .btn {
        display: flex;
        justify-content: space-between;
      }
      body hr{
        margin-bottom: 40px;
        margin-top: 40px;
      }
      .main {
        background-color: rgba(252, 252, 252, 1);
        display: flex;
        flex-direction: row;
        margin: 10px 10%;
        border-radius: 20px;
        margin-bottom: 20px;
      }
      #Profile {
        background-color: rgba(45, 45, 45, 1);
        width: 40%;
        padding-top: 30px;
        color: #fff;
        border-radius: 18px;
        font-size: 18px;
      }
      #Profile img{
        border-radius: 50%;
        box-shadow: 0px 0px 14px 5px black;
      }
      #Group {
        width: 50%;
        padding-top: 30px;
        padding-right: 30px;
      }
      #Group hr{
        margin-top: 25px;
        margin-bottom: 25px;
      }
      #votebtn{
        width:90px;
        margin-top:15px;
        height: 25px;
        background-color:rgba(33, 137, 174, 1);
        border:none;
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
      }
      #voted{
        width:90px;
        margin-top:15px;
        height: 25px;
        background-color:rgba(239, 0, 0, 1);
        border:none;
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
      }
      @media(max-width: 768px){
          .main {
         flex-direction: column;
        margin: 20px;
        background-color: rgba(252, 252, 252, 1);
        
        margin: 10px 10%;
        margin-bottom: 20px;
  }
      #Profile, #Group {
        width: 100%;
       text-align: center;
  }
  #Profile {
        background-color: rgba(56, 56, 56, 1);
        
        padding-top: 40px;
        color: #fff;
        font-size: 18px;
      }
      #Group {
        padding-top: 30px;
        padding-right: 30px;
      }
      }
    </style>
  </head>
  <body>
    <div class="headerSection">
      <div class="btn">
        <a href="login.php"><button id="backbtn">Back</button></a>
        <a href="logoutpage.php"><button id="logoutbtn">Logout</button></a>
      </div>  
      <h1>Online Voting System</h1>
    </div>
    <hr />
    <div class="main">
      <div id="Profile">
        <img src="<?php echo $userdata['photo']?>" height="120" width="120"><br><br>
        <p>
          <b>Name: </b
          ><?php echo $userdata['name']?>
        </p>
        <p>
          <b>Mobile: </b
          ><?php echo $userdata['mobile']?>
        </p>
        <p>
          <b>Address: </b
          ><?php echo $userdata['address']?>
        </p>
        <p>
          <b>Status: </b
          ><?php echo $status?>
        </p>
      </div>
      <div id="Group">
    <?php
    if(!empty($groupsdata)){
        for($i=0; $i<count($groupsdata); $i++){
            echo "<div class='kk'>";
            echo "<img src='".$groupsdata[$i]['photo']."' width='100'><br>";
            
            echo "<b>Group name:</b> ".$groupsdata[$i]['name']."<br><br>";
            echo "<b>Votes:</b> ".$groupsdata[$i]['votes']."<br>";
            ?>
            <form action="vote.php" method="POST">
              <input type="hidden" name="gvotes" value="">
              <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
              <?php
              if($_SESSION['userdata']['status']==0){
               ?>
               <input type="submit"name="votebtn" value="vote"  id="votebtn">
               <?php
              }
              else{
                ?>
                <input disabled type="submit"name="votebtn" value="vote"  id="voted">
                <?php
              }
              ?>
              
            </form>
            <hr>
            <?php
            echo "</div>";
        }
    } else {
        echo "No groups available";
    }
    ?>
</div>
    </div>
  </body>
</html>
