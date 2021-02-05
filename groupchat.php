<?php

  // Created by Srdjan Grbic

  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseFull - GroupChat</title>
    <link rel = "stylesheet" href = "groupchatstyle.css">
  </head>
  <body>
    <header id = "GroupHead">
      <h1 style = "color: #24333C; text-align: center; ">CourseFull - <?php echo $_SESSION['groupname'] ?>  - Group</h1>
    </header>
    <main>

    </main>
    <footer id = "GroupBottom">
      <a href = "profile.php"><button class = "GCProfile">Go back to profile</button></a>
      <form method = "POST" action = "#">
        <input name = "CInput" type = "Text" placeholder = "Share your thoughts here.....">
        <button name = "GCSubmit">Share it!</button>
        <?php
          if(isset($_POST["GCSubmit"])){
            $Messadge = $_POST['CInput'];
            $GroupId = $_SESSION['groupid'];
            $UserId = $_SESSION['userid'];
            include "connection.php";
            $MessadgeQuery = "INSERT INTO `messengers` VALUES (NULL, $GroupId, $UserId, $Messadge)";
            $SendResult = mysqli_query($Link, $MessadgeQuery) or die ("Something went wrong :(, we could not deliver your messadge. ");

          }
         ?>
      </form>
    </footer>
  </body>
</html>
