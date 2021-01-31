<?php
  include "connection.php";
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<!--Created by Robert Babaev-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="componentstyle.css">
    <script src="component.js"></script>
    <title>CourseFull - Component</title>
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
            <button id="user" class="user-btn btn-style"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></button>
            <div id="userdropdown" class="dropdown-content">
                <a href="javascript:void(0)" id="logout">LOGOUT</a>
            </div>
        </div>
    </div>
    <div class="main-area">
        <div id="page-name" class="page-name">COMPONENT</div>
        <div class="functionality">
            <table class="component-data">
                <tr>
                    <td>COURSE: </td>
                    <td><span id="course-name">COurse</span></td>
                </tr>
                <tr>
                    <td>NAME: </td>
                    <td><span id="comp-name">ASSIGNMENT 1</span></td>
                    <td class="edit-field">
                        <input type="text" id="comp-name-input">
                        <button class="btn-style submit-btn" id="submit-name">OK</button>
                    </td>
                    <td><button class="btn-style edit-btn">EDIT</button></td>
                </tr>
                <tr>
                    <td>WEIGHT: </td>
                    <td><span id="comp-weight">15</span>%</td>
                    <td class="edit-field">
                        <input type="text" id="comp-weight-input">
                        <button class="btn-style submit-btn" id="submit-weight">OK</button>
                    </td>
                    <td><button class="btn-style edit-btn">EDIT</button></td>
                </tr>
                <tr>
                    <td>TARGET: </td>
                    <td><span id="comp-target">80</span>%</td>
                    <td class="edit-field">
                        <input type="text" id="comp-target-input">
                        <button class="btn-style submit-btn" id="submit-target">OK</button>
                    </td>
                    <td><button class="btn-style edit-btn">EDIT</button></td>
                </tr>
                <tr>
                    <td>ACTUAL: </td>
                    <td><span id="comp-actual">90</span>%</td>
                    <td class="edit-field">
                        <input type="text" id="comp-actual-input">
                        <button class="btn-style submit-btn" id="submit-actual">OK</button>
                    </td>
                    <td><button class="btn-style edit-btn">EDIT</button></td>
                </tr>
                <tr>
                    <td>DEADLINE: </td>
                    <td><span id="comp-name">DD/MM/YYYY</span></td>
                    <td class="edit-field">
                        <input type="date" id="comp-deadline-input">
                        <button class="btn-style submit-btn" id="submit-deadline">OK</button>
                    </td>
                    <td><button class="btn-style edit-btn">EDIT</button></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
