<?php
  session_start();

  // Added PhP code by Srdjan Grbic

?>
<!DOCTYPE html>
<html lang="en">

<!--Created by Robert Babaev-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="groupnavstyle.css">
    <script src="groupnav.js"></script>
    <title>Groups</title>
</head>

<body onload="init()">
    <div id="sidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" id="navclose">&times;</a>
      <a href="logout.php">HOME</a>
      <a href="profile.php">PROFILE</a>
      <a href="hubs.php">HUBS</a>
      <a href="groups.php">GROUPS</a>
    </div>
    <div id="header" class="header">
        <div id="sidebar-btn" class="sidebar-btn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <span class="site-name">COURSE<span class="highlight-text">FULL</span></span>
        <div class="dropdown">
            <button id="user" class="user-btn btn-style"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname']?></button>
            <div id="userdropdown" class="dropdown-content">
                <a href = "logout.php" href="javascript:void(0)" id="logout">LOGOUT</a>
            </div>
        </div>
    </div>
    <div class="main-area">
        <div id="page-name" class="page-name">GROUPS</div>
        <div class="functionality">
            <table class="groups">
                <tr>
                    <th></th>
                    <th>GROUP NAME</th>
                    <th>SIZE</th>
                    <th>NOTIFICATIONS</th>
                </tr>
                <tr>
                    <td><button class="btn-style remove-btn">REMOVE</button></td>
                    <td><a href="#">COURSEFULL SHENANIGANS</a></td>
                    <td>3</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td><button class="btn-style remove-btn">REMOVE</button></td>
                    <td><a href="#">COMP 3007</a></td>
                    <td>3</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
