<?php
  include "connection.php";
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<!--Created by Robert Babaev-->
<!--Added PhP code by Srdjan Grbic-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hubstyle.css">
    <script src="hubs.js"></script>
    <title>Hubs</title>
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
            <button id="user" class="user-btn btn-style"><?php echo $_SESSION['firstname']?> <?php echo $_SESSION['lastname']?></button>
            <div id="userdropdown" class="dropdown-content">
                <a href = "logout.php" id="logout">LOGOUT</a>
            </div>
        </div>
    </div>
    <div class="main-area">
        <div id="page-name" class="page-name">HUBS & COURSES</div>
        <div class="functionality">
            <!--I'm thinking sort in alphabetical order-->
            <!--Also, the a tags should go to their respective components-->
            <?php
              $HubsQuery = "SELECT * FROM `hubs`";
              $HubsQueryResult = mysqli_query($Link, $HubsQuery) or die ("There was an error trying to load your hubs :( . We are very very very very sorry and could you maybe try, to load, them later on? Awesome.  ");
              $NumberOfFoundedRows = $HubsQueryResult->num_rows;

              $CoursesQuery = "SELECT * FROM `courses`";
              $CourseQueryResult = mysqli_query($Link, $CoursesQuery) or die ("Error, while trying to load you courses, please be a lamb and try again later on");
              $NumberOfCourses = $CourseQueryResult->num_rows;

              $ComponentQuery = "SELECT * FROM `components`";
              $ComponentQueryResult = mysqli_query($Link, $ComponentQuery) or die ("You components can not be loaded, what are you going to do now? You need to try again later on if you wanted to see your components again.  ");
              $NumberOfComponents = $ComponentQueryResult->num_rows;

              if($NumberOfFoundedRows > 0){
                while(($Row = mysqli_fetch_row($HubsQueryResult)) != NULL){
                  echo "<div id='hubs'>";
                      echo "<div class='hub'>";
                          echo "<div class='accordion'  >";
                              echo "<form method = 'POST' action = '#'>";
                              echo "<button class='remove-hub btn-style' name = 'RemoveHub'>REMOVE HUB</button>";
                              if(isset($_POST['RemoveHub'])){
                                $RemoveHub = "DELETE FROM `hubs` WHERE `hubid` = '$Row[0]'";
                                $RemoveHubQuery = mysqli_query($Link, $RemoveHub) or die ("There was an error, while trying to delete that hub");
                                header('Location: hubs.php');
                              }
                              echo "</form>";
                              echo "<button class='accordion-btn btn-style'>$Row[1]<span class='avg'>Average Mark: <span id='hub1avg'>$Row[3]</span>%</span></button>";
                          echo "</div>";
                          if($NumberOfCourses > 0){
                            while(($CourseRow = mysqli_fetch_row($CourseQueryResult)) != NULL){
                              if($CourseRow[2] == $Row[0]){
                                echo "<div class='panel'>";
                                    echo "<div class='accordion'>";
                                    echo "<form method = 'POST' action = '#'>";
                                    echo "<button class='remove-course btn-style-inner' name = 'RemoveCourse'>REMOVE COURSE</button>";
                                    if(isset($_POST["RemoveCourse"])){
                                      $RemoveCourseQuery = "DELETE FROM `courses` WHERE `courseid` = '$CourseRow[0]'";
                                      $RemoveCourseQueryResult = mysqli_query($Link, $RemoveCourseQuery) or die ("Meeeeeeeeeeee . You course is not deleted. It was an error. Hey do not look at us, maybe it is up to you, but it probabbly is not :( :( . Sorry ;) . Try again, later on.  ");
                                      header('Location: hubs.php');
                                    }
                                    echo "</form>";
                                    echo "<button class='accordion-btn btn-style-inner'>$CourseRow[1]<span class='avg'>Current Mark: <span id='hub1course1avg'>$CourseRow[3]</span>%</span></button>";
                                echo "</div>";
                                if($NumberOfComponents > 0){
                                    while(($ComponentRow = mysqli_fetch_row($ComponentQueryResult)) != NULL){
                                      if($ComponentRow[2] == $CourseRow[0]){
                                        echo "<div class='panel'>";
                                            echo "<div class='comp-container'>";
                                              echo "<form method = 'POST' action = '#'>";
                                                echo "<button class='remove-component btn-style-inner' name = 'RemoveComponent'>REMOVE</button>";
                                                if(isset($_POST["RemoveComponent"])){
                                                  $RemoveComponentQuery = "DELETE * FROM `components`";
                                                  $RemoveComponentQueryResult = mysqli_query($Link, $RemoveCourseQuery) or die ("Fild to delte your Component. Try again later on. Programmers behind this web application are tooooo tired to figure some fun response out :P :P . ");
                                                  header('Location: hubs.php');
                                                }
                                                  echo "</form>";
                                                echo "<a href='component.php' class='component'>$ComponentRow[1]</a>";
                                                echo "<span class='comp-mark'>Mark: <span id='hub1course1component1mark'>$ComponentRow[3]</span>%</span>";
                                            echo "</div>";

                                            echo "<div class='panel'>";
                                                echo "<div class='comp-container'>";
                                                    echo "<button class='remove-component btn-style-inner'>REMOVE</button>";
                                                    echo "<a href='#' class='component'>Component 1</a>";
                                                    echo "<span class='comp-mark'>Mark: <span id='hub1course2component1mark'>90</span>%</span>";
                                                echo "</div>";
                                                echo "<div class='comp-container'>";
                                                    echo "<button class='remove-component btn-style-inner'>REMOVE</button>";
                                                    echo "<a href='#'' class='component'>Component 2</a>";
                                                    echo "<span class='comp-mark'>Mark: <span id='hub1course2component2mark'>90</span>%</span>";
                                                echo "</div>";
                                                echo "<div class='compname-submit'>";
                                                    echo "Enter a Component Name:<input type='text' class='compname'></input>";
                                                    echo "<button class='btn-style-innermost compname-submit-btn'>OK</button>";
                                                echo "</div>";
                                                echo "<button class='btn-style-innermost add-component'>ADD COMPONENT</button>";
                                            echo "</div>";
                                      }
                                    }
                                    echo "That is all of the Components for this Course. <br>  ";
                                }
                                else{
                                  echo "There are no Components for this Course. <br>  ";
                                }
                                echo "<div class='compname-submit'>";
                                    echo "<form method = 'POST' action = '#'>";
                                    echo "Enter a Component Name:<input type='text' class='compname' name = 'NameOfComponent'></input>";
                                    echo "<button class='btn-style-innermost compname-submit-btn' name = 'AddNewComponent'>OK</button>";
                                    if(isset($_POST["AddNewComponent"])){
                                      $ComponentName = $_POST['NameOfComponent'];
                                      if($ComponentName != ""){
                                        $AddNewComponentQuery = "INSERT INTO `components` VALUES (NULL, '$ComponentName', '$CourseRow[0]', 0, 0, 0, 0, CURRENT_DATE)";
                                        $AddNewComponentQueryResult = mysqli_query($Link, $AddNewComponentQuery) or die ("Ou, ou, hold on hold on, there are some errors!!! The component could not be created, please try again later on, of course if you will be still interested then ;) :D . ");
                                        header('Location: hubs.php');
                                      }
                                    }
                                echo "</form>";
                                echo "</div>";
                                echo "<button class='btn-style-innermost add-component'>ADD COMPONENT</button>";
                              }
                            }
                            echo "That is all of the Courses for this Hub. ";
                          }
                          else{
                            echo "There are no Courses for this Hub. ";
                          }
                              echo "<div class='coursename-submit'>";
                                  echo "<form method = 'POST' action = '#'>";
                                  echo "Enter a Course Name:<input type='text' class='compname' name = 'NameOfCourse'></input>";
                                  echo "<button class='btn-style-inner coursename-submit-btn' name = 'AddNewCourse'>OK</button>";
                              if(isset($_POST["AddNewCourse"])){
                                $CourseName = $_POST['NameOfCourse'];
                                if($CourseName != ""){
                                    $NewCourseQuery = "INSERT INTO `courses` VALUES (NULL, '$CourseName', '$Row[0]', 0)";
                                    $NewCourseQueryResult = mysqli_query($Link, $NewCourseQuery) or die ("There was an error, while trying to make new Course. Sorry, if happends. It will be really really awesome, if you would like to try again, later on. ");
                                    header('Location: hubs.php');
                                }
                              }
                              echo "</form>";
                            echo "</div>";
                            echo "<button class='btn-style-inner add-course'>ADD COURSE</button>";
                          echo "</div>";
                      echo "</div>";
                  echo "</div>";
                }
              }
              else{
                echo "There are no Hubs in your account yet :(, but you can create them :) . ";
              }
             ?>
              <div class="hubname-submit">
                  <form method = "POST" action = "#">
                  Enter a Hub Name:<input type="text" class="compname" name = "NameOfHub"></input>
                  <button class="btn-style hubname-submit-btn" name = "AddHub">OK</button>
                  <?php
                    if(isset($_POST["AddHub"])){
                      $HubName = $_POST['NameOfHub'];
                      if($HubName != ""){
                        $IDFromUserCreator = $_SESSION['userid'];
                        $AddHubQuery = "INSERT INTO `hubs` VALUES (NULL, '$HubName', '$IDFromUserCreator', 0)";
                        $AddingResult = mysqli_query($Link, $AddHubQuery) or die ("Something went in wrong way, when you tried to add new Hub, please try again later on");
                        header('Location: hubs.php');
                      }
                    }
                  ?>
                </form>
              </div>
              <button class="btn-style add-hub" >ADD NEW HUB</button>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
