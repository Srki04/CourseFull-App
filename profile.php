<?php
  session_start();
  include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<!--Created by Robert Babaev-->
<!--Added php code by Srdjan Grbic-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilestyle.css">
    <script src="profile.js"></script>
    <title>CourseFull - Profile</title>
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
                <a href = "logout.php" id="logout">LOGOUT</a>
            </div>
        </div>

    </div>
    <div class="main-area">
        <div id="page-name" class="page-name"><?php echo $_SESSION['firstname']?> <?php echo $_SESSION['lastname']?></div>
        <div class="functionality">
            <table class="targets">
                <h1 class="section-title">TARGETS</h1>
                <tr>
                    <td>GOAL:</td>
                    <td><span id="goalmark"><?php echo $_SESSION['goal'] ?></span>%</td>
                    <td>
                        <button id="goalbtn" class="btn-style edit-btn">EDIT</button>
                        <form method = "POST" action = "#">
                          <input type="text" class="goal-input" name="newgoal" id="newgoal">
                          <button id="goalsubmitbtn" class="btn-style submit-btn" name = "ConfirmNewGoal">OK</button>
                          <?php
                            if(isset($_POST["ConfirmNewGoal"])){
                              $NewGoal = $_POST['newgoal'];
                              if($NewGoal != ""){
                                $CurrentUser = $_SESSION['userid'];
                                $Query = "UPDATE `users` SET `goal`= $NewGoal WHERE `userid` = $CurrentUser";
                                $ResultOfChanging = mysqli_query($Link, $Query) or die("Error happened, while trying to change your goal, please try this again later on");
                                $_SESSION['goal'] = $NewGoal;
                                header("Location:profile.php");
                              }
                            }
                          ?>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>CURRENT MARK:</td>
                    <td><span id="currentmark">90</span>%</td>
                </tr>
                <tr>
                    <td>TARGET:</td>
                    <td><span id="targetmark">90</span>%</td>
                </tr>
            </table>
            <!-- Maybe style the current mark in different colours to show how close the user is to hitting the goal-->
            <div id="hubs">
                <h1 class="section-title">HUBS</h1>
                <?php
                  $Hubs = "SELECT * FROM `hubs`";
                  $HubsFound = mysqli_query($Link, $Hubs) or die ("Sorry, the error happened. What are you gonna do, the is not that much easy, but it is fun. ");
                  $FoundRows = $HubsFound->num_rows;

                  $Courses = "SELECT * FROM `courses`";
                  $CoursesFound = mysqli_query($Link, $Courses) or die ("Failed to found anything in here, are you sure it is up to us? It, probabbly, is ;) :D . ");
                  $FoundedCoursesRows = $CoursesFound->num_rows;
                  if($FoundRows > 0){
                    while(($Rows = mysqli_fetch_row($HubsFound)) != NULL){
                      echo "<button class='accordion btn-style'>$Rows[1]<span class='avg'>Average Mark: <span id='hub1avg'>$Rows[3]</span>%</span></button>";

                      if($FoundedCoursesRows > 0){
                        while(($CourseRows = mysqli_fetch_row($CoursesFound)) != NULL){
                            if($CourseRows[2] == $Rows[0]){
                              echo "<div class='panel'>";
                                echo "<button class='accordion btn-style-inner'>$CourseRows[1]<span class='avg'>Current Mark: <span id='hub1course1avg'>$CourseRows[3]</span>%</span></button>";
                                echo "<div class='panel'>";
                                  echo "<span class='complete'>Weight Completed: <span id='hub1course1completed'>None</span>%</span>";
                                echo "</div>";
                              echo "</div>";
                            }
                        }
                      }
                      else{
                        echo "You do not have any Courses here, yet, but you can go to Hubs section of side menu to create some :) :) . ";
                      }

                    }
                  }
                  else{
                    echo "You do not have any Hubs, yet. ";
                  }
                 ?>
            </div>
            <!--Note: Sort deadlines by time, otherwise the feature is a bit pointless-->
            <div id="deadlines">
                <h1 class="section-title">DEADLINES</h1>
                <h4>You currently have 0 deadlines. </h4>
                <table class="deadline-table">
                    <tr class="deadline-header">
                        <th>COURSE NAME</th>
                        <th>COMPONENT NAME</th>
                        <th>DD/MM/YYYY</th>
                        <th>HH:MM</th>
                    </tr>
                    <tr>
                        <td>COURSE NAME</td>
                        <td>COMPONENT NAME</td>
                        <td>DD/MM/YYYY</td>
                        <td>HH:MM</td>
                    </tr>
                    <tr>
                        <td>COURSE NAME</td>
                        <td>COMPONENT NAME</td>
                        <td>DD/MM/YYYY</td>
                        <td>HH:MM</td>
                    </tr>
                    <tr>
                        <td>COURSE NAME</td>
                        <td>COMPONENT NAME</td>
                        <td>DD/MM/YYYY</td>
                        <td>HH:MM</td>
                    </tr>
                    <tr>
                        <td>COURSE NAME</td>
                        <td>COMPONENT NAME</td>
                        <td>DD/MM/YYYY</td>
                        <td>HH:MM</td>
                    </tr>
                </table>
            </div>
            <div id="Account Management">
                <h1 class="section-title">ACCOUNT</h1>
                <h2>DELETE ACCOUNT</h2>
                <h3 class="warning">WARNING</h3>
                <p>Account deletion is permanent. If you delete your account, all saved courses, deadlines, contacts,
                    and any other items attached to your account will be lost.</p>
                <form method = "POST" action = "#">
                  <button id="accountdelete" class="btn-style delete-btn" name = "DeleteYourAccount">DELETE ACCOUNT</button>
                  <?php
                    if(isset($_POST["DeleteYourAccount"])){
                      include "connection.php";
                      $WhichUser = $_SESSION['userid'];
                      $AccountDeletion = "DELETE FROM `users` WHERE `users`.`userid` = $WhichUser ";
                      $DeleteAccount = mysqli_query($Link, $AccountDeletion) or die ("Sadly error happened :( . Meeeeeeeeeeeee . Try again next time ok. Also, we are sorry that you are leaving. ");
                      include "logout.php";
                    }
                   ?>
                </form>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
